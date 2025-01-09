<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Transaction Details</title>
</head>
<body>
<div class="nav-bar d-flex flex-row justify-content-between align-items-center position-fixed px-4 py-4">
        <div class="logo_wrapper"><a href="index.php"> <img class="logo_wrapper" src="assets/logo.png"></a></div>
        <div class="d-flex flex-row gap-5 justify-content-center align-items-center">
            <a class="nav-link" href="#about">About</a>
            <a class="nav-link" href="products_page.php">Products</a>
            <a class="nav-link"  href="creativity_booster.html">Blogs</a>
            <a class="nav-link"  href="#footer">Contact</a>
            <a href="login.html"> <button type="button" class="btn btn-primary"> Login</button></a>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="section" style="background-color:#F0F3F7;">
            <div class="container py-5 px-3">
                <div>
                    <form class="d-flex flex-column gap-3" method="post" action="receipt.php">
                        <div class="d-flex flex-column gap-3">
                            <?php
                            // Memeriksa apakah data produk diterima dari halaman detail produk
                            if (isset($_POST['product_id'],$_POST['product_name'],$_POST['product_price'],$_POST['product_image'])) {
                                // Menyiapkan data produk dari parameter URL
                                $product_id = $_POST['product_id'];
                                $product_name = $_POST['product_name'];
                                $product_price = $_POST['product_price'];
                                $product_image = $_POST['product_image'];
                            ?>
                            <div class=" p-5 d-flex flex-column gap-4" style="background-color: #ffffff; border-radius: 2em;">
                                <h3 class="heading-style-h5">
                                    Product Details
                                </h3>
                                <div class="d-flex flex-column gap-1">
                                    <img src="<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" style="max-width: 300px; max-height: 300px;">
                                    <p class="style_bold"> Product Name: <?php echo $product_name; ?> </p>
                                    <p class="style_bold"> Price: Rp<?php echo $product_price; ?> </p>
                                </div>
                                <!-- Memasukkan data produk ke dalam input tersembunyi -->
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $product_image; ?>">
                            </div>
                            <?php
                            } else {
                                // Jika data produk tidak diterima, tampilkan pesan kesalahan
                                echo "<p>Data produk tidak ditemukan.</p>";
                            }
                            ?>
                            <div class=" p-5 d-flex flex-column gap-4" style="background-color: #ffffff; border-radius: 2em;">
                                <h3 class="heading-style-h5">
                                    Alamat Pengiriman
                                </h3>
                                <div class="d-flex flex-column gap-1">
                                    <label for="shipping_address" class="style_bold">Alamat:</label>
                                    <textarea id="shipping_address" name="shipping_address" rows="4" cols="50" required></textarea>
                                </div>
    
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Beli !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
