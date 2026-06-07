<?php
require_once 'config.php';

$conn = getConnection();

$product_name        = $_POST['product_name'];
$product_category    = $_POST['product_category'];
$product_price       = $_POST['product_price'];
$product_image       = $_FILES['product_image'];
$product_description = $_POST['product_description'];

if ($_FILES['product_image']['error'] != UPLOAD_ERR_OK) {
    die("Error uploading file: " . $_FILES['product_image']['error']);
}

$target_dir = "upload_images/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$file_name     = basename($_FILES['product_image']['name']);
$target_file   = $target_dir . uniqid() . "_" . $file_name;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed_types)) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

if ($_FILES['product_image']['size'] > 5000000) {
    die("Sorry, your file is too large.");
}

if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
    die("Sorry, there was an error uploading your file.");
}

$stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_price, product_image, product_description) VALUES (?,?,?,?,?)");
$stmt->bind_param("ssdss", $product_name, $product_category, $product_price, $target_file, $product_description);

if ($stmt->execute()) {
    echo "Product saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
