<!-- getting brand title -->
<?php
if(isset($_GET['edit_brand'])){
    $brand_id = $_GET['edit_brand'];
    $get_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($conn,$get_brand);
    if($result_brand){
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_title = $row_brand['brand_title'];
    }
}
?>

<h3 class="text-center text-success">Edit Brand</h3>
<form action="" method="post" class="my-5 text-center">
<label for="brand_title" class="mb-1">Brand Title</label>
<div class="input-group my-2 m-auto w-50">
  <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" value="<?php echo $brand_title; ?>" id="brand_title" name="brand_title" placeholder="Update Brand" aria-label="Brand" aria-describedby="basic-addon1">
</div>
<div class="input-group m-auto" style="width:15%">
  <input type="submit" class="btn-outline-warning btn mb-2" name="edit_brand" value="Update Brand" aria-label="Brand" aria-describedby="basic-addon1">
</div>
</form>

<!-- updating brand -->
<?php
if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];
    $update_query = "UPDATE `brands` SET brand_title=$brand_title";
    $update_result = mysqli_query($conn,$update_query);
    if($update_query){
        echo "<script>alert('Brand Updated Successfully !')</script>";
        echo "<script>open('index.php?edit_brand=$brand_id','_self')</script>";
    }
}
?>