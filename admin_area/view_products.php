<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Products</title>
    <style>
        .product_img{
            width: 90px;
            height: 100px;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class=" table table-bordered mt-5 text-center">
        <thead class="bg-warning">
            <tr class="bg-warning">
                <th class="bg-warning">S. No.</th>
                <th class="bg-warning">Product Id</th>
                <th class="bg-warning">Product Title</th>
                <th class="bg-warning">Product Image</th>
                <th class="bg-warning">Product Price</th>
                <th class="bg-warning">Total Sold</th>
                <th class="bg-warning">Status</th>
                <th class="bg-warning">Edit</th>
                <th class="bg-warning">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_products = "SELECT * FROM `products`";
            $result= mysqli_query($conn,$get_products);
            $s_no = 1;
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];

                // getting sold products
                $get_count = "SELECT * FROM `pending_orders` WHERE product_id=$product_id";
                $result_count = mysqli_query($conn,$get_count);
                $row_count = mysqli_num_rows($result_count);
                $total_sold_products = $row_count;
                echo "<tr>
                <td class='bg-secondary text-light'>$s_no</td>
                <td class='bg-secondary text-light'>$product_id</td>
                <td class='bg-secondary text-light'>$product_title</td>
                <td class='bg-secondary text-light'><img src='./product_images/$product_image1' class='product_img' alt='$product_image1' srcset=''></td>
                <td class='bg-secondary text-light'>$product_price/-</td>
                <td class='bg-secondary text-light'>$total_sold_products</td>
                <td class='bg-secondary text-light'>$status</td>
                <td class='bg-secondary text-light'><a href='index.php?edit_products=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
             <td class='bg-secondary text-light'><a href='index.php?delete_products=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";  
            $s_no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>