<?php
include('../includes/connect.php');
@session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    // echo $order_id;
    $select_data = "SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result = mysqli_query($conn,$select_data);
    $fetch_data = mysqli_fetch_assoc($result);
    $invoice_number = $fetch_data['invoice_number'];
    $amount_due = $fetch_data['amount_due'];
    
    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO `user_payments`(order_id,invoice_number,amount,payment_mode) 
        VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
        $result_query = mysqli_query($conn,$insert_query);
        if($result_query){
            echo "<script>alert('Payment Successful !')</script>";
            $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
            $result_update = mysqli_query($conn,$update_orders);
            echo "<script>open('user_profile.php?my_orders','_self')</script>";
        }else{
            echo "<script>alert('Payment Failed !')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerse website > Confirm Payment Page</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-secondary">
    <h1 class="text-light text-center mt-3 mb-5">Confirm Payment</h1>
    <form action="" method="post" >
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>" placeholder="Invoice Number">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="amount " class="text-light">Amount</label>
        <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" placeholder="Enter Amount">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" id="" class="form-select w-50 m-auto">
                <option value="">Select Payment Mode</option>
                <option value="UPI">UPI</option>
                <option value="Net Banking">Net Banking</option>
                <option value="Paypal">Paypal</option>
                <option value="Paytm">Paytm</option>
                <option value="Google Pay">Google Pay</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
        <input type="submit" value="Confirm Payment" class="btn btn-outline-warning w-50 m-auto " name="confirm_payment">
        </div>
    </form>
</body>
</html>