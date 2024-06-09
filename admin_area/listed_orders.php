<?php
$get_orders = "SELECT * FROM `user_orders`";
$result = mysqli_query($conn, $get_orders);
$row_count = mysqli_num_rows($result);
?>
<h3 class="text-center text-success my-2">All Orders</h3>
<table class="table table-bordered text-center my-5">
    <?php
    if($row_count > 0){
        echo "<thead class='bg-warning'>
        <tr>
            <th class='bg-warning'>S. No.</th>
            <th class='bg-warning'>Order Id</th>
            <th class='bg-warning'>Due Amount</th>
            <th class='bg-warning'>Invoice Number</th>
            <th class='bg-warning'>Total Products</th>
            <th class='bg-warning'>Order Date</th>
            <th class='bg-warning'>Status</th>
            <th class='bg-warning'>Delete</th>
        </tr>
    </thead>
    <tbody>";
    
    $s_no=0;
    while($row_order = mysqli_fetch_assoc($result)){
    $order_id = $row_order['order_id'];
    $due_amount = $row_order['amount_due'];
    $invoice_number = $row_order['invoice_number'];
    $total_products = $row_order['total_products'];
    $order_date = $row_order['order_date'];
    $order_status = $row_order['order_status'];
    $s_no++;
     echo "<tr>
            <td class='bg-secondary text-light'>$s_no</td>
            <td class='bg-secondary text-light'>$order_id</td>
            <td class='bg-secondary text-light'>$due_amount</td>
            <td class='bg-secondary text-light'>$invoice_number</td>
            <td class='bg-secondary text-light'>$total_products</td>
            <td class='bg-secondary text-light'>$order_date</td>
            <td class='bg-secondary text-light'>$order_status</td>
            <td class='bg-secondary text-light'>
            <a href='index.php?delete_order=$order_id'>
            <i class='fa-solid text-light fa-trash'></i></a></td>
        </tr>";
    }
    echo "</tbody>";
    }else{
        echo "<h5 class='text-center bg-danger mt-5'>No Orders Yet</h5>";
    }
    
    ?>
</table>