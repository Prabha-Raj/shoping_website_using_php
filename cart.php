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
        .cart_img {
            width: 105px;
            height: 90px;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="display_all_products.php">Products</a></li>
                        <?php if(isset($_SESSION['username'])): ?>
                            <li class='nav-item'><a class='nav-link' href='./user_area/user_profile.php'>My Account</a></li>
                        <?php else: ?>
                            <li class='nav-item'><a class='nav-link' href='./user_area/user_registration.php'>Register</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="./contact.php">Contact-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about.php">About-Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                    </ul>
                    <form action="search_products.php" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                        <input type="submit" value="search" name="search_data_product" class="btn btn-outline-primary" />
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="height:30px;">
            <ul class="navbar-nav me-auto text-light p-0" style="font-weight:500;font-size:15px;">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome <mark class="username bg-secondary" style="color: red;">
                    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></mark>!</a>
                </li>
                <?php if(!isset($_SESSION['username'])): ?>
                    <li class='nav-item'><a href='./user_area/user_login.php' class='nav-link'>Login</a></li>
                <?php else: ?>
                    <li class='nav-item'><a href='./user_area/user_logout.php' class='nav-link'>Log Out</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="bg-light text-center p-3">
            <h3>Our Online Store</h3>
            <p>Communications is at the heart of E-Commerce and Community</p>
        </div>

        <div class="container">
            <div class="row">
                <h1 class="text-center my-4">Your Products</h1>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <?php
                            global $conn;
                            $total_price = 0;
                            $ip_address = get_ip_address();
                            $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
                            $result = mysqli_query($conn, $cart_query);

                            if(mysqli_num_rows($result) > 0):
                                echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>";

                                while($rows = mysqli_fetch_array($result)):
                                    $product_id = $rows['product_id'];
                                    $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
                                    $result_products = mysqli_query($conn, $select_products);
                                    $row_product = mysqli_fetch_array($result_products);

                                    $product_title = $row_product['product_title'];
                                    $product_image1 = $row_product['product_image1'];
                                    $qty = $rows['quantity'];
                                    $product_price = $row_product['product_price'];
                                    $total_price = $product_price * $qty;
                            ?>
                            <tr>
                                <td class='pt-5'><?php echo $product_title; ?></td>
                                <td><img src='./admin_area/product_images/<?php echo $product_image1; ?>' class='cart_img' alt='product image'></td>
                                <td class='pt-5'>
                                    <form action="./cart.php" method="post" >
                                        <div class="d-flex justify-content-center align-items-center" style="flex-direction: row;">
                                        <button name="subone" value="<?php echo $product_id; ?>" class="btn btn-secondary"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" name="qty" value="<?php echo $qty; ?>" min="1" class="form-control mx-2 w-25" readonly>
                                        <button name="addone" value="<?php echo $product_id; ?>" class="btn btn-secondary"><i class="fa-solid fa-add"></i></button>
                                        </div>
                                    </form>
                                </td>
                                <td class='pt-5'><?php echo $total_price; ?>/-</td>
                                <td class='pt-5'>
                                    <button name='remove_cart' value='<?php echo $product_id; ?>' class='btn btn-danger'><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            </tbody>
                            <?php else: ?>
                                <h2 class='text-center text-danger'>Cart is Empty</h2>
                            <?php endif; ?>
                        </table>
                    </div>

                    <div class='d-flex justify-content-between mb-5'>
                        <h4 class='px-3 m-2'>Subtotal: <strong class='text-danger'>
                        <?php
                        $total = 0;
                        $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
                        $result = mysqli_query($conn, $cart_query);
                        while($result_c = mysqli_fetch_array($result)){
                            $total += $result_c['amount'];
                        }
                        echo $total;
                        ?>/-</strong></h4>
                        <div>
                            <button class='btn btn-warning m-2'><a href='./user_area/checkout.php' class='text-decoration-none text-dark'>Check Out</a></button>
                            <a href="index.php" class="btn btn-primary m-2">Continue Shopping</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        function remove_cart_items(){
            global $conn;
            if(isset($_POST['remove_cart'])){
                $remove_id = $_POST['remove_cart'];
                $delete_query = "DELETE FROM `cart` WHERE product_id=$remove_id";
                $run_delete = mysqli_query($conn, $delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }

        // Handling quantity updates
        if(isset($_POST['addone']) || isset($_POST['subone'])){
            $pid = isset($_POST['addone']) ? $_POST['addone'] : $_POST['subone'];
            $is_add = isset($_POST['addone']);
            $cart_query = "SELECT * FROM `cart` WHERE product_id=$pid AND ip_address='$ip_address'";
            $cart_result = mysqli_query($conn, $cart_query);
            $cart_item = mysqli_fetch_array($cart_result);
            $current_qty = $cart_item['quantity'];

            if($is_add){
                $current_qty++;
            } else {
                if($current_qty > 1) {
                    $current_qty--;
                } else {
                    remove_cart_items(); // Remove item if quantity is 1 and decrement is requested
                }
            }

            $new_amount = $current_qty * $cart_item['amount'] / $cart_item['quantity']; // Adjusting total amount
            $update_cart = "UPDATE `cart` SET quantity=$current_qty, amount=$new_amount WHERE product_id=$pid AND ip_address='$ip_address'";
            mysqli_query($conn, $update_cart);
            echo "<script>window.open('cart.php','_self')</script>";
        }

        // Call remove function
        if(isset($_POST['remove_cart'])){
            remove_cart_items();
        }
        ?>

        <!-- Footer start -->
        <?php include('./includes/footer.php'); ?>
        <!-- Footer end -->
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
