<?php
if(isset($_GET['delete_products'])){
    $delete_product_id = $_GET['delete_products'];
    $delete_query = "DELETE FROM `products` WHERE product_id='$delete_product_id'";
    $result_delete = mysqli_query($conn,$delete_query);
    if($result_delete){
        echo "<script>alert('Product Deleted Successfully !')</script>";
        echo "<script>open('index.php?view_products','_self')</script>";
    }
}
?>