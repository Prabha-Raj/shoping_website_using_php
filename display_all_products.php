<?php 
include('./functions/commun_function.php'); 
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website > All Products</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file link -->
    <link rel="stylesheet" href="./css/style.css" rel="text/css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f5f5f5;
        }

        /* Align with the index.php navbar */
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

        /* Sidebar styling */
        .sidebar {
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
            font-weight: bold;
        }

        /* Products section */
        .products-section {
            padding: 20px;
        }

        .products-section h3 {
            color: #00264d;
            text-align: center;
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
                <form action="search_products.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Welcome Message -->
    <div class="products-section">
        <h3>Our Products</h3>
    </div>

    <!-- Main Content -->
    <div class="row px-3">
        <!-- Products section start -->
        <div class="col-md-10">
            <div class="row">
                <?php 
                search_product();
                get_all_products();
                get_unique_category();
                get_unique_brand();
                cart();
                ?>
            </div>
        </div>
        <!-- Products section end -->

        <!-- Sidebar section start -->
        <div class="col-md-2 sidebar">
            <h4>Delivery Brands</h4>
            <ul>
                <?php get_brands(); ?>
            </ul>

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

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>
