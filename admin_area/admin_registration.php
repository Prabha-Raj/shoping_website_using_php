<?php
include('../includes/connect.php');
// $conn = mysqli_connect('localhost','root','','mystore');

// include('../functions/commun_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registaion</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awasome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }

        .theme_img {
            width: 80%;
        }
    </style>

</head>

<body class="">
    <div class="container-fluid my-3">
        <h2 class="text-center text-success">New Admin Registaion</h2>
        <div class="row d-flex align-item-center justify-content-center mt-5 table table-bordered">
            <div class="col-lg-4">
                <!-- <img src="../images/admin.png" alt="theme" class="theme_img"> -->
                <img src="../images/side_image1.jpg" alt="theme" class="theme_img">
                <img src="../images/side_image2.jpg" alt="theme" class="theme_img">
            </div>
            <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data" class="w-75 m-auto">
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_username">Username :</lable>
                        <input type="text" name="admin_username" class="form-control" placeholder="Enter user name" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_email">Email :</lable>
                        <input type="email" name="admin_email" class="form-control" placeholder="Enter admin email" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_image">Profile Image :</lable>
                        <input type="file" name="admin_image" class="form-control" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_password">Password :</lable>
                        <input type="password" name="admin_password" class="form-control" placeholder="Enter password" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="conf_admin_password">Confirm Password :</lable>
                        <input type="password" name="conf_admin_password" class="form-control" placeholder="Enter confirm password" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_address">Address :</lable>
                        <input type="text" name="admin_address" class="form-control" placeholder="Enter your address" required="true" id="">
                    </div>
                    <div class="form-outlin mb-1">
                        <lable class="form-lable" for="admin_contact">Contact No :</lable>
                        <input type="number" name="admin_contact" class="form-control" placeholder="Enter mobile no" required="true" id="">
                    </div>
                    <div class="text-center mt-3 mb-1 ">
                        <input type="submit" value="Register" class="btn btn-outline-primary py-2 px-3 w-100" name="admin_register">
                        <p class="small fw-bold mt-2">Already have an account ? <strong><a href="./admin_login.php" class="text-danger">Login</a></strong>.</p>
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
if (isset($_POST['admin_register'])) {
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_admin_password'];
    $admin_address = $_POST['admin_address'];
    $admin_contact = $_POST['admin_contact'];
    $admin_image = $_FILES['admin_image']['name'];
    $admin_image_temp = $_FILES['admin_image']['tmp_name'];
    $admin_ip = get_ip_address();
    if ($admin_password == $conf_admin_password) {
        $select_admin = "SELECT * FROM  `admin_table` WHERE admin_name='$admin_username'";
        $result = mysqli_query($conn, $select_admin) or die("<script>alert('Not selected !')</script>");
        $result_count = mysqli_num_rows($result);
        if ($result_count > 0) {
            echo "<script>alert('This Username Already Existed !')</script>";
        } else {
            // inserting admin data in database
            $insert_admin = "INSERT INTO `admin_table` (admin_name,admin_email,admin_image,admin_password,admin_ip,admin_address,admin_mobile) 
                            VALUES ('$admin_username','$admin_email','$admin_image','$hash_password','$admin_ip','$admin_address','$admin_contact')";
            $inserted_admin = mysqli_query($conn, $insert_admin);
            if ($inserted_admin) {
                move_uploaded_file($admin_image_temp, "./admin_images/$admin_image");
                echo "<script>alert('Thanks, & Welcome To Login page')</script>";
                echo "<script>open('./admin_login.php','_self')</script>";
            } {
                echo "<script>alert('Oops !, Something Wrong.')</script>";
            }
        }
    } else {
        echo "<script>alert('Password and Confirm Password are Not mached !')</script>";
    }
}
?>