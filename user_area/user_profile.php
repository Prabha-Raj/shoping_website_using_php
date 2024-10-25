<?php 
include('../includes/connect.php'); 
include('../functions/commun_function.php'); 
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website > User Profile</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f5f5f5;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #00264d, #005b99);
            padding: 1rem;
            display:flex;
            gap:50px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 15px;
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

        /* Sidebar */
        .sidebar {
            background-color: #00264d;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction:column;
            align-items:center;
        }

        .sidebar img{
            height:200px;
            width:200px;
            border-radius:50%;
        }

        .sidebar h4 {
            height:60px;
            width: 300px;
            background-color: #ffc107;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            height:60px;
            width: 300px;
            padding: 10px;
            margin: 10px 0;
            background-color: #005b99;
            text-align: center;
        }

        .navbar .navbar-nav{
            display:flex;
            gap:40px;
            align-items:center;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* Profile Content */
        .profile-container {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }


        /* Welcome Bar */
        .welcome-bar {
            height: 40px;
            background-color: #6c757d;
            color: white;
            padding-left: 15px;
            line-height: 40px;
        }

        .welcome-bar a {
            color: #ffc107;
            float: right;
            margin-right: 20px;
        }

        footer {
            background-color: #00264d;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Main Container -->
    <div class="container-fluid p-0">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../index.php">
                    <img src="../images/logo.png" alt="logo" class="logo" style="width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../display_all_products.php">Products</a></li>
                        <li class='nav-item'><a class='nav-link' href='#'>My Account</a></li>
                        <li class="nav-item"><a class="nav-link" href="../contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a></li>
                    </ul>
                    <!-- Welcome Message -->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <ul class="navbar-nav me-auto text-light">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Welcome <mark class="bg-dark" style="color: yellow;"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></mark>!</a>
                            </li>
                            <?php if (!isset($_SESSION['username'])): ?>
                                <li class="nav-item"><a href='../user_area/user_login.php' class='nav-link'>Login</a></li>
                            <?php else: ?>
                                <li class="nav-item"><a href='../user_area/user_logout.php' class='nav-link'>Log Out</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>

        <!-- Welcome Bar -->

        <!-- Profile Section -->
        <div class="container-fluid profile-container mt-4">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 sidebar">
                    <h4>Your Profile</h4>
                    <?php
                        $username = $_SESSION['username'];
                        $select_user_image = "SELECT * FROM `user_table` WHERE user_name='$username'";
                        $result_image = mysqli_query($conn, $select_user_image);
                        $row_image = mysqli_fetch_array($result_image);
                        $user_image = $row_image['user_image'];
                    ?>
                    <img src="./user_images/<?php echo $user_image ?>" alt="user profile" class="">

                    <ul class="navbar-nav text-center">
                        <li class="nav-item"><a href="user_profile.php" class="nav-link">Pending Orders</a></li>
                        <li class="nav-item"><a href="user_profile.php?edit_user_account" class="nav-link">Edit Account</a></li>
                        <li class="nav-item"><a href="user_profile.php?my_orders" class="nav-link">My Orders</a></li>
                        <li class="nav-item"><a href="user_profile.php?delete_user_account" class="nav-link">Delete Account</a></li>
                        <li class="nav-item"><a href="user_logout.php" class="nav-link">Log Out</a></li>
                    </ul>
                </div>

                <!-- Content Section -->
                <div class="col-md-9 content-section">
                    <?php 
                        get_user_orders_details(); 
                        if (isset($_GET['edit_user_account'])) {
                            include("edit_user_account.php");
                        }
                        if (isset($_GET['my_orders'])) {
                            include("user_orders.php");
                        }
                        if (isset($_GET['delete_user_account'])) {
                            include("delete_user_account.php");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 E-Commerce Website. All rights reserved.</p>
        </footer>

    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
