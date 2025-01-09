<?php
// Memulai sesi jika belum dimulai
session_start();

// Memeriksa apakah tombol "Add to Cart!" ditekan
if (isset($_POST['cart_submit'])) {
    // Memeriksa apakah data produk yang diperlukan diterima
    if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_description'])) {
        // Menyiapkan data produk
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];

        // Menyiapkan array untuk menyimpan informasi produk dalam keranjang belanja
        $cart_item = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_description' => $product_description
        );

        // Memeriksa apakah keranjang belanja sudah ada dalam sesi
        if (!isset($_SESSION['cart'])) {
            // Jika belum, inisialisasi keranjang belanja sebagai array kosong
            $_SESSION['cart'] = array();
        }

        // Menambahkan produk ke dalam keranjang belanja
        array_push($_SESSION['cart'], $cart_item);

        // Mengarahkan pengguna kembali ke halaman produk atau halaman lainnya setelah menambahkan ke keranjang belanja
        header("Location: product_details.php?product_id=$product_id");
        exit();
    } else {
        // Jika data produk tidak lengkap, tampilkan pesan kesalahan
        echo "Data produk tidak lengkap.";
    }
} else {
    // Jika tombol "Add to Cart!" tidak ditekan, arahkan pengguna kembali ke halaman produk
    header("Location: productDetail.php");
    exit();
}
?>
