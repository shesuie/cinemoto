<?php

if (defined('CINEMOTO_BOOTSTRAP')) {
    return;
}
define('CINEMOTO_BOOTSTRAP', true);

define('CINEMOTO_SECRETS', 'C:/xampp/cinemoto-secrets.php');
define('CINEMOTO_IDLE_SECONDS', 1800);
define('CINEMOTO_ABSOLUTE_SECONDS', 43200);
define('CINEMOTO_ATTEMPT_LIMIT', 8);
define('CINEMOTO_ATTEMPT_WINDOW', 900);
define(
    'CINEMOTO_DUMMY_HASH',
    '$2y$10$qEqGAwWraIPocO59oszJzuBkyobfGLnx8weTqtgC5yfOQbwmZk0Ra'
);

function cinemoto_h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function cinemoto_flash($key)
{
    if (!isset($_GET[$key]) || !is_string($_GET[$key])) {
        return '';
    }
    return cinemoto_h($_GET[$key]);
}

function cinemoto_client_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    return is_string($ip) ? substr($ip, 0, 45) : '';
}

function cinemoto_is_https()
{
    return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
}

ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Lax');
ini_set('session.gc_maxlifetime', (string) CINEMOTO_ABSOLUTE_SECONDS);

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => cinemoto_is_https(),
    'httponly' => true,
    'samesite' => 'Lax',
]);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

header_remove('X-Powered-By');

$now = time();
$expired = false;
if (!empty($_SESSION['last_activity']) && ($now - (int) $_SESSION['last_activity']) > CINEMOTO_IDLE_SECONDS) {
    $expired = true;
}
if (!empty($_SESSION['created_at']) && ($now - (int) $_SESSION['created_at']) > CINEMOTO_ABSOLUTE_SECONDS) {
    $expired = true;
}
if ($expired) {
    $_SESSION = [];
    session_destroy();
    session_start();
}
if (empty($_SESSION['created_at'])) {
    $_SESSION['created_at'] = $now;
}
$_SESSION['last_activity'] = $now;

function cinemoto_secrets()
{
    static $secrets = null;
    if ($secrets !== null) {
        return $secrets;
    }
    if (!is_file(CINEMOTO_SECRETS)) {
        error_log('cinemoto secrets file is missing');
        return null;
    }
    $loaded = require CINEMOTO_SECRETS;
    if (!is_array($loaded)) {
        error_log('cinemoto secrets file is invalid');
        return null;
    }
    $secrets = $loaded;
    return $secrets;
}

