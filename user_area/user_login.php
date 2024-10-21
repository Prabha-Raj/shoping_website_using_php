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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="../css/style.css" rel="text/css">
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
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all_products.php">Products</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
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
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form action="search_products.php" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                        <input type="submit" value="search" name="search_data_product" class="btn btn-outline-primary" />
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
                            if (!isset($_SESSION['username'])) {
                                echo "Guest";
                            } else {
                                echo $_SESSION['username'];
                            }
                            ?> </mark>!</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
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
        <!-- second child end -->


        <!-- Third child start -->
        <div class="bg-light">
            <h3 class="text-center">Our Online Store</h3>
            <p class="text-center">Communications is at the heart of E-Commerce and Community</p>
        </div>
        <!-- Third child end -->


        <!-- fourth child start -->
        <!-- login form -->
        <!-- <div class="row px-3">
            <div class="container-fluid my-3">
                <h2 class="text-center">User Login Here</h2>
                <div class="row d-flex align-item-center justify-content-center mt-5">
                    <div class="col-lg-6 col-xl-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-outlin mb-4">
                                <lable class="form-lable" for="user_username">Username :</lable>
                                <input type="text" name="user_username" class="form-control" placeholder="Enter user name" required="true" id="">
                            </div>
                            <div class="form-outlin mb-4">
                                <lable class="form-lable" for="user_password">Password :</lable>
                                <input type="password" name="user_password" class="form-control" placeholder="Enter password" required="true" id="">
                            </div>
                            <div class="text-center mt-3 mb-5 ">
                                <input type="submit" value="Login" class="btn btn-outline-primary py-2 px-3 w-100" name="user_login">
                                <p class="small fw-bold mt-2">Already have an account ? <strong><a href="user_registration.php" value='user_registration' class="text-danger">Register</a></strong>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> -->
        <!-- new login  form -->
        <div class="row p-5 bg-dark" >
            <h1 class="text-center text-light">Login Here</h1>
            <div class="col-md-6 p-5 m-auto bg-secondary rounded-4">
            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-outlin mb-4">
                                <lable class="form-lable text-light" for="user_username">Username :</lable>
                                <input type="text" name="user_username" class="form-control input-group" placeholder="Enter user name" required="true" id="">
                            </div>
                            <div class="form-outlin mb-4">
                                <lable class="form-lable text-light" for="user_password">Password :</lable>
                                <input type="password" name="user_password" class="form-control input-group" placeholder="Enter password" required="true" id="">
                            </div>
                            <div class="text-center mt-3 mb-5 ">
                                <input type="submit" value="Login" class="btn btn-outline-warning py-2 px-3 w-100" name="user_login">
                                <p class="small fw-bold mt-2 text-light">Already have an account ? <strong><a href="user_registration.php" value='user_registration' class="text-primary">Register</a></strong>.</p>
                            </div>
                        </form>
                </form>                
            </div>
        </div>
        <!-- fourth child end -->

        <!-- footer start -->
        <!-- include futer  -->
        <?php include('./includes/footer.php'); ?>
        <!-- footer end -->
    </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>


<!-- php code for registration -->
<?php
global $conn;
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $connf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = get_ip_address();
    if ($user_password == $connf_user_password) {
        $select_query = "SELECT * FROM  `user_table` WHERE user_name='$user_username'";
        $result = mysqli_query($conn, $select_query) or die("<script>alert('Not selected !')</script>");
        $result_count = mysqli_num_rows($result);
        if ($result_count > 0) {
            echo "<script>alert('This Username Already Existed !')</script>";
        } else {
            // inserting user data in database
            $insert_query = "INSERT INTO `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
            $run_sql_query = mysqli_query($conn, $insert_query);
            if ($run_sql_query) {
                move_uploaded_file($user_image_temp, "./user_images/$user_image");
                echo "<script>alert('Thanks, & Welcome To Login page')</script>";
                echo "<script>open('./user_login.php','_self')</script>";
            } {
                echo "<script>alert('Oops !, Something Wrong.')</script>";
            }
        }
    } else {
        echo "<script>alert('Password and Confirm Password are Not mached !')</script>";
    }
    $select_cart_item = "SELECT * FROM  `cart` WHERE ip_address='$user_ip'";
    $result = mysqli_query($conn, $select_cart_item) or die("<script>alert('Not selected !')</script>");
    $result_count = mysqli_num_rows($result);
    if ($result_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Some item in your Cart !')</script>";
        echo "<script>open('./checkout.php','_self')</script>";
    } else {
        echo "<script>open('../index.php','_self')</script>";
    }
}
?>

<!-- php cod for login system -->
<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM  `user_table` WHERE user_name='$user_username'";
    $result = mysqli_query($conn, $select_query) or die("<script>alert('Not selected !')</script>");
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    $user_ip = get_ip_address();
    $select_query_cart = "SELECT * FROM  `cart` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($conn, $select_query_cart) or die("<script>alert('Not selected !')</script>");
    $row_count_cart = mysqli_num_rows($result_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            echo "<script>alert('You are Loged in Successfully !')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>open('./user_profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>open('./payment.php','_self')</script>";
                // include('./payment.php');
            }
        } else {
            echo "<script>alert('Invalid Password, Please Try again !')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username, Please Try again !')</script>";
    }
}
?>