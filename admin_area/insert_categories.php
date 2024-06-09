<?php 

include('../includes/connect.php'); 
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['category_title'];

    // query for select data from the database
    $select_query = "Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($conn, $select_query);
    $num_same_rows = mysqli_num_rows($result_select);
    if($num_same_rows>0){
        echo "<script>alert('Hello, \'{$category_title}\' Category is already Present in the Database !')</script>";
    }else{
        // query for insert data in the database
        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($conn, $insert_query);
        // echo "<script>alert('Hello'{$category_title})</script>";
        if($result){
            echo "<script>alert('Category has been Inserted Sucsessfully !, that is \'{$category_title}\'')</script>";
        }
    }
}

?>

<h2 class="text-center text-success">Insert Categories</h2>
<form action="" method="post" class="my-5 text-center">
<label for="category_title" class="mb-1">Category Title</label>
<div class="input-group my-2 w-50 m-auto">
  <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-50 m-auto">
  <input type="submit" class="btn-outline-warning btn mb-2 m-auto w-50" name="insert_cat" value="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
</form>