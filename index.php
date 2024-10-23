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
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar styling */
        .navbar {
            background: linear-gradient(90deg, #00264d, #005b99);
            padding: 1rem;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            margin: 0 15px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar .btn-outline-primary {
            color: #ffc107;
            border-color: #ffc107;
        }

        .navbar .btn-outline-primary:hover {
            background-color: #ffc107;
            color: #00264d;
        }

        /* Slider styles */
        .slider {
            position: relative;
            width: 100%;
            height: 500px;
            /* margin: 20px 0; */
        }

        .slider img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            /* border-radius: 10px; */
        }

        .prev-btn, .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 40px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .prev-btn:hover, .next-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .prev-btn {
            left: 20px;
        }

        .next-btn {
            right: 20px;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 56px;
            height: calc(100vh - 56px);
            background-color: #00264d;
            color: white;
            padding: 20px;
            /* border-radius: 10px; */
        }

        .sidebar h4 {
            background-color: #ffc107;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            /* border-radius: 5px; */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            margin: 10px 0;
            background-color: #005b99;
            text-align: center;
            /* border-radius: 5px; */
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-weight:bold;
        }

        /* Content */
        .bg-light {
            background-color: #f5f5f5;
            padding: 20px;
            /* border-radius: 10px; */
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .bg-light h3 {
            color: #00264d;
        }

        .bg-light p {
            color: #005b99;
        }

        /* Footer */
        footer {
            background-color: #00264d;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="./images/logo.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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
                <!-- <form action="search_products.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form> -->
                    <!-- Welcome Message -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:100%;">
        <ul class="navbar-nav me-auto text-light" style="font-weight:500;">
            <li class="nav-item">
                <a href="#" class="nav-link">Welcome <mark class="username bg-dark" style="color: yellow;">
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
        </div>
    </nav>
    <!-- Navbar end -->




    <!-- Slider -->
    <div class="slider">
        <img id="sliderImage" src="https://rainbowit.net/html/trydo/assets/images/bg/bg-image-30.jpg" alt="Slider Image">
        <div class="prev-btn" onclick="prevImage()">←</div>
        <div class="next-btn" onclick="nextImage()">→</div>
    </div>

    <!-- Main Content -->
    <div class="bg-light text-center py-3">
        <h3>Our Online Store</h3>
        <p>Communications is at the heart of E-Commerce and Community</p>
    </div>

    <div class="row">
        <!-- Sidebar section start -->
        <div class="col-md-2 sidebar">
            <h4>Delivery Brands</h4>
            <ul>
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
        <div class="col-md-2 sidebar">
            <h4>Categories</h4>
            <ul>
                <?php get_categories(); ?>
            </ul>
        </div>
        <!-- Sidebar section end -->
    </div>

    <!-- Footer start -->
    <footer>
        <p>© 2024 E-Commerce Website. All Rights Reserved.</p>
    </footer>
    <!-- Footer end -->

    <script>
    let index = 0;
    const images = [
        "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-2.jpg",
        "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-4.jpg",
        "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-5.jpg",
        "https://rainbowit.net/html/trydo/assets/images/bg/bg-image-6.jpg",
    ];

    let sliderImage = document.getElementById("sliderImage");

    function updateImage() {
        sliderImage.src = images[index];
    }

    function nextImage() {
        index = (index + 1) % images.length;
        updateImage();
    }

    function prevImage() {
        index = (index - 1 + images.length) % images.length;
        updateImage();
    }

    setInterval(nextImage, 4000);

    sliderImage.style.transition = 'opacity 0.5s ease-in-out';
    sliderImage.style.opacity = 0;

    sliderImage.addEventListener('load', function () {
        sliderImage.style.opacity = 1;
    });
</script>


    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
