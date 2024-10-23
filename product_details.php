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
    <title>E-Commerce Website > Product_details</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="./css/style.css" rel="text/css">
    <style>
    body {
        background: #f7f8fa;
        overflow-x: hidden;
    }

    .navbar {
            background: linear-gradient(90deg, #00264d, #005b99);
            padding: 1rem;

        }

    .navbar-nav .nav-link {
        color: white;
        transition: color 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        color: #f8b400;
    }

    .navbar-toggler {
        background-color: #f8b400;
    }

    /* Product Cards */
    .card {
        border: none;
        /* border-radius: 12px; */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
        margin:10px;
    }

    .card img {
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .sidebar {
        position: sticky;
        top: 0;
        background-color: background: linear-gradient(90deg, #00264d, #005b99);
        border-radius: 12px;
    }

    .sidebar a {
        color: white;
        transition: background-color 0.3s ease-in-out;
    }

    .sidebar a:hover {
        background-color: #eab308;
        color: white;
    }


    /* Typography */
    h3 {
        color: #333;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }

    .text-center {
        font-family: 'Open Sans', sans-serif;
    }

    .navbasr{
        display:flex;
        gap:40px;
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
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbasr me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all_products.php">Products</a>
                        </li>
                        <!-- Dynamic User Links -->
                        <?php if(isset($_SESSION['username'])): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_profile.php'>My Account</a>
                        </li>
                        <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Contact-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">About-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form action="search_products.php" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search"
                            aria-label="Search">
                        <input type="submit" value="search" name="search_data_product"
                            class="btn btn-outline-primary" />
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Main content and Sidebar -->
        <div class="row px-3">
            <!-- Products section start -->
            <div class="col-md-10">
                <div class="row">
                    <!-- Dynamic product details -->
                    <?php 
                        view_product_details();
                        get_unique_category();
                        get_unique_brand();
                        cart();
                    ?>
                </div>
            </div>

            <!-- Sidebar section start -->
            <div class="col-md-2 sidebar p-0">
                <!-- Brands Section -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-warning">
                        <a href="#" class="nav-link text-dark">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <!-- Display Brands via Database -->
                    <div style="background:linear-gradient(90deg, #00264d, #005b99)"><?php get_brands(); ?></div>
                </ul>
                <!-- Categories Section -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-warning">
                        <a href="#" class="nav-link text-dark">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <!-- Display Categories via Database -->
                  <div style="background:linear-gradient(90deg, #00264d, #005b99)"> <?php get_categories(); ?></div> 
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <?php include('./includes/footer.php'); ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
