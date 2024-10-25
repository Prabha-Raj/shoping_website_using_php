<?php
if(isset($_GET['edit_user_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_session_name'";
    $result_query = mysqli_query($conn,$select_query) or die("<script>alert('edit details not fetched');</script>");
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $user_image = $row_fetch['user_image'];
    
    if(isset($_POST['user_update'])){
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];

        $update_query = "UPDATE `user_table` SET user_name='$user_name', user_email='$user_email',user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$user_id";
        $update_result = mysqli_query($conn,$update_query);
        if($update_result){
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");
            echo "<script>alert('Your details Successfully Updated !');</script>";
            echo "<script>open('user_logout.php','_self');</script>";
        }{
            echo "<script>alert('Your details Not Updated !');</script>";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit My Account</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
        }

        h3 {
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .form-outline input {
            border-radius: 30px;
            border: 1px solid #ced4da;
            padding: 15px;
            font-size: 16px;
        }

        .form-outline input:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        .form-control {
            background-color: #f8f9fa;
        }

        .btn-outline-warning {
            border-radius: 30px;
            background:linear-gradient(90deg, #00264d, #005b99);
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
        }

        .btn-outline-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        .update_user_image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            margin-left: 10px;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .form-outline .d-flex {
            display: flex;
            align-items: center;
        }

        .form-container .text-center {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h3 class="mb-4">Edit Account</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline">
                    <input type="text" name="user_username" value="<?php echo $user_name; ?>"
                        class="form-control w-100" placeholder="Enter New Username">
                </div>
                <div class="form-outline">
                    <input type="email" name="user_email" value="<?php echo $user_email; ?>"
                        class="form-control w-100" placeholder="Enter New Email Address">
                </div>
                <div class="form-outline d-flex">
                    <input type="file" name="user_image" value="" class="form-control w-75">
                    <img src="./user_images/<?php echo $user_image; ?>" alt="" class="update_user_image">
                </div>
                <div class="form-outline">
                    <input type="text" name="user_address" value="<?php echo $user_address; ?>"
                        class="form-control w-100" placeholder="Enter New Address">
                </div>
                <div class="form-outline">
                    <input type="number" name="user_mobile" value="<?php echo $user_mobile; ?>"
                        class="form-control w-100" placeholder="Enter New Mobile Number">
                </div>
                <div class="form-outline">
                    <input type="submit" name="user_update" value="Update" class="btn btn-outline-warning w-100">
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
