<?php 

include('../includes/connect.php'); 
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    
    // query for select data from the database
    $select_query = "Select * from `brands` where brand_title='$brand_title'";
    $result_select=mysqli_query($conn, $select_query);
    $num_same_rows = mysqli_num_rows($result_select);
    if($num_same_rows>0){
      echo "<script>alert('Hello, \'{$brand_title}\' Brand is already Present in the Database !')</script>";
    }else{
      // query for insert data in the database
      $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
      $result=mysqli_query($conn, $insert_query);
      // echo "<script>alert('Hello \'{$brand_title}\'')</script>";
        if($result){
            echo "<script>alert('Brand has been Inserted Sucsessfully !, that is \'{$brand_title}\'')</script>";
        }
    }
}

?>

<h2 class="text-center mb-2">Insert Brands</h2>
<form action="" method="post" class="my-5 text-center">
<label for="brand_title" class="mb-1">Brand Title</label>
<div class="input-group my-2 w-50 m-auto">
  <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"id="brand_title" name="brand_title" placeholder="Insert Brands" aria-label="Brands" area_describedby="basic-addon1">
</div>
<div class="input-group m-auto w-50">
  <input type="submit" class="btn-outline-warning btn mb-2 m-auto w-50" name="insert_brand" value="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
</form>