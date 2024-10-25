<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $p_title = $_POST['product_title'];
    $p_description = $_POST['product_description'];
    $p_keywords = $_POST['product_keywords'];
    $p_category = $_POST['product_category'];
    $p_brand = $_POST['product_brand'];
     
    // accessing images
    $p_image1 = $_FILES['product_image1']['name'];
    $p_image2 = $_FILES['product_image2']['name'];
    $p_image3 = $_FILES['product_image3']['name'];
    
    // accessing images temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
    $p_price = $_POST['product_price'];
    $p_status = 'true';

    // echo "$p_title,$p_description,$p_keywords,$p_category,$p_brand,$p_image1,$p_image2,$p_image3,$p_price";
    // echo "<script>alert($p_title,$p_description,$p_keywords,$p_category,$p_brand,$p_image1,$p_image2,$p_image3,$p_price)</script>";
    // Checking Empty Condition
    if($p_title=='' or $p_description=='' or $p_keywords=='' or $p_category=='' or $p_brand=='' or $p_price=='' or $p_image1=='' or $p_image2=='' or $p_image3==''){
        echo "<script>alert('Please fill All the available fields')</script>";
        exit();
    }else{
        
        // Insert Query
        // echo "<script>alert('hii')</script>";
        
        $insert_product = "INSERT INTO `products`(`product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`,`date`,`status`) 
        VALUES ('$p_title','$p_description','$p_keywords','$p_category','$p_brand','$p_image1','$p_image2','$p_image3','$p_price',NOW(),'$p_status')";
        // $result_query = mysqli_query($conn,$insert_product) or die("<script>Not Insert</script>");
        $result_query = mysqli_query($conn,$insert_product) or die("<script> alert('Not Insert')</script>");
        
        // echo "<script>alert('$p_title,$p_description,$p_keywords,$p_category,$p_brand,$p_image1,$p_image2,$p_image3,$p_price')</script>";
        if($result_query){
            move_uploaded_file($temp_image1, "./product_images/$p_image1");
            move_uploaded_file($temp_image2, "./product_images/$p_image2");
            move_uploaded_file($temp_image3, "./product_images/$p_image3");
            echo "<script>alert('Congratulation The Product has been Inserted Sucsessfuly ! ')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERSE WEBSITE > Insert Products</title>
</head>
<body>
    
<div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>
    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Product title -->
         <div class="row">
            <div class="col-sm-6">
        <div class="form-outline mb-4 w-100 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" placeholder="Enter Product title" autocomplet="off">
        </div>
        <!-- Product description -->
        <div class="form-outline mb-4 w-100 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" id="product_description" name="product_description" class="form-control" placeholder="Enter Product description" autocomplet="off">
        </div>
        <!-- Product keywords -->
        <div class="form-outline mb-4 w-100 m-auto">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplet="off">
        </div>
        <!-- Product category -->
        <div class="form-outline mb-4 w-100 m-auto">
            <select name="product_category" id="product_category" class="form-select text-dark">
                <option value="">Select a Category</option>
                <?php
                $select_categories = "Select * from `categories`";
                $result_categories = mysqli_query($conn, $select_categories);
                while($row_data = mysqli_fetch_assoc($result_categories)){
                  $category_title = $row_data['category_title'];
                  $category_id = $row_data['category_id'];
                        echo "<option value='{$category_id}'>{$category_title}</option>";
                    }
                ?>
            </select>
        </div>
        <!-- Product brands -->
        <div class="form-outline mb-4 w-100 m-auto">
            <select name="product_brand" id="product_brand" class="form-select">
                <option value="">Select a Brands</option>
                <?php
                     $select_brands = "Select * from `brands`";
                     $result_brands = mysqli_query($conn, $select_brands);
                     while($row_data = mysqli_fetch_assoc($result_brands)){
                       $brand_title = $row_data['brand_title'];
                       $brand_id = $row_data['brand_id'];
                        echo "<option value='{$brand_id}'>{$brand_title}</option>";
                    }
                ?>
            </select>
        </div>
        </div>
        <div class="col-sm-6">
          <!-- Product Image 1 -->
        <div class="form-outline mb-4 w-100 m-auto">
            <label for="product_image1" class="form-label">Product image 1</label>
            <input type="file" id="product_image1" name="product_image1" class="form-control" >
        </div>
          <!-- Product Image 2 -->
          <div class="form-outline mb-4 w-100 m-auto">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" id="product_image2" name="product_image2" class="form-control" >
        </div>
        <!-- Product Image 3 -->
        <div class="form-outline mb-4 w-100 m-auto">
          <label for="product_image3" class="form-label">Product image 3</label>
          <input type="file" id="product_image3" name="product_image3" class="form-control" >
      </div>
      <!-- Product Price -->
      <div class="form-outline mb-4 w-100 m-auto">
          <label for="product_price" class="form-label">Product Price</label>
          <input type="text" id="product_price" name="product_price" required="true" autocomplet="off" placeholder="Enter Product Price" class="form-control">
        </div>
      <!-- submit button -->
      <div class="form-outline mb-4 w-100 m-auto">          
          <input type="submit" id="insert_product" name="insert_product" value="Insert Products" class="btn btn-outline-primary">
        </div>
                </div>
    </div>
    </form>
</div> 
</body>
</html>