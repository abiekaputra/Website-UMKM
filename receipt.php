<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Receipt</title>
    <style>
       
       body{
        max-height: 100vh !important;
       }
       .container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
       .success-message {
            font-size: 24px;
            font-weight: bold;
            color: #008000;
        }
       .order-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
       .order-details li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
       .order-details li:last-child {
            border-bottom: none;
        }
        </style>
</head>
<body>
<div class="nav-bar d-flex flex-row justify-content-between align-items-center position-fixed px-4 py-4">
        <div class="logo_wrapper"> <img class="logo_wrapper" src="assets/logo.png"></div>
        <div class="d-flex flex-row gap-5 justify-content-center align-items-center">
            <a class="nav-link" href="#about">About</a>
            <a class="nav-link" href="products_page.php">Products</a>
            <a class="nav-link"  href="creativity_booster.html">Blogs</a>
            <a class="nav-link"  href="#footer">Contact</a>
            <a href="login.html"> <button type="button" class="btn btn-primary"> Login</button></a>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="section d-flex flex-row align-items-center" style="background-color:#F0F3F7; height:100vh;">
            <div class="container py-5 px-3 d-flex flex-column gap-5">
                <div class="p-5 d-flex flex-column gap-4" style="background-color: #ffffff; border-radius: 2em;"></div>
                    <?php            
                    // Memeriksa apakah data produk diterima dari halaman transactionDetail.php
                    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['shipping_address'])) {
                        // Menyiapkan data produk dari form transactionDetail.php
                        $product_name = $_POST['product_name'];
                        $product_price = $_POST['product_price'];
                        $shipping_address = $_POST['shipping_address'];
                    ?>

                    <div class="container">
                        <h1 class="success-message">Thank you for your purchase!</h1>
                            <div class="order-details">
                               <h2>Order Details</h2>
                                <ul>
                                <li>Product Name: <?php echo $product_name; ?></li>
                                <li>Price: Rp<?php echo $product_price; ?> </li>
                                <li>Shipping Address: <?php echo $shipping_address; ?></li>
                               </ul>

                                
                            </div>
                     </div>

                    <?php
                    } else {
                        // Jika data produk tidak diterima, tampilkan pesan kesalahan
                      echo "<p>Data produk tidak ditemukan.</p>";
                    }
                    ?>
                    <a href="index.php"><button class="btn btn-primary" type="button">Back to Home</button> </a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
