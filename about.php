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
    <link rel="stylesheet" href="./css/style.css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        .navbar {
            background:linear-gradient(90deg, #00264d, #005b99);
        }

        .navbar .nav-link {
            color: #ffffff;
        }

        .navbar .nav-link:hover {
            color: #ffc107;
        }

        .logo {
            width: 120px;
        }

        h1, h4 {
            color: #343a40;
        }

        h3 {
            color: #007bff;
        }

        .bg-light {
            background-color: #e9ecef !important;
            padding: 20px;
            border-radius: 10px;
        }

        .row img {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Button styling */
        .btn-outline-primary {
            border-radius: 30px;
        }

        .btn-outline-primary:hover {
            background-color: #6610f2;
            color: #fff;
            border-color: #6610f2;
        }

        .username {
            font-weight: bold;
            color: #6610f2;
        }

        /* Responsive table and content */
        .content-section {
            padding: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .navbar-nav{
            display:flex;
            gap:40px;
            align-items:center;
        }

    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all_products.php">Products</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_profile.php'>My Account</a>
                        </li>";
                        }else{
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Contact-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">About-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price();?>/-</a>
                        </li>
                    </ul>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="height:30px;">
            <ul class="navbar-nav me-auto text-light p-0" style="font-weight:500;font-size:15px;">
                <li class="nav-item">
                    <a href="#" class="nav-link ">Welcome <mark class="username bg-secondary" style="color: red;">
                            <?php
                            if(!isset($_SESSION['username'])){
                                echo "Guest";
                            }else{
                                echo $_SESSION['username'];
                            } 
                            ?> </mark>!</a>
                </li>
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a href='./user_area/user_login.php' class='nav-link'>Login</a>
                    </li>";
                }else{
                    echo "<li class='nav-item'>
                    <a href='./user_area/user_logout.php' class='nav-link'>Log Out</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>

                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Second child start -->

        <!-- Second child end -->

        <!-- Third child start -->
        <div class="bg-light text-center p-3">
            <h3>Our Online Store</h3>
            <p>Communications is at the heart of E-Commerce and Community</p>
        </div>
        <!-- Third child end -->

        <!-- Fourth child start -->
        <div class="row px-3 content-section">
            <div class="col-md-12">
                <h4 class="text-center">Founder of This Company:</h4>
                <h1 class="text-center">Er. Prabhakar Rajput</h1>
                <p class="text-center">Snapshots</p>
                <div class="row my-4">
                    <div class="col-md-6">
                        <img src="./images/home.png" class="w-100" alt="Home">
                    </div>
                    <div class="col-md-6">
                        <h4>This is Home Page</h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <h4>This is Registration Page</h4>
                    </div>
                    <div class="col-md-6">
                        <img src="./images/register.png" class="w-100" alt="Registration">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <img src="./images/enquery.png" class="w-100" alt="Enquiry">
                    </div>
                    <div class="col-md-6">
                        <h4>This is Enquiry Page</h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <h4>This is Cart Page</h4>
                    </div>
                    <div class="col-md-6">
                        <img src="./images/cart.png" class="w-100" alt="Cart">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fourth child end -->

        <!-- Footer start -->
        <footer class="text-center">
            <div class="container">
                <p>&copy; 2024 All Rights Reserved. Powered by Prabhakar</p>
                <a href="#">Back to top</a>
            </div>
        </footer>
        <!-- Footer end -->
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
