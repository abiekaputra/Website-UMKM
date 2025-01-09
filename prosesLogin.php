<?php
session_start();

$servername = "localhost";
$dbusername = "root"; // username default MySQL
$dbpassword = ""; // password default MySQL
$dbname = "umkm"; // ganti dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buat query untuk memeriksa username
    $sql = "SELECT user_id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data user
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Set session untuk user ID
            $_SESSION['user_id'] = $row['id'];

            // Redirect ke index.html
            ob_start();
            header("Location: index.php");
            ob_end_flush();
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Akun Anda tidak ditemukan!";
    }
}

// Tutup koneksi
$conn->close();
?>
