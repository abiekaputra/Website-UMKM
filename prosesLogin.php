<?php
session_start();
require_once 'config.php';

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: index.php");
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Akun tidak ditemukan!";
    }

    $stmt->close();
}

$conn->close();
