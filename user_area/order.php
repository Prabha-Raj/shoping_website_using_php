<?php
include('../includes/connect.php');
include('../functions/commun_function.php');

// getting user id
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    // echo $user_id;
}

// gettingn  total items and total price of items.
$user_ip = get_ip_address();
$cart_query_price = "SELECT * FROM `cart` WHERE ip_address='$user_ip'";
$result_cart_price = mysqli_query($conn,$cart_query_price);
$invoice_number = mt_rand();
$status = "Pending";
$total_price=0;
$count_products = mysqli_num_rows($result_cart_price);
while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price = mysqli_query($conn,$select_product) or die("<script>alert('Products not selected');</script>");
    // $count_rows = mysqli_num_rows($result_cart_price);
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

// getting quantity from cart table
$get_cart = "SELECT * FROM `cart`";
$run_cart = mysqli_query($conn,$get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
}

$insert_orders = "INSERT INTO `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status)
VALUES ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query = mysqli_query($conn,$insert_orders);
if($result_query){
    echo "<script>alert('Order is submitted successfully !')</script>";
    echo "<script>open('user_profile.php','_self')</script>";
}

// orders pending
$insert_pending_orders = "INSERT INTO `pending_orders` (user_id,invoice_number,product_id,quantity,order_status)
VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders = mysqli_query($conn,$insert_pending_orders);

// delete items from cart
$empty_cart = "DELETE FROM `cart` WHERE ip_address='$user_ip'";
$result_delete = mysqli_query($conn,$empty_cart);


?>