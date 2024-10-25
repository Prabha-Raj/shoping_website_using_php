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
    <title>E-Commerce Website > Query Page</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="./css/style.css" rel="text/css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .query-container {
            /* background-color: #343a40; */
            background:linear-gradient(90deg, #00264d, #005b99);
            color: #f8f9fa;
            padding: 30px;
            /* border-radius: 10px; */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: 500;
            margin-top: 10px;
        }

        .btn-outline-warning {
            background-color: #ffc107;
            border: none;
            font-weight: 600;
            color: #343a40;
        }

        .btn-outline-warning:hover {
            background-color: #e0a800;
            color: #fff;
        }



        .navbar {
            /* background-color: #007bff; */
            background:linear-gradient(90deg, #00264d, #005b99);

        }

        .navbasr{
        display:flex;
        gap:40px;
    }

        .navbar-dark .nav-link {
            color: #f8f9fa;
        }

        .navbar-dark .nav-link:hover {
            color: #ffdd57;
        }

        .text-center h1 {
            font-weight: 700;
            color: #ffc107;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbasr me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="display_all_products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="./contact.php">Contact-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about.php">About-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">
                            <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a></li>
                    </ul>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto p-0">
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        Welcome <mark class="username bg-secondary text-danger">
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>
                        </mark>!
                    </a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a href='./user_area/user_login.php' class='nav-link'>Login</a></li>";
                } else {
                    echo "<li class='nav-item'><a href='./user_area/user_logout.php' class='nav-link'>Logout</a></li>";
                }
                ?>
            </ul>
        </nav>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Second Navbar start -->

        <!-- Second Navbar end -->

        <!-- Header Section -->
        <div class="bg-light p-5">
            <h3 class="text-center">Our Online Store</h3>
            <p class="text-center">Communication is at the heart of E-Commerce and Community</p>
        </div>

        <!-- Query Form Section -->
        <div class="row p-5 ">
            <h1 class="text-center text-dark">Submit Your Query</h1>
            <div class="col-md-6 p-5 m-auto query-container">
                <form action="" method="post">
                    <label for="mnum">Enter your Mobile Number:</label>
                    <input type="number" name="mnum" id="mnum" required class="form-control">

                    <label for="wnum">Enter your WhatsApp Number:</label>
                    <input type="number" name="wnum" id="wnum" required class="form-control">

                    <label for="email">Enter your Email:</label>
                    <input type="email" name="email" id="email" required class="form-control">

                    <label for="subject">Subject of your Query:</label>
                    <input type="text" name="subject" id="subject" required class="form-control">

                    <label for="query">Write about your query:</label>
                    <textarea name="query" id="query" required class="form-control"></textarea>

                    <input type="submit" value="Submit" name="submitquery" class="btn btn-outline-warning w-100 my-3">
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submitquery'])) {
            $mnum = $_POST['mnum'];
            $wnum = $_POST['wnum'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $query = $_POST['query'];

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $select = "SELECT * FROM `user_table` WHERE user_name='$username'";
                $result = mysqli_query($conn, $select);
                $rows = mysqli_fetch_array($result);
                $user_id = $rows['user_id'];
                $query = "INSERT INTO `enquery` (user_id, mnumber, wnumber, email, querysubject, querytext, querydate) 
                          VALUES ('$user_id', '$mnum', '$wnum', '$email', '$subject', '$query', NOW())";
                $run_query = mysqli_query($conn, $query);

                if ($run_query) {
                    echo '<script>alert("Query Submitted Successfully!")</script>';
                } else {
                    echo '<script>alert("Submission Failed!")</script>';
                }
            } else {
                echo "<script>open('./user_area/user_login.php', '_self')</script>";
            }
        }
        ?>

        <!-- Footer -->
        <?php include('./includes/footer.php'); ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
