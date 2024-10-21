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

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="./css/style.css" rel="text/css">
    <style>
    body {
        overflow-x: hidden;
    }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start  -->
        <!-- first child start-->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                    <form action="search_products.php" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search"
                            aria-label="Search">
                        <input type="submit" value="search" name="search_data_product"
                            class="btn btn-outline-primary" />
                    </form>
                </div>
            </div>
        </nav>
        <!-- first child end-->
        <!-- Navbar end  -->


        <!-- second child start -->
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
        <!-- second child end -->


        <!-- Third child start -->
        <div class="bg-light">
            <h3 class="text-center">Our Online Store</h3>
            <p class="text-center">Communications is at the heart of E-Commerce and Community</p>
        </div>
        <!-- Third child end -->
                
        <!-- fourth child start -->
        <div class="row px-3">
            <div class="col-md-12">
                <h>Founder of This Company :</h3>
                <h1>Er. Prabhakar Rajput</h1>
                <p class="text-center">Snaps</p>
                <div class="row my-2 ">
                    <div class="col-md-6">
                        <img src="./images/home.png" class="w-100" alt="">
                    </div>
                    <div class="col-md-6">
                        <h4>This is Home Page</h4>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6">
                        <h4>This is Registration Page</h4>
                    </div>
                    <div class="col-md-6">
                        <img src="./images/register.png" class="w-100" alt="">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6">
                        <img src="./images/enquery.png" class="w-100" alt="">
                    </div>
                    <div class="col-md-6">
                        <h4>This is Enquery Page</h4>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6">
                        <h4>This is Cart Page</h4>
                    </div>
                    <div class="col-md-6">
                        <img src="./images/cart.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- fourth child end -->


        <!-- footer start -->
        <!-- include futer  -->
        <?php include('./includes/footer.php'); ?>
        <!-- footer end -->
    </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>