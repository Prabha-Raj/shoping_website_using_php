<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Orders</title>
</head>

<body>
    <h3 class="text-center text-danger mb-4">Delete Order</h3>
    <form action="" method="post" class="my-5 text-center ">
        <div class="form-outline mb-4 ">
            <input type="submit" class="form-control btn btn-outline-warning w-50 m-auto" value="Delete" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control btn btn-outline-success w-50 m-auto" value="Don't Delete" name="dont_delete">
        </div>
    </form>
</body>

</html>

<?php
if (isset($_GET['delete_order'])) {
    $delete_order_id = $_GET['delete_order'];
    $delete_order =  "DELETE FROM `user_orders` WHERE order_id=$delete_order_id";
    if (isset($_POST['delete'])) {
        $delete_result = mysqli_query($conn, $delete_order);
        if ($delete_result) {
            echo "<script>alert('The Order has been Deleted Successfully !')</script>";
            echo "<script>open('index.php?listed_orders','_self')</script>";
        }
    } elseif (isset($_POST['dont_delete'])) {
        echo "<script>open('index.php?listed_orders','_self')</script>";
    }
}
