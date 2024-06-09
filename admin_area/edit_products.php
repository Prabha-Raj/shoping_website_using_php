<!-- // getting product details from database -->
<?php
if(isset($_GET['edit_products'])){
    $edit_product_id = $_GET['edit_products'];
    // echo $edit_id;
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_product_id";
    $result_data = mysqli_query($conn,$get_data);
    $row = mysqli_fetch_assoc($result_data);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // getting category Title
    $select_category = "Select * from `categories` where category_id=$category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    
    // getting brand title
    $select_brand = "Select * from `brands` where brand_id=$brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}
?>


<div class="contianer mt-5">
    <h2 class="text-center text-success">Edit Products</h2>
    <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" value="<?php echo $product_title ?>" id="product_title" name="product_title" required="true" class="form-control"
                    placeholder="Enter Product title" autocomplet="off">
            </div>
            <!-- Product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" value="<?php echo $product_description ?>" id="product_description" name="product_description" required="true" class="form-control"
                    placeholder="Enter Product description" autocomplet="off">
            </div>
            <!-- Product keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" value="<?php echo $product_keywords ?>" id="product_keywords" name="product_keywords" required="true" class="form-control"
                    placeholder="Enter Product keywords" autocomplet="off">
            </div>
            <!-- Product category -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="product_category" required="true" class="form-select text-dark">
                    <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
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
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brand" class="form-label">Product Brand</label>
                <select name="product_brand" id="product_brand" required="true" class="form-select">
                    <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                    <?php
                     $select_brands = "Select * from `brands`";
                     $result_brands = mysqli_query($conn, $select_brands);
                     while($row_data = mysqli_fetch_assoc($result_brands)){
                       $brand_title = $row_data['brand_title'];
                       $brand_id = $row_data['brand_id'];
                        echo "<option value='$brand_id'>{$brand_title}</option>";
                    }
                ?>
                </select>
            </div>
            <!-- Product Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" required="true" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="update_product_image">
                </div>
            </div>
            <!-- Product Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" required="true" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="update_product_image">
                </div>
            </div>
            <!-- Product Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" required="true" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="update_product_image">
                </div>
            </div>
            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" value="<?php echo $product_price ?>" id="product_price" name="product_price" required="true" autocomplet="off"
                    placeholder="Enter Product Price" class="form-control">
            </div>
            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" id="edit_product" name="edit_product" value="Update Products"
                    class="btn btn-outline-primary">    
            </div>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product'])){
    // $edit_product_id=$_POST['edit_product'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
     
    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    
    // accessing images temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // Checking Empty Condition
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill All the available fields')</script>";
        exit();
    }else{
        
        // Insert Query  
        $update_product = "UPDATE `products` SET 
        product_title='$product_title',
        product_description='$product_description',
        product_keywords='$product_keywords',
        category_id=$product_category,
        brand_id=$product_brand,
        product_image1='$product_image1', 
        product_image2='$product_image2',
        product_image3='$product_image3',
        product_price='$product_price' 
        WHERE product_id='$edit_product_id'";
        $result_update = mysqli_query($conn,$update_product) or die("<script> alert('Not update')</script>");
        
        if($result_update){
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");
            echo "<script>alert('Congratulations, The Product has been Updated Sucsessfuly ! ')</script>";
            echo "<script>open('index.php?view_products=$edit_product_id','_self')</script>";
        }
    }
}
?>