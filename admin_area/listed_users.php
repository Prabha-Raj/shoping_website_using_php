<?php
$get_users = "SELECT * FROM `user_table`";
$result = mysqli_query($conn, $get_users);
$row_count = mysqli_num_rows($result);
?>
<h3 class="text-center text-success my-2">All Users</h3>
<table class="table table-bordered text-center my-5">
    <?php
    // <th class='bg-warning'>User Id</th>
    if ($row_count > 0) {
        echo "<thead class='bg-warning'>
        <tr>
            <th class='bg-warning'>S. No.</th>
            <th class='bg-warning'>User Name</th>
            <th class='bg-warning'>User Image</th>
            <th class='bg-warning'>User Mobile</th>
            <th class='bg-warning'>User Email</th>
            <th class='bg-warning'>User Address</th>
            <th class='bg-warning'>Delete</th>
        </tr>
    </thead>
    <tbody>";

        $s_no = 0;
        while ($row_order = mysqli_fetch_assoc($result)) {
            $user_id = $row_order['user_id'];
            $user_name = $row_order['user_name'];
            $user_email = $row_order['user_email'];
            $user_image = $row_order['user_image'];
            $user_address = $row_order['user_address'];
            $user_mobile = $row_order['user_mobile'];
            $s_no++;
            // <td class='bg-secondary text-light'>$user_id</td>
            echo "<tr>
            <td class='bg-secondary text-light'>$s_no</td>
            <td class='bg-secondary text-light'>$user_name</td>
            <td class='bg-secondary text-light'><img src='../user_area/user_images/$user_image' class='' style='width:80px;'></td>
            <td class='bg-secondary text-light'>$user_mobile</td>
            <td class='bg-secondary text-light'>$user_email</td>
            <td class='bg-secondary text-light'>$user_address</td>
            <td class='bg-secondary text-light'>
            <a href='index.php?delete_user=$user_id'>
            <i class='fa-solid text-light fa-trash'></i></a></td>
        </tr>";
        }
    } else {
        echo "<h5 class='text-center text-danger mt-5'>No Users Yet !</h5>";
    }
    echo "</tbody>";

    ?>
</table>