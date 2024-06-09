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
    <title>Edit my eccount</title>
    <style>
        .update_user_image{
            width:100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" name="user_username" value="<?php echo $user_name; ?>" class="form-control w-50 m-auto" placeholder="Enter New Username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control w-50 m-auto" placeholder="Enter New Email address">
        </div>
        <div class="form-outline mb-4  d-flex w-50 m-auto">
            <input type="file" name="user_image" value=""  class="form-control ">
            <img src="./user_images/<?php echo $user_image; ?>" alt="" class="update_user_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_address" value="<?php echo $user_address; ?>" class="form-control w-50 m-auto" placeholder="Ender New address">
        </div>
        <div class="form-outline mb-4">
            <input type="number" name="user_mobile" value="<?php echo $user_mobile; ?>" class="form-control w-50 m-auto" placeholder="Enter New Mobile Number">
        </div>
        <!-- <div class="form-outline mb-4">
            <input type="number" name="user_password" value="<?php echo $user_password; ?>" class="form-control w-50 m-auto" placeholder="Enter New Password">
        </div> -->
        <div class="form-outline mb-4">
            <input type="submit" name="user_update" value="Update" class="btn btn-outline-warning w-50 m-auto">
        </div>
    </form>
</body>
</html>