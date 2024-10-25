<!-- Include the connect.php file -->
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
    <title>User Registration</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="../css/style.css" rel="text/css">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f5f5f5; /* Light background for the entire page */
        }

        .navbar {
            background: linear-gradient(90deg, #00264d, #005b99); /* Dark blue navbar */
        }

        .bg-secondary {
            background-color: #005b99 !important; /* Darker secondary background for forms */
        }

        .form-label {
            color: #ffc107; /* Yellow color for form labels */
        }

        .btn-outline-warning {
            color: #ffc107; /* Button text color */
            border-color: #ffc107; /* Button border color */
        }

        .btn-outline-warning:hover {
            background-color: #ffc107; /* Button hover background color */
            color: #000; /* Button hover text color */
        }

        .navbar-nav{
            display:flex;
            color:white !important;
            font-size:15px;
            /* font-weight:bold; */
            gap:40px;
        }

        .navbar-nav .nav-item a{
            color:white;
        }

        .bgColor{
            background: linear-gradient(90deg, #00264d, #005b99);
            width: 70%;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all_products.php">Products</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_profile.php'>My Account</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">About-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price();?>/-</a>
                        </li>
                    </ul>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="height:60px;">
            <ul class="navbar-nav me-auto text-light p-0" style="font-weight:500;font-size:15px;">
                <li class="nav-item">
                    <a href="#" class="nav-link ">Welcome <mark class="username bg-secondary" style="color: red;">
                            <?php
                            if(!isset($_SESSION['username'])){
                                echo "Guest";
                            } else {
                                echo $_SESSION['username'];
                            } 
                            ?> </mark>!</a>
                </li>
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a href='./user_login.php' class='nav-link'>Login</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a href='./user_logout.php' class='nav-link'>Log Out</a>
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
        <div class="bg-light">
            <h3 class="text-center">Our Online Store</h3>
            <p class="text-center">Communications is at the heart of E-Commerce and Community</p>
        </div>
        <!-- Third child end -->

        <!-- New registration form -->
        <div class="row p-5">
            <h1 class="text-center text-dark">Register Yourself</h1>
            <div class="col-md-6 p-5 m-auto bgColor">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_username">Username :</label>
                        <input type="text" name="user_username" class="form-control input-group"
                            placeholder="Enter user name" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_email">Email :</label>
                        <input type="email" name="user_email" class="form-control input-group"
                            placeholder="Enter user email" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_image">Profile Image :</label>
                        <input type="file" name="user_image" class="form-control input-group" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_password">Password :</label>
                        <input type="password" name="user_password" class="form-control input-group"
                            placeholder="Enter password" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="conf_user_password">Confirm Password :</label>
                        <input type="password" name="conf_user_password" class="form-control input-group"
                            placeholder="Enter confirm password" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_address">Address :</label>
                        <input type="text" name="user_address" class="form-control input-group"
                            placeholder="Enter your address" required="true" id="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light" for="user_contact">Contact No :</label>
                        <input type="number" name="user_contact" class="form-control input-group"
                            placeholder="Enter mobile no" required="true" id="">
                    </div>
                    <div class="text-center mt-3 mb-3 ">
                        <input type="submit" value="Register" class="btn btn-outline-warning py-2 px-3 w-100"
                            name="user_register">
                        <p class="small fw-bold mt-2">Already have an account ? <strong><a href="user_login.php"
                                class="text-danger">Login</a></strong>.</p>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fourth child end -->

        <!-- Footer start -->
        <?php include('./includes/footer.php'); ?>
        <!-- Footer end -->
    </div>

    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<!-- PHP code for registration -->
<?php
global $conn;
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $connf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = get_ip_address();
    
    if($user_password == $connf_user_password){
        $select_query = "SELECT * FROM  `user_table` WHERE user_name='$user_username'";
        $result = mysqli_query($conn,$select_query) or die("<script>alert('Not selected !')</script>");
        $result_count = mysqli_num_rows($result);
        
        if($result_count > 0){
            echo "<script>alert('This Username Already Existed !')</script>";
        } else {
            // Inserting user data into the database
            $insert_query = "INSERT INTO `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
            VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
            $run_sql_query = mysqli_query($conn,$insert_query);
            
            if($run_sql_query){
                move_uploaded_file($user_image_temp,"./user_images/$user_image");
                echo "<script>alert('Thanks, & Welcome To Login page')</script>";
                echo "<script>open('./user_login.php','_self')</script>";
            } else {
                echo "<script>alert('Oops !, Something Wrong.')</script>";
            }
        }
    } else {
        echo "<script>alert('Password and Confirm Password are Not matched !')</script>";
    }

    $select_cart_item = "SELECT * FROM  `cart` WHERE ip_address='$user_ip'";
    $result = mysqli_query($conn,$select_cart_item) or die("<script>alert('Not selected !')</script>");
    $result_count = mysqli_num_rows($result);
    
    if($result_count > 0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Some item in your Cart !')</script>";
        echo "<script>open('./checkout.php','_self')</script>";
    } else {
        echo "<script>open('../index.php','_self')</script>";
    }
}
?>
