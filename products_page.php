<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Products Page</title>
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
        <div class="container py-5 px-3">
            <div class="d-flex flex-column gap-7 justify-content-center align-items-center">
                <div class="d-flex flex-column gap-3">
                    <h1 class="heading-style-h1"> Products Page </h1>
                    <p class="text-center max-width-small"> Explore our Products!</p>
                </div>
                <div class="d-flex flex-row gap-5 flex-wrap">
                    <?php
                    // Koneksi ke database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "umkm";

                    // Membuat koneksi
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Memeriksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Kueri untuk mengambil data produk
                    $sql = "SELECT product_id, product_name, product_category, product_price, product_image, product_description FROM products";
                    $result = $conn->query($sql);

                    // Memeriksa apakah kueri berhasil dieksekusi
                    if (!$result) {
                        die("Kueri gagal: " . $conn->error);
                    }
                    
                    // Memastikan bahwa ada hasil sebelum mencoba mengambilnya  
                    if ($result->num_rows > 0) {
                        // Loop melalui hasil dan menampilkannya
                        while ($row = $result->fetch_assoc()) {
                            // Tampilkan card produk
                            
                            echo "<div class='products_card'>";
                            echo "<a href='productDetail.php?product_id=" . $row['product_id'] . "' style='text-decoration: none; color: inherit;'>";
                            echo "<div class='products_image_wrapper'>";
                            echo "<img class='products_image' src='" . $row["product_image"] . "'>";
                            echo "</div>";
                            echo "<div class='products_description_wrapper'>";
                            echo "<div class='products_name'>";
                            echo "<h6>" . $row["product_name"] . "</h6>";
                            echo "<p>" . $row["product_description"] . "</p>";
                            echo "</div>";
                            echo "<div class='products_price'>";
                            echo "<h6>" . $row["product_price"] . "</h6>";
                            echo "</div>";
                            echo "</div>";
                            echo "</a>";
                            echo "</div>";
                            
                        }
                    } else {
                        echo "Tidak ada produk yang ditemukan.";
                    }

                    
                    // Menutup koneksi database
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
