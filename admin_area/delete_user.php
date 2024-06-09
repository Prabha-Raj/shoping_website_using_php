<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Account</title>
</head>

<body>
    <h3 class="text-center text-danger mb-4">Delete User Account</h3>
    <form action="" method="post" class="mt-5 text-center">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control btn btn-outline-warning w-50 m-auto" value="Delete User" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control btn btn-outline-success w-50 m-auto" value="Don't Delete User" name="dont_delete">
        </div>
    </form>
</body>

</html>

<?php
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];
    if (isset($_POST['delete'])) {
        $delete_query = "DELETE FROM `user_table` WHERE user_id=$user_id";
        $result_delete = mysqli_query($conn, $delete_query);
        if ($result_delete) {
            echo "<script>alert('A User Delete Successfully !')</script>";
            echo "<script>open('index.php?listed_users','_self')</script>";
        }
    }
    if (isset($_POST['dont_delete'])) {
        echo "<script>open('index.php?listed_users','_self')</script>";
    }
}
?>