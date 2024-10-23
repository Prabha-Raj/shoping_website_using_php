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
        background: linear-gradient(90deg, #00264d, #005b99);
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 8px;
        padding: 10px;  
        font-size: 14px;
    }

    .btn-primary {
        background-color: #2874f0;
        border-color: #2874f0;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #1a5dc7;
    }

    .form-label {
        font-weight: bold;
        font-size: 14px;
    }

    .theme_img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
    }

    .text-primary {
        color: #2874f0 !important;
    }

    .text-primary:hover {
        text-decoration: underline;
    }
    </style>

</head>
<body>
    <div class="mainDiv">
        <h2 class="text-center" style="color:white; margin-top:120px; font-size:50px; font-weight:bold;">Admin Login</h2>
        <div class="underDiv d-flex justify-content-center align-items-center" style=" background:linear-gradient(90deg, #00264d, #005b99);">
            <div class="card shadow-lg" style="border-radius: 10px; max-width: 400px; width: 100%; padding: 20px;">
                <div class="text-center mb-4">
                    <img src="../images/admin.png" alt="theme" class="theme_img" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="admin_username" class="form-label">Username</label>
                            <input type="text" name="admin_username" class="form-control" placeholder="Enter username" required id="admin_username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="admin_password" class="form-label">Password</label>
                            <input type="password" name="admin_password" class="form-control" placeholder="Enter password" required id="admin_password">
                        </div>
                        <div class="text-center mt-3">
                            <input type="submit" value="Login" class="btn btn-primary w-100 py-2" name="admin_login">
                        </div>
                        <p class="small fw-bold mt-3 text-center">
                            Don't have an account? 
                            <a href="./admin_registration.php" class="text-primary">Register</a>.
                        </p>
                    </form>
                </div>
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