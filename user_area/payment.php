<?php
include('../includes/connect.php');
include('../functions/commun_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Option</title>
    
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body {
        overflow-x: hidden;
    }
    .img{
        width: 90%;
        margin: auto;
        display: block;
    }

    </style>
</head>
<body>
    <!-- php code for get user id from database -->
    <?php
        $user_ip=get_ip_address();
        $select_user = "SELECT * FROM  `user_table` WHERE user_ip='$user_ip'";
        $result = mysqli_query($conn,$select_user) or die("<script>alert('user not found')</script>");
        $result_user = mysqli_fetch_array($result);
        $user_id=$result_user['user_id'];
        // echo $user_id;
    ?>
    <div class="container-fluid">
        <h1 class="text-success text-center h1">Payment Option</h1>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="www.paypal.com"><img src="../images/upi-payment-icon.png" class="img" style="width: 300px;" alt="upi payment option"></a>
            </div>
            <div class="col-md-6 ml-5">
                    <a href="order.php?user_id=<?php echo $user_id; ?> "><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>