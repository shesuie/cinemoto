<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemoto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT * FROM customers WHERE email = ?";
    $stmt_check = $conn->prepare($check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        header("Location: index.php?reg_error=Email already exists.");
        exit();
    }

    // Insert new user
    $insert_user = "INSERT INTO customers (name, gender, phone, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($insert_user);
    $stmt_insert->bind_param("sssss", $name, $gender, $phone, $email, $hashed_password);

    if ($stmt_insert->execute()) {
        header("Location: index.php?reg_success=Registration successful. You can now login.");
        exit();
    } else {
        header("Location: index.php?reg_error=Registration failed. Please try again later.");
        exit();
    }

    $stmt_insert->close();
    $stmt_check->close();
}

$conn->close();
