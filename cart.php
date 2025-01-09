<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Cart Product</title>
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
    <div class="page-wrapper" style="background-color:#F0F3F7;">
        <div class="section container px-3 py-3">
            <div class="d-flex flex-column gap-7">
                <h3 class="heading-style-h2"> Shopping Cart </h3>
                <div class="d-flex flex-column gap-3">
                    <div class="p-5 d-flex flex-row justify-content-between" style="background-color:#FFFFFF; border-radius: 2em;">
                        <input type="checkbox">
                        <h4 class="heading-style-h4"> Product</h4>
                        <h4 class="heading-style-h4"> Product Name </h4>
                        <h4 class="heading-style-h4"> Unit Price </h4>
                        <h4 class="heading-style-h4"> Quantity </h4>
                        <h4 class="heading-style-h4"> Total Price </h4>
                    </div>
                    <div class="p-5 d-flex flex-row justify-content-between align-items-center" style="background-color:#FFFFFF; border-radius: 2em;">
                        
                    <?php
                   
                    if (isset($_POST['product_id'],$_POST['product_name'],$_POST['product_price'],$_POST['product_image'])) {
                        
                        $product_id = $_POST['product_id'];
                        $product_name = $_POST['product_name'];
                        $product_price = $_POST['product_price'];
                        $product_image = $_POST['product_image'];
                    ?>
                    <input type="checkbox">
                    <img id="productImage" src="<?php echo $product_image; ?>" class="cart_image">
                    <div class="d-flex flex-column gap-3">
                        <h3 id="productName" class="heading-style-h5"> <?php echo $product_name; ?></h3>
                    </div>
                    <p id="unitPrice" class="style_bold"> Rp<?php echo $product_price; ?></p>
                    <input id="quantityInput" type="number" value="1" min="1">
                    <p id="totalPrice" class="style_bold"> Rp<?php echo $product_price; ?></p>
                </div>
            </div>
            <div class="p-5 d-flex flex-row justify-content-between align-items-center" style="background-color:#FFFFFF; border-radius: 2em;">
                <div class="d-flex flex-row gap-3">
                    <input type="checkbox">
                    <p> Select All</p>
                </div>
                <div class="d-flex flex-row gap-5">
                    <div class="d-flex flex-column gap-3">
                        <h3 id="totalItem" class="heading-style-h5"> Total Item :</h3>
                        <p id="grandTotalPrice"> Rp<?php echo $product_price; ?></p>
                    </div>
                    <form action="transactionDetailCart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $product_image; ?>">
                        <button type="submit" class="btn btn-primary"> Check Out </button>
                    </form>
                        
                    
                </div>
                <?php } else {
                  
                    echo "<p>Data produk tidak ditemukan.</p>";
                } ?>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const unitPriceElement = document.getElementById('unitPrice');
        const quantityInputElement = document.getElementById('quantityInput');
        const totalPriceElement = document.getElementById('totalPrice'); 
        const totalItemElement = document.getElementById('totalItem');
        const grandTotalPriceElement = document.getElementById('grandTotalPrice');
        const checkoutButton = document.getElementById('checkoutButton');

        const productNameElement = document.getElementById('productName');
        const productImageElement = document.getElementById('productImage');
        const productDescriptionElement = document.getElementById('productDescription');

       
        const updateTotalPrice = () => {
            const unitPrice = parseInt(unitPriceElement.textContent.replace('Rp', '').replace('.', ''));
            const quantity = parseInt(quantityInputElement.value);
            const totalPrice = unitPrice * quantity;
            totalPriceElement.textContent = 'Rp' + totalPrice.toLocaleString('id-ID');
            totalItemElement.textContent = 'Total Item (' + quantity + ')';
            grandTotalPriceElement.textContent = 'Rp' + totalPrice.toLocaleString('id-ID');
        };

        
        updateTotalPrice();

        
        quantityInputElement.addEventListener('input', updateTotalPrice);

       
        checkoutButton.addEventListener('click', () => {
            const quantity = parseInt(quantityInputElement.value);
            const totalPrice = parseInt(totalPriceElement.textContent.replace('Rp', '').replace('.', ''));
            const unitPrice = parseInt(unitPriceElement.textContent.replace('Rp', '').replace('.', ''));
            const productName = productNameElement.textContent;
            const productImage = productImageElement.src;
            const productDescription = productDescriptionElement.textContent;

            localStorage.setItem('quantity', quantity);
            localStorage.setItem('totalPrice', totalPrice);
            localStorage.setItem('unitPrice', unitPrice);
            localStorage.setItem('productName', productName);
            localStorage.setItem('productImage', productImage);
            localStorage.setItem('productDescription', productDescription);
        });
    });
</script>


</body>
</html>
