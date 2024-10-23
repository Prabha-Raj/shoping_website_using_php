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
    <title>User Login</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file link -->
    <link rel="stylesheet" href="../css/style.css" rel="text/css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f5f5f5;
        }

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

        .form-container {
            background-color: #00264d;
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .form-container h1 {
            color: #ffc107;
            margin-bottom: 20px;
        }

        .form-label {
            color: #fff;
        }

        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: #00264d;
        }

        footer {
            background-color: #00264d;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../display_all_products.php">Products</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class='nav-item'><a class='nav-link' href='./user_profile.php'>My Account</a></li>
                        <?php else: ?>
                            <li class='nav-item'><a class='nav-link' href='./user_registration.php'>Register</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="../contact.php">Contact-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../about.php">About-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
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

        <!-- Welcome Message -->
        <div class="bg-light">
            <h3 class="text-center">Welcome to Our Online Store</h3>
            <p class="text-center">Your favorite products just a click away!</p>
        </div>

        <!-- Login Form -->
        <div class="container form-container">
            <h1 class="text-center">Login Here</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="form-label" for="user_username">Username:</label>
                    <input type="text" name="user_username" class="form-control" placeholder="Enter username" required="true">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="user_password">Password:</label>
                    <input type="password" name="user_password" class="form-control" placeholder="Enter password" required="true">
                </div>
                <div class="text-center mt-3 mb-5">
                    <input type="submit" value="Login" class="btn btn-outline-warning py-2 px-3 w-100" name="user_login">
                    <p class="small fw-bold mt-2 text-light">Don't have an account? <strong><a href="user_registration.php" class="text-primary">Register</a></strong>.</p>
                </div>
            </form>
        </div>
        <!-- Login Form end -->

        <!-- Footer start -->
        <?php include('./includes/footer.php'); ?>
        <!-- Footer end -->
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<!-- PHP code for login system -->
<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
    $result = mysqli_query($conn, $select_query) or die("<script>alert('Not selected !')</script>");
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    $user_ip = get_ip_address();
    $select_query_cart = "SELECT * FROM `cart` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($conn, $select_query_cart) or die("<script>alert('Not selected !')</script>");
    $row_count_cart = mysqli_num_rows($result_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            echo "<script>alert('You are logged in successfully!')</script>";
            if ($row_count == 1 && $row_count_cart == 0) {
                echo "<script>open('./user_profile.php','_self')</script>";
            } else {
                echo "<script>open('./payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid password, please try again!')</script>";
        }
    } else {
        echo "<script>alert('Invalid username, please try again!')</script>";
    }
}
?>
