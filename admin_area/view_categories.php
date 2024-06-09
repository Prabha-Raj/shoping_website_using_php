<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center w-75 m-auto">
    <thead class="bg-warning">
        <tr>
            <th class="bg-warning">S. No.</th>
            <th class="bg-warning">Category Id</th>
            <th class="bg-warning">Category Title</th>
            <th class="bg-warning">Edit</th>
            <th class="bg-warning">Delete</th>
        </tr>
    <tbody>
        <?php
        $get_categories = "SELECT * FROM `categories`";
        $result_categories = mysqli_query($conn,$get_categories);
        $s_no = 0;
        while($rows = mysqli_fetch_assoc($result_categories)){
            $category_id = $rows['category_id'];
            $category_title = $rows['category_title'];
            $s_no++;
            echo "<tr>
            <td class='bg-secondary text-light'>$s_no</td>
            <td class='bg-secondary text-light'>$category_id</td>
            <td class='bg-secondary text-light'>$category_title</td>
            <td class='bg-secondary text-light'><a href='index.php?edit_category=$category_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a href='index.php?delete_category=$category_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
        ?>
        
    </thead>
</table>