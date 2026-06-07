<?php
require_once 'config.php';

$conn = getConnection();

//Menerima data dari forma
$product_name = $_POST['product_name'];
$product_category = $_POST['product_category'];
$product_price = $_POST['product_price'];
$product_image = $_FILES['product_image'];
$product_description = $_POST['product_description'];

//Memeriksa kesalahan saat mengunggah file
if ($_FILES['product_image']['error'] !=UPLOAD_ERR_OK){
    die("Error Uploading File : " . $_FILES['product_image']['error']);
}

//Menentukan direktori tujuan 
$target_dir = "upload_images/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

//Menghasilkan nama file yang unik
$file_name = basename($_FILES['product_image']['name']);
$target_file = $target_dir . uniqid() . "_" . $file_name;

//Memeriksa tipe file
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
if(!in_array($imageFileType, $allowed_types)) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

//Memeriksa ukuran file 
if ($_FILES['product_image']['size'] > 5000000) {
    die("Sorry, your file is too large.");
}

//Memindahkan file ke direktori tujuan
if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
    echo "File ". htmlspecialchars(basename($file_name)). " has been uploaded!";
} else {
    die("Sorry, there was an error uploading your file.");
}

//Menyiapkan pernyataaan SQL untuk menyisipkan data
$sql = "INSERT INTO products (product_name, product_category, product_price, product_image, product_description) VALUES (?,?,?,?,?);";

// Menggunakan prepared statement untuk menghindari SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdss", $product_name, $product_category, $product_price, $target_file, $product_description);

//Mengeksekusi pernyataan SQL
if ($stmt->execute()) {
    echo "Data Anda telah disimpan";
} else {
    echo "Terjadi kesalahan, harap hubungi Admin : " . $stmt->error;
};

//Menutup koneksi
$stmt->close();



?>