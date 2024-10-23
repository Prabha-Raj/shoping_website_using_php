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
       
        .sticks{
            position:sticky;
            top:40px;
            overflow:hidden;
        }
        /*
        .zIndex{
            background-color:red;
        } */
        .table .thead{
            position:sticky;
            /* top:60px; */
            overflow:hidden;

        }
        .table .tbody{
            /* height:100%; */
            /* border:5px solid red; */
            overflow: hidden;
        }
        .xyz{
            background-color:white;
            position:sticky;
            /* top:60px; */
            overflow:hidden;
            top:0px;
            left:0px;
            right: 0px;
            /* border:2px solid red; */
        }
    </style>
</head>

<body>
    <div class="xyz">

        <h3 class="stick text-center text-success">All Products</h3>
    </div>
    <table class="table table-bordered mt-4 text-center">
        <thead class="thead">
            <tr class="sticks bg-warning">
                <th class="bg-warning">S. No.</th>
                <th class="bg-warning">Product Title</th>
                <th class="bg-warning">Product Id</th>
                <th class="bg-warning">Product Image</th>
                <th class="bg-warning">Product Price</th>
                <th class="bg-warning">Total Sold</th>
                <th class="bg-warning">Status</th>
                <th class="bg-warning">Edit</th>
                <th class="bg-warning">Delete</th>
            </tr>
        </thead>
        <tbody class="tbody" style="">
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
                <td class='bg-secondary zIndex text-light'>$s_no</td>
                <td class='bg-secondary zIndex text-light'>$product_id</td>
                <td class='bg-secondary zIndex text-light'>$product_title</td>
                <td class='bg-secondary zIndex text-light'><img src='./product_images/$product_image1' class='product_img' alt='$product_image1' srcset=''></td>
                <td class='bg-secondary zIndex text-light'>$product_price/-</td>
                <td class='bg-secondary zIndex text-light'>$total_sold_products</td>
                <td class='bg-secondary zIndex text-light'>$status</td>
                <td class='bg-secondary zIndex text-light'><a href='index.php?edit_products=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
             <td class='bg-secondary text-light'><a href='index.php?delete_products=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";  
            $s_no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>