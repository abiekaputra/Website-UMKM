<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Product Details</title>
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
        <div class="section">
            <div class="container px-5 py-5">
                <div class="d-flex flex-column gap-7">
                    <div class="row gap-7">
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

                        // Memeriksa apakah ada parameter product_id yang dikirimkan melalui URL
                        if(isset($_GET['product_id'])) {
                            $product_id = $_GET['product_id'];

                            // Kueri untuk mengambil detail produk berdasarkan product_id
                            $sql = "SELECT * FROM products WHERE product_id = $product_id";
                            $result = $conn->query($sql);

                            // Memeriksa apakah kueri berhasil dieksekusi
                            if ($result) {
                                // Memastikan bahwa ada hasil sebelum mencoba mengambilnya
                                if ($result->num_rows > 0) {
                                    // Ambil data produk
                                    $row = $result->fetch_assoc();

                                    // Tampilkan detail produk
                                    echo "<div class='col'>";
                                    echo "<img src='" . $row['product_image'] . "' style='width: 750px !important; height: auto !important;'>";
                                    echo "</div>";
                                    echo "<div class='col d-flex flex-column gap-4'>";
                                    echo "<h1 class='heading-style-h2'>" . $row['product_name'] . "</h1>";
                                    echo "<p>Price: Rp" . $row['product_price'] . "</p>";
                                    echo "<div class='d-flex flex-column gap-2'>";
                                    echo "<h6 class='heading-style-h5'>Description</h6>";
                                    echo "<p>" . $row['product_description'] . "</p>";
                                    echo "</div>";

                                    // Tampilkan informasi umum (General Info) menggunakan deskripsi produk
                                    echo "<div class='d-flex flex-column gap-3 justify-content-center'>";
                                    echo "<h3 class='heading-style-h3'> General Info </h3>";
                                    echo "<p>" . $row['product_description'] . "</p>";
                                    echo "</div>";
                                    
                                    // Tombol untuk membeli atau menambahkan ke keranjang
                                    echo "<div class='d-flex flex-row justify-content-between'>";
                                    echo "<a href='transactionDetail.php?product_id=$product_id&product_name=" . urlencode($row['product_name']) . "&product_price=" . $row['product_price'] . "&product_image=" . urlencode($row['product_image']) . "' style='width: 65%;' class='btn btn-primary' name='buy_submit' id='buy_submit'>Buy Now!</a>";
                                    echo "<form action='cart.php' method='POST' style='width: 30%;'>";
                                    echo "<input type='hidden' name='product_id' value='$product_id'>";
                                    echo "<input type='hidden' name='product_name' value='" . $row['product_name'] . "'>";
                                    echo "<input type='hidden' name='product_price' value='" . $row['product_price'] . "'>";
                                    echo "<input type='hidden' name='product_description' value='" . $row['product_description'] . "'>";
                                    echo "<input type='hidden' name='product_image' value='" . $row['product_image'] . "'>";
                                    echo "<button type='submit' class='btn btn-primary' name='cart_submit' id='cart_submit'>Add to Cart!</button>";
                                    echo "</form>";
                                    echo "</div>";
                                } else {
                                    echo "Produk tidak ditemukan.";
                                }
                            } else {
                                echo "Kueri gagal: " . $conn->error;
                            }
                        } else {
                            echo "Tidak ada parameter product_id yang diterima.";
                        }

                        // Menutup koneksi database
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
