

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>UMKMGO! - Homepage</title>
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
    <div class="page-wraper">
        <div class="section hero position-relative" style="height:100vh;">
            <div class="container py-5">
                <div class="homepage_hero position-absolute top-0 bottom-0 start-0 end-0 d-flex gap-7 justify-content-center align-items-center flex-column">
                    <h1 class="max-width-xxsmall_hero text-center heading-style-h1">Empower Your Business Journey</h1>
                    <p class="text-center max-width-small">Transform the way you market, connect, and grow.
                        Discover our all-in-one platform designed for SMEs to reach new heights.
                        Join us today and unlock your business potential.</p>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container py-5 d-flex justify-content-center align-items-center flex-column">
                <div class="homepage_about">
                    <p class="max-width-large" style="color: white; font-size: 2.5em; line-height: 130%;">
                        We are dedicated to empowering small and medium enterprises (SMEs) by providing 
                        innovative solutions that drive growth and success. Our web-based application offers 
                        a comprehensive suite of tools to help you market your products, find the right 
                        partners, recruit talented workers, and manage transactions seamlessly. We're here 
                        to support your business every step of the way.
                    </p>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="py-5">
                    <div class="homepage_products_container">
                        <div class="homepage_products_heading gap-6">
                            <h2 class="text-center heading-style-h2"> Our SME's Products</h2>
                            <p class="max-width-small text-center">Explore our range of powerful tools designed to boost your business</p>
                            <a href="products_page.php"><button type="button" class="btn btn-primary">See More</button></a>
                        </div>
                        <div class="homepage_products_content">
                            
                        <?php 
                                $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "umkm";

                                $conn = new mysqli($servername,$username,$password,$dbname);

                                //Mengecek Koneksi
                                if ($conn->connect_error){
                                die("Koneksi Gagal : " . $conn->connect_error);
                                }
                                $sql = "SELECT product_name, product_category, product_price, product_image, product_description from products";
                                $result = $conn->query($sql);

                                if (!$result) {
                                    die("query gagal : ".mysqli_error($conn));
                                }

                                while($row = mysqli_fetch_assoc($result)) {

                            ?>

                            <div class="products_card">
                                <div class="products_image_wrapper">
                                    <img class="products_image" src="<?php echo $row["product_image"]; ?> ">
                                </div>
                                <div class="products_description_wrapper">
                                    <div class="products_name">
                                        <h6>
                                            <?php echo $row["product_name"]; ?>
                                        </h6>
                                        <p>
                                             <?php echo $row["product_description"]; ?>
                                        </p>
                                    </div>
                                    <div class="products_price">
                                        <h6>
                                             <?php echo $row["product_price"]; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="py-5 ">
                    <div class="homepage_grow_container">
                        <div class="umkmgrow_image_wrapper">
                            <img src="assets/new2.jpg" style="width:26em; height:100%; object-fit:cover; border-radius:2em;">
                        </div>
                        <div class="umkmgrow_content">
                            <div class="umkmgrow_content_heading">
                                <h2 class="heading-style-h2"> UMKM GROW</h2>
                                <div class="umkmgrow_content_description">
                                    <p class="max-width-small">
                                        Unlock the potential of your small or medium enterprise with our tailored growth solutions.
                                    </p>
                                    <a href="umkm_grow.html"><button type="button" class="btn btn-primary">Explore More</button></a>
                                </div>
                            </div>
                            <div class="umkmgrow_point_wrapper">
                                <div class="umkmgrow_point_item">
                                    <h3 class="heading-style-h3"> Design for your Brand </h3>
                                    <p class="max-width-small">We are provide an Agency that can help you to improve your visual branding for your Brand.</p>
                                </div>
                                <div class="divider_bottom"></div>
                                <div class="umkmgrow_point_item">
                                    <h3 class="heading-style-h3"> Consulting for your Brand </h3>
                                    <p class="max-width-small">We are provide a Consultant that can help you to improve your performance for your Brand..</p>
                                </div>
                                <div class="divider_bottom"></div>
                                <div class="umkmgrow_point_item">
                                    <h3 class="heading-style-h3"> Investing on your Brand </h3>
                                    <p class="max-width-small">We are provide a Venture Capital that can help you to improve your financial for your Brand..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="py-5  d-flex flex-column gap-5">
                    <div class="homepage_creativity_container d-flex flex-column gap-7">
                        <div class="creativity_heading">
                            <h2 class="max-width-xxsmall text-center heading-style-h2">Discover Creativity</h2>
                            <p class="max-width-small text-center"> Unlock the potential of your small or medium enterprise with our tailored growth solutions. </p>
                            <a href="creativity_booster.html"><button type="button" class="btn btn-primary">See More</button></a>
                        </div>
                        <div class="creativity_card_wrapper">
                            <div class="creativity_card">
                                <img class="creativity_image "src="assets/new1.webp">              
                                <div class="creativity_card_content padding-medium">
                                    <div class="creativity_card_heading">
                                        <h4 class="heading-style-h4"> Craft Your Strategy </h4>
                                        <p> Evaluate your business, and craft your strategy with maximize your creativity </p>
                                    </div>
                                    <p>Your Problems needs Creative Solutions.</p>
                                </div>
                            </div>
                            <div class="creativity_card">
                                <img class="creativity_image "src="assets/image 129.png">              
                                <div class="creativity_card_content padding-medium">
                                    <div class="creativity_card_heading">
                                        <h4 class="heading-style-h4"> Craft Your Strategy </h4>
                                        <p> Evaluate your business, and craft your strategy with maximize your creativity </p>
                                    </div>
                                    <p>Your Problems needs Creative Solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="py-5 ">
                    <div class="homepage_jobseeker_container">
                        <div class="jobseeker_heading">
                            <h2 class="max-width-xxsmall heading-style-h2"> Connecting Talent with Opportunity</h2>
                            <div class="jobseeker_description">
                                <p class="max-width-small"> Our platform helps you find the right workers who can contribute to your business success. </p>
                            </div>
                            <a href="jobstreets.html"><button type="button" class="btn btn-primary">Explore More</button></a>
                        </div>
                        <div class="jobseeker_content_wrapper">
                            <div class="jobseeker_item">
                                <div class="jobseeker_host">
                                    <h4 class="heading-style-h4"> FRAGRANCE .ST</h4>
                                    <p> UMKM - Parfume Provider</p>
                                </div>
                                <h4 class="job_position"> Chief Financial Officer </h4>
                                <ul>
                                    <li>Salary Rp3.000.000/Month</li>
                                    <li>Diligent and Creative</li>
                                    <li>Good in teamwork</li>
                                </ul>
                                <a href="jobstreets.html">
                                    <p> Explore More </p>
                                </a>
                            </div>
                            <div class="divider_bottom"></div>
                            <div class="jobseeker_item">
                                <div class="jobseeker_host">
                                    <h4 class="heading-style-h4"> FRAGRANCE .ST</h4>
                                    <p> UMKM - Parfume Provider</p>
                                </div>
                                <h4 class="job_position"> Chief Financial Officer </h4>
                                <ul>
                                    <li>Salary Rp3.000.000/Month</li>
                                    <li>Diligent and Creative</li>
                                    <li>Good in teamwork</li>
                                </ul>
                                <a href="jobstreets.html">
                                    <p> Explore More </p>
                                </a>
                            </div>
                            <div class="divider_bottom"></div>
                            <div class="jobseeker_item">
                                <div class="jobseeker_host">
                                    <h4 class="heading-style-h4"> FRAGRANCE .ST</h4>
                                    <p> UMKM - Parfume Provider</p>
                                </div>
                                <h4 class="job_position"> Chief Financial Officer </h4>
                                <ul>
                                    <li>Salary Rp3.000.000/Month</li>
                                    <li>Diligent and Creative</li>
                                    <li>Good in teamwork</li>
                                </ul>
                                <a href="jobstreets.html">
                                    <p> Explore More </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="py-5 ">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between">
                            <h2 class="heading-style-h2"> Simple steps to be a Part of us </h2>
                            <div class="d-flex flex-column max-width-small align-items-start">
                                <p> To be the leading platform that empowers SMEs to achieve sustainable growth and success.</p>
                                <button class="btn"> Explore </button>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="homepage_steps_card mx-4 my-4 d-flex flex-column align-items-center justify-content-center">
                                    <h4 class="text-center"> Sign Up </h4>
                                    <p class="max-width-xxsmall text-center"> Create an account in just a few minutes.</p>
                                </div>
                                <div class="homepage_steps_card mx-4 my-4 d-flex flex-column align-items-center justify-content-center  background_color_blue">
                                    <h4 class="text-center"> Customize </h4>
                                    <p class="max-width-xxsmall text-center"> Tailor your profile to fit your business needs.</p>
                                </div>
                                <div class="homepage_steps_card mx-4 my-4 d-flex flex-column align-items-center justify-content-center">
                                    <h4 class="text-center"> Explore </h4>
                                    <p class="max-width-xxsmall text-center"> Access our suite of tools and start transforming your business..</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-center gap-5 ">
                                <div class="homepage_steps_number d-flex align-items-center justify-content-center">
                                    <h5> 1 </h5>
                                </div>
                                <div class="divider_bottom max-width-xsmall"></div>
                                <div class="homepage_steps_number d-flex align-items-center  background_color_orange justify-content-center">
                                    <h5> 2 </h5>
                                </div>
                                <div class="divider_bottom max-width-xsmall"></div>
                                <div class="homepage_steps_number d-flex align-items-center justify-content-center">
                                    <h5> 3 </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section position-relative">
            <div class="container py-5">
                <div class="d-flex flex-row justify-content-between">
                    <div class="faq_card px-5 py-5 background_color_blue d-flex flex-column justify-content-center gap-3 sticky-top" style="top: 8em;">
                        <h2 class="heading-style-h2"> Frequently Asked Question</h2>
                        <p> Got Questions? We’ve Got Answers. </p>
                    </div>
                    <div class="d-flex flex-column gap-5">
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                        <div class="divider_bottom"></div>
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                        <div class="divider_bottom"></div>
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                        <div class="divider_bottom"></div>
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                        <div class="divider_bottom"></div>
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                        <div class="divider_bottom"></div>
                        <div class="d-flex flex-column gap-2 max-width-large">
                            <h4 class="heading-style-h4"> What types of marketing solutions do you offer for SMEs? </h4>
                            <p> We provide a range of marketing tools including social media management, email marketing campaigns, SEO optimization, and targeted advertising strategies to help you reach and engage your audience effectively. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section hero position-relative">
            <div class="container py-5">
                <div class="homepage_hero position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center flex-column gap-4">
                    <h2 class="heading-style-h2">Get Started Today!</h2>
                    <p class="text-center max-width-small">Ready to take your business to the next level? Sign up now and experience the power of our all-in-one platform for SMEs. Empower your business with the tools and resources you need to succeed.</p>
                </div>
            </div>
        </div>
        <div class="section" id="footer">
            <div class="container py-5">
                <div class="d-flex flex-column" style="gap: 4em;">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-column gap-3">
                            <h4 class="heading-style-h4"> Stay Connected</h4>
                            <p class="max-width-small"> Join our community and stay up-to-date with the latest news, updates, and special offers. </p>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <h4 class="heading-style-h4"> Contact Us</h4>
                            <p class="max-width-small">Have questions or need support? Reach out to us anytime. We’re here to help you grow your business. </p>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex flex-row gap-2">
                                <p>@sme.plus</p>
                            </div>
                            <div class="d-flex flex-row gap-2">
                                <p> contact@smplus.com</p>
                            </div>
                            <div class="d-flex flex-row gap-2">
                                <p>+62 822 4522 2064</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-end">
                        <img src="assets/logo.png">
                        <p> © 2024 Your Company Name. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>