<?php
require __DIR__ . '/../include/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

header('Cache-Control: private, no-store');

$fail = 'index.php?error=' . rawurlencode('Invalid email or password.');

if (cinemoto_honeypot_tripped()) {
    cinemoto_event('honeypot');
    header('Location: ' . $fail);
    exit();
}

if (!cinemoto_csrf_ok()) {
    header('Location: index.php?error=' . rawurlencode('Please refresh the page and try again.'));
    exit();
}

if (cinemoto_rate_limited('login')) {
    header('Location: index.php?error=' . rawurlencode('Too many attempts. Please wait and try again.'));
    exit();
}

$email = cinemoto_email($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
if (!is_string($password)) {
    $password = '';
}

$conn = cinemoto_require_db();
$stmt = $conn->prepare('SELECT customer_id, name, password FROM customers WHERE email = ? LIMIT 1');
if ($stmt === false) {
    error_log('cinemoto login prepare failed');
    header('Location: index.php?error=' . rawurlencode('The site is temporarily unavailable.'));
    exit();
}

$lookup = $email ?? '';
$stmt->bind_param('s', $lookup);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$valid = false;
if ($user) {
    $valid = password_verify($password, $user['password']);
} else {
    password_verify($password, CINEMOTO_DUMMY_HASH);
}

if (!$valid) {
    cinemoto_record_attempt('login');
    cinemoto_event('login_failure');
    header('Location: ' . $fail);
    exit();
}

session_regenerate_id(true);
$_SESSION['user_id'] = (int) $user['customer_id'];
$_SESSION['name'] = $user['name'];
$_SESSION['user_email'] = $email;
$_SESSION['created_at'] = time();
$_SESSION['last_activity'] = time();
$_SESSION['csrf'] = bin2hex(random_bytes(32));
cinemoto_clear_attempts('login');
cinemoto_event('login_success', (int) $user['customer_id']);

header('Location: index.php');
exit();
