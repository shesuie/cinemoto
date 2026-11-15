<?php
require __DIR__ . '/../include/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

header('Cache-Control: private, no-store');

$generic = 'index.php?reg_error=' . rawurlencode('Could not create the account. If you already have one, log in.');
$success = 'index.php?reg_success=' . rawurlencode('Registration successful. You can now login.');

if (cinemoto_honeypot_tripped()) {
    cinemoto_event('honeypot');
    header('Location: ' . $generic);
    exit();
}

if (!cinemoto_csrf_ok()) {
    header('Location: index.php?reg_error=' . rawurlencode('Please refresh the page and try again.'));
    exit();
}

if (cinemoto_rate_limited('register')) {
    header('Location: index.php?reg_error=' . rawurlencode('Too many attempts. Please wait and try again.'));
    exit();
}

$name = cinemoto_person_name($_POST['name'] ?? '');
$gender = cinemoto_gender($_POST['gender'] ?? '');
$phone = cinemoto_phone($_POST['phone'] ?? '');
$email = cinemoto_email($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? null;
if (!is_string($password)) {
    $password = '';
}

if ($name === null || $gender === null || $phone === null || $email === null || cinemoto_disposable_email($email)) {
    cinemoto_record_attempt('register');
    header('Location: ' . $generic);
    exit();
}

if (strlen($password) < 8 || strlen($password) > 72) {
    cinemoto_record_attempt('register');
    header('Location: index.php?reg_error=' . rawurlencode('Password must be at least 8 characters.'));
    exit();
}

if (is_string($confirm) && !hash_equals($password, $confirm)) {
    cinemoto_record_attempt('register');
    header('Location: index.php?reg_error=' . rawurlencode('Password confirmation does not match.'));
    exit();
}

if (cinemoto_common_password($password) || strcasecmp($password, $email) === 0) {
    cinemoto_record_attempt('register');
    header('Location: index.php?reg_error=' . rawurlencode('Please choose a less common password.'));
    exit();
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$conn = cinemoto_require_db();

$check = $conn->prepare('SELECT customer_id FROM customers WHERE email = ? LIMIT 1');
if ($check === false) {
    error_log('cinemoto register prepare failed');
    header('Location: ' . $generic);
    exit();
}
$check->bind_param('s', $email);
$check->execute();
$exists = $check->get_result()->num_rows > 0;
$check->close();

if ($exists) {
    cinemoto_record_attempt('register');
    cinemoto_event('register_duplicate');
    header('Location: ' . $success);
    exit();
}

$insert = $conn->prepare('INSERT INTO customers (name, gender, phone, email, password) VALUES (?, ?, ?, ?, ?)');
if ($insert === false) {
    error_log('cinemoto register insert prepare failed');
    header('Location: ' . $generic);
    exit();
}
$insert->bind_param('sssss', $name, $gender, $phone, $email, $hashed);
$saved = $insert->execute();
$newId = (int) $conn->insert_id;
$insert->close();

if (!$saved) {
    cinemoto_record_attempt('register');
    header('Location: ' . $generic);
    exit();
}

cinemoto_event('register_success', $newId);
header('Location: ' . $success);
exit();
