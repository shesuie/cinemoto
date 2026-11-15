<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemoto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['customer_id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['name'] = $user['name'];

            header("Location: index.php");
            exit();
        } else {
            header("Location: index.php?error=Invalid password.");
            exit();
        }
    } else {
        header("Location: index.php?error=Invalid email or password.");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
