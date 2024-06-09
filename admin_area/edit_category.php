<!-- getting category title -->
<?php
if(isset($_GET['edit_category'])){
    $category_id = $_GET['edit_category'];
    $get_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($conn,$get_category);
    if($result_category){
        $row_category = mysqli_fetch_assoc($result_category);
        $category_title = $row_category['category_title'];
    }
}
?>

<h3 class="text-center text-success">Edit Category</h3>
<form action="" method="post" class="my-5 text-center">
    <label for="category_title" class="mb-1">Category Title</label>
<div class="input-group my-2 m-auto w-50">
  <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" value="<?php echo $category_title; ?>" id="category_title" name="category_title" placeholder="Update Category" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group m-auto" style="width:15%">
  <input type="submit" class="btn-outline-warning btn mb-2" name="edit_category" value="Update Category" aria-label="Categories" aria-describedby="basic-addon1">
</div>
</form>

<!-- updating category -->
<?php
if(isset($_POST['edit_category'])){
    $category_title = $_POST['category_title'];
    $update_query = "UPDATE `categories` SET category_title=$category_title";
    $update_result = mysqli_query($conn,$update_query);
    if($update_query){
        echo "<script>alert('Category Updated Successfully !')</script>";
        echo "<script>open('index.php?edit_category=$category_id','_self')</script>";
    }
}
?>