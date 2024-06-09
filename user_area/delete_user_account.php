<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Account</title>
</head>
<body>
    <h3 class="text-center text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control btn btn-outline-warning w-50 m-auto" value="Delete Account" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control btn btn-outline-success w-50 m-auto" value="Don't Delete Account" name="dont_delete">
        </div>
    </form>
</body>
</html>

<?php
$username_session = $_SESSION['username']; 
// echo $username_session;
if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM `user_table` WHERE user_name='$username_session'";
    $result_delete = mysqli_query($conn,$delete_query);
    if($result_delete){
        session_unset();
        session_destroy();
        echo "<script>alert('Your Account Delete Successfully !')</script>";
        echo "<script>open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>open('user_profile.php','_self')</script>";
}
?>