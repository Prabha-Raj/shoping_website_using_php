<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Brand</title>
</head>
<body>
    <h3 class="text-center text-danger mb-4">Delete Brand</h3>
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
if (isset($_GET['delete_brand'])) {
        $delete_brand_id = $_GET['delete_brand'];
        $delete_brand =  "DELETE FROM `brands` WHERE brand_id=$delete_brand_id";
        if(isset($_POST['delete'])){
        $delete_result = mysqli_query($conn, $delete_brand);
        if ($delete_result) {
            echo "<script>alert('The Brand has been Deleted Successfully !')</script>";
            echo "<script>open('index.php?view_brands','_self')</script>";
        }
    }elseif(isset($_POST['dont_delete'])){
        echo "<script>open('index.php?view_brands','_self')</script>";
    }
}
