<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered text-center w-75 m-auto">
    <thead>
        <tr>
            <th class="bg-warning">S. No.</th>
            <th class="bg-warning">Brand Id</th>
            <th class="bg-warning">Brand Title</th>
            <th class="bg-warning">Edit</th>
            <th class="bg-warning">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_brands = "SELECT * FROM `brands`";
        $result_brands = mysqli_query($conn,$get_brands);
        $s_no=0;
        while($row_brands = mysqli_fetch_assoc($result_brands)){
            $brand_id = $row_brands['brand_id'];
            $brand_title = $row_brands['brand_title'];
            $s_no++;
            echo "<tr>
            <td class='bg-secondary'>$s_no</td>
            <td class='bg-secondary'>$brand_id</td>
            <td class='bg-secondary'>$brand_title</td>
            <td class='bg-secondary'><a href='index.php?edit_brand=$brand_id'><i class=' text-light fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary'><a href='index.php?delete_brand=$brand_id'><i class='text-light fa-solid fa-trash'></i></a></td>
        </tr>";
        }
        ?>

    </tbody>
</table>