function cinemoto_db()
{
    static $conn = null;
    static $failed = false;
    if ($conn instanceof mysqli) {
        return $conn;
    }
    if ($failed) {
        return null;
    }
    $secrets = cinemoto_secrets();
    if ($secrets === null) {
        $failed = true;
        return null;
    }
    $conn = new mysqli(
        $secrets['host'],
        $secrets['user'],
        $secrets['pass'],
        $secrets['name'],
        (int) $secrets['port']
    );
    if ($conn->connect_error) {
        error_log('cinemoto database connection failed');
        $conn = null;
        $failed = true;
        return null;
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

function cinemoto_require_db()
{
    $conn = cinemoto_db();
    if (!$conn) {
        http_response_code(500);
        exit('The site is temporarily unavailable.');
    }
    return $conn;
}

function cinemoto_clear_login()
{
    unset($_SESSION['user_id'], $_SESSION['user_email'], $_SESSION['name']);
}

if (!empty($_SESSION['user_id'])) {
    $conn = cinemoto_db();
    $customerId = (int) $_SESSION['user_id'];
    $stillValid = false;
    if ($conn && $customerId > 0) {
        $stmt = $conn->prepare('SELECT customer_id, name FROM customers WHERE customer_id = ? LIMIT 1');
        if ($stmt) {
            $stmt->bind_param('i', $customerId);
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if ($row) {
                $stillValid = true;
                $_SESSION['user_id'] = (int) $row['customer_id'];
                $_SESSION['name'] = $row['name'];
            }
        }
    }
    if (!$stillValid && $conn) {
        cinemoto_clear_login();
    }
    if (!empty($_SESSION['user_id'])) {
        header('Cache-Control: private, no-store');
    }
}

function cinemoto_csrf_token()
{
    if (empty($_SESSION['csrf']) || !is_string($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function cinemoto_csrf_ok()
{
    $sent = $_POST['csrf'] ?? '';
    $stored = $_SESSION['csrf'] ?? '';
    return is_string($sent) && is_string($stored) && $stored !== '' && hash_equals($stored, $sent);
}

function cinemoto_form_guards()
{
    $token = cinemoto_h(cinemoto_csrf_token());
    return '<input type="hidden" name="csrf" value="' . $token . '">'
        . '<div style="position:absolute;left:-10000px;width:1px;height:1px;overflow:hidden" aria-hidden="true">'
        . '<label>Company website <input type="text" name="company_website" tabindex="-1" autocomplete="off" value=""></label>'
        . '</div>';
}

function cinemoto_honeypot_tripped()
{
    if (!isset($_POST['company_website'])) {
        return false;
    }
    return trim((string) $_POST['company_website']) !== '';
}

function cinemoto_event($type, $customerId = null)
{
    $conn = cinemoto_db();
    if (!$conn) {
        return;
    }
    $ip = cinemoto_client_ip();
    if ($customerId === null) {
        $stmt = $conn->prepare('INSERT INTO security_events (event_type, ip_address) VALUES (?, ?)');
        if (!$stmt) {
            return;
        }
        $stmt->bind_param('ss', $type, $ip);
    } else {
        $stmt = $conn->prepare('INSERT INTO security_events (event_type, ip_address, customer_id) VALUES (?, ?, ?)');
        if (!$stmt) {
            return;
        }
        $id = (int) $customerId;
        $stmt->bind_param('ssi', $type, $ip, $id);
    }
    $stmt->execute();
    $stmt->close();
}

function cinemoto_rate_limited($action)
{
    $conn = cinemoto_db();
    if (!$conn) {
        return true;
    }
    $ip = cinemoto_client_ip();
    $stmt = $conn->prepare(
        'SELECT COUNT(*) AS total FROM auth_attempts WHERE action_name = ? AND ip_address = ? AND attempted_at > (NOW() - INTERVAL 15 MINUTE)'
    );
    if (!$stmt) {
        return true;
    }
    $stmt->bind_param('ss', $action, $ip);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $total = (int) ($row['total'] ?? 0);
    if ($total >= CINEMOTO_ATTEMPT_LIMIT) {
        error_log('cinemoto rate limit: ' . $action . ' from ' . $ip);
        cinemoto_event('rate_limited');
        return true;
    }
    return false;
}

function cinemoto_record_attempt($action)
{
    $conn = cinemoto_db();
    if (!$conn) {
        return;
    }
    $ip = cinemoto_client_ip();
    $stmt = $conn->prepare('INSERT INTO auth_attempts (action_name, ip_address) VALUES (?, ?)');
    if (!$stmt) {
        return;
    }
    $stmt->bind_param('ss', $action, $ip);
    $stmt->execute();
    $stmt->close();
    $cleanup = $conn->prepare('DELETE FROM auth_attempts WHERE attempted_at < (NOW() - INTERVAL 1 DAY)');
    if ($cleanup) {
        $cleanup->execute();
        $cleanup->close();
    }
}

function cinemoto_clear_attempts($action)
{
    $conn = cinemoto_db();
    if (!$conn) {
        return;
    }
    $ip = cinemoto_client_ip();
    $stmt = $conn->prepare('DELETE FROM auth_attempts WHERE action_name = ? AND ip_address = ?');
    if (!$stmt) {
        return;
    }
    $stmt->bind_param('ss', $action, $ip);
    $stmt->execute();
    $stmt->close();
}

function cinemoto_gender($value)
{
    $map = [
        'male' => 'Male',
        'female' => 'Female',
        'non-binary' => 'Non-Binary',
        'other' => 'Other',
        'prefer-not-to-answer' => 'Other',
    ];
    $key = strtolower(trim((string) $value));
    return $map[$key] ?? null;
}

function cinemoto_person_name($value)
{
    $value = trim((string) $value);
    if ($value === '' || strlen($value) > 100) {
        return null;
    }
    if (preg_match('/[<>\x00-\x1F]/', $value)) {
        return null;
    }
    return $value;
}

function cinemoto_phone($value)
{
    $value = trim((string) $value);
    if (!preg_match('/^[0-9+\-() ]{7,20}$/', $value)) {
        return null;
    }
    $digits = preg_replace('/\D/', '', $value);
    if (strlen($digits) < 7 || strlen($digits) > 15) {
        return null;
    }
    return $value;
}

function cinemoto_email($value)
{
    $value = trim((string) $value);
    if (strlen($value) > 100 || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        return null;
    }
    return $value;
}

function cinemoto_disposable_email($email)
{
    $domain = strtolower(substr(strrchr($email, '@'), 1));
    $blocked = [
        'mailinator.com',
        'guerrillamail.com',
        'guerrillamailblock.com',
        'sharklasers.com',
        'grr.la',
        'yopmail.com',
        'tempmail.com',
        'temp-mail.org',
        '10minutemail.com',
        'trashmail.com',
        'getnada.com',
        'dispostable.com',
    ];
    return in_array($domain, $blocked, true);
}

function cinemoto_common_password($password)
{
    $common = [
        'password',
        'password1',
        'password123',
        '12345678',
        '123456789',
        '1234567890',
        'qwerty123',
        'qwertyui',
        'letmein1',
        'admin123',
        'iloveyou',
        'welcome1',
        'changeme',
    ];
    return in_array(strtolower($password), $common, true);
}
