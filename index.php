<!-- Include the connect.php file -->
<?php
include('./includes/connect.php');
include('./functions/commun_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website > Home Page</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file link -->
    <link rel="stylesheet" href="./css/style.css" rel="text/css">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            position: sticky; /* Stick the sidebars to the viewport */
            top: 56px; /* Adjust to the height of the navbar */
            height: calc(100vh - 56px); /* Full height minus navbar */
            overflow-y: auto; /* Enable vertical scrolling */
        }
        .sidebar h4 {
            background-color: #ffc107; /* Optional: background color for headers */
            margin: 0; /* Remove default margin */
        }
        /* Slider styles */
        .slider {
            position: relative;
            width: 100vw;
            /* height: 60vh;             */
            margin: auto;
        }
        .slider img {
            width: 100%;
            height: 500px;
            height: auto;
            display: block;
        }
        .prev-btn, .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            cursor: pointer;
        }
        .prev-btn {
            left: 10px;
        }
        .next-btn {
            right: 10px;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="display_all_products.php">Products</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class='nav-item'><a class='nav-link' href='./user_area/user_profile.php'>My Account</a></li>
                        <?php else: ?>
                            <li class='nav-item'><a class='nav-link' href='./user_area/user_registration.php'>Register</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="./contact.php">Contact-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about.php">About-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a></li>
                    </ul>
                    <form action="search_products.php" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-primary" />
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Welcome Message Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="height:30px;">
            <ul class="navbar-nav me-auto text-light p-0" style="font-weight:500; font-size:15px;">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome <mark class="username bg-secondary" style="color: red;">
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></mark>!</a>
                </li>
                <?php if (!isset($_SESSION['username'])): ?>
                    <li class='nav-item'><a href='./user_area/user_login.php' class='nav-link'>Login</a></li>
                <?php else: ?>
                    <li class='nav-item'><a href='./user_area/user_logout.php' class='nav-link'>Log Out</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    
    <!-- Slider -->
    <div class="slider" style="width: 100vw; border:1px solid">
        <img id="sliderImage" src="https://rainbowit.net/html/trydo/assets/images/bg/bg-image-30.jpg" alt="Slider Image">
        <div class="prev-btn" onclick="prevImage()">←</div>
        <div class="next-btn" onclick="nextImage()">→</div>
    </div>
    <!-- slider end -->
    <!-- Main Content -->
    <div class="bg-light text-center py-3">
        <h3>Our Online Store</h3>
        <p>Communications is at the heart of E-Commerce and Community</p>
    </div>

    <div class="row">
        <!-- Sidebar section start -->
        <div class="col-md-2 sidebar bg-secondary text-light p-1">
            <h4 class="text-center">Delivery Brands</h4>
            <ul class="nav flex-column text-center">
                <?php get_brands(); ?>
            </ul>
        </div>
        <!-- Sidebar section end -->

        <!-- Products section start -->
        <div class="col-md-8">
            <div class="row">
                <?php
                get_products();
                get_unique_category();
                get_unique_brand();
                cart();
                ?>
            </div>
        </div>
        <!-- Products section end -->

        <!-- Sidebar section start -->
        <div class="col-md-2 sidebar bg-secondary text-light p-1">
            <h4 class="text-center">Categories</h4>
            <ul class="nav flex-column text-center text-light">
                <?php get_categories(); ?>
            </ul>
        </div>
        <!-- Sidebar section end -->
    </div>

    <!-- Footer start -->
    <?php include('./includes/footer.php'); ?>
    <!-- Footer end -->

    <script>
        let index = 0;
        const images = [
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-1.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-2.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-3.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-4.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-5.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-6.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-7.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-8.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-9.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-10.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-11.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-12.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-13.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-14.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-15.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-16.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-17.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-18.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-19.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-21.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-22.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-23.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-25.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-26.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-27.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-28.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-29.jpg",
            "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-30.jpg"
        ];

        function nextImage() {
            index = (index === images.length - 1) ? 0 : index + 1;
            document.getElementById("sliderImage").src = images[index];
        }

        function prevImage() {
            index = (index === 0) ? images.length - 1 : index - 1;
            document.getElementById("sliderImage").src = images[index];
        }
    </script>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
