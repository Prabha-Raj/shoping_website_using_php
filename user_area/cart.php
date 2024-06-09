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

    <!-- internal css -->
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
                            <a class="nav-link" href="#">Contact-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
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
                            ?>
                        </mark>!</a>
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


        <!-- fourth child table start -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- php code for display dynamic data -->
                        <?php
                          global $conn;
                          $total_price = 0;
                          $ip_address = get_ip_address();
                          $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
                          $result = mysqli_query($conn,$cart_query);

                          $result_count = mysqli_num_rows($result);
                          if($result_count > 0){
                            echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Select</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                          while($rows = mysqli_fetch_array($result)){
                            $product_id = $rows['product_id'];
                            // $quantity = $rows['quantity'];
                            $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
                            $result_products = mysqli_query($conn,$select_products);
                            while($row_product_price = mysqli_fetch_array($result_products)){
                              $product_price = array($row_product_price['product_price']);
                              $price_table = $row_product_price['product_price'];
                              $product_title = $row_product_price['product_title'];
                              $product_image1 = $row_product_price['product_image1'];
                              $product_values = array_sum($product_price);
                              $total_price += $product_values;
                              // echo $total_price;
                              ?>
                        <tr>
                            <td class='pt-5'><?php echo $product_title ?></td>
                            <td><img src='./admin_area/product_images/<?php echo $product_image1 ?>' class='cart_img'
                                    alt='apple image' srcset=''></td>
                            <td class='pt-5'><input type='text' name='qty' class='form-input w-50' id=''></td>
                            <?php
                          
                             $get_ip_address = get_ip_address();
                             if(isset($_POST['update_cart'])){
                              $quantities = $_POST['qty'];
                                 $update_cart = "UPDATE `cart` SET quantity=$quantities WHERE ip_address='$get_ip_address'";
                                 $result_product_quantity = mysqli_query($conn,$update_cart);
                                 $total_price = ($total_price*$quantities);
                           }
                          ?>
                            <td class='pt-5'><?php  echo $price_table ?>/-</td>
                            <td class='pt-5'><input type='checkbox' name='removeitem[]'
                                    value='<?php echo $product_id ?>'></td>
                            <td class='pt-5'>
                                <input type='submit' value='Update Cart' name='update_cart'
                                    class='bg-primary text-light  border-0 ' />
                                <input type='submit' value='Remove Cart' name='remove_cart'
                                    class='bg-primary text-light  border-0 ' />
                            </td>
                        </tr>
                        <?php }}
                }else{
                  echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                } ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class='d-flex mb-5'>
                        <?php
                          global $conn;
                        //   $total_price = 0;
                          $ip_address = get_ip_address();
                          $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
                          $result = mysqli_query($conn,$cart_query);
                          $result_count = mysqli_num_rows($result);
                          if($result_count > 0){
                            echo "<h4 class='px-3 m-2 '>Subtotal: <strong class='text-danger'>$total_price/-</strong>
                        </h4>
                        <button class='bg-warning border-0 m-2'><a href='./user_area/checkout.php'
                                class='text-decoration-none text-dark'>Check Out</a></button>
                        <input type='submit' value='Continue Shoping' name='continue_shoping'
                            class='bg-primary text-light border-0 m-2' />";

                        }else{
                        echo "<input type='submit' value='Continue Shoping' name='continue_shoping'
                            class='bg-primary text-light border-0 m-2' />";
                        }
                        if(isset($_POST['continue_shoping'])){
                        echo "<script>
                        window.open('index.php', '_self')
                        </script>";
                        }
                        ?>
                    </div>

                </form>
            </div>
        </div>
        <?php
  function remove_cart_items(){
  global $conn;
     if(isset($_POST['remove_cart'])){
         foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query = "DELETE FROM `cart` WHERE product_id=$remove_id";
            $run_delete = mysqli_query($conn,$delete_query) or die("<script>alert('Not Remove');</script>");
            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }else{
        echo "<script>alert('no');</script>";
    }
}
// remove function calling
if(isset($_POST['remove_cart'])){
     remove_cart_items();
  }
    ?>
        <!-- fourth child table end -->

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