<?php
include('../includes/connect.php');
// $conn = mysqli_connect('localhost','root','','mystore');

include('../functions/commun_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
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
    .theme_img{
        width: 80%;
    }
    </style>

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center text-success">Admin Login</h2>
        <div class="row d-flex align-item-center justify-content-center mt-5 table table-bordered">
        <div class="col-lg-4">
            <img src="../images/admin.png" alt="theme" class="theme_img">
                <!-- <img src="../images/side_image1.jpg" alt="theme" class="theme_img">
                <img src="../images/side_image2.jpg" alt="theme" class="theme_img"> -->
            </div>
            <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data" class="w-75 m-auto">
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_username">Username :</lable>
                        <input type="text" name="admin_username" class="form-control" placeholder="Enter user name" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_password">Password :</lable>
                        <input type="password" name="admin_password" class="form-control" placeholder="Enter password" required="true" id="">
                    </div>
                    
                    <div class="text-center mt-3 mb-1 ">
                        <input type="submit" value="Login" class="btn btn-outline-primary py-2 px-3 w-100" name="admin_login" >
                        <p class="small fw-bold mt-2">Don't have an account ? <strong><a href="./admin_registration.php" class="text-danger">Register</a></strong>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>

<!-- php code for registration -->
<?php
global $conn;
if(isset($_POST['admin_login'])){
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$admin_ip = get_ip_address();
$select_query = "SELECT * FROM  `admin_table` WHERE admin_name='$admin_username'";
$result = mysqli_query($conn,$select_query) or die("<script>alert('Not selected !')</script>");
$result_count = mysqli_num_rows($result);
if($result_count > 0){
    $_SESSION['admin_name'] = $admin_username;
    $row_count = mysqli_fetch_assoc($result);
    if(password_verify($admin_password,$row_count['admin_password'])){
        echo "<script>alert('You are Loged in Successfully !')</script>";
        $_SESSION['admin_name'] = $admin_username;
        echo "<script>open('./index.php','_self')</script>";
    }else{
        echo "<script>alert('Invalid Password')</script>";
    }
}else{
    echo "<script>alert('Invalid Username')</script>";
}
}
?>