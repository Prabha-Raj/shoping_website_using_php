<?php
$get_orders = "SELECT * FROM `user_payments`";
$result = mysqli_query($conn, $get_orders);
$row_count = mysqli_num_rows($result);
?>
<h3 class="text-center text-success my-2">All Payments</h3>
<table class="table table-bordered text-center my-5">
    <?php
    if ($row_count > 0) {
        echo "<thead class='bg-warning'>
        <tr>
            <th class='bg-warning'>S. No.</th>
            <th class='bg-warning'>Payment Id</th>
            <th class='bg-warning'>Order Id</th>
            <th class='bg-warning'>Invoice Number</th>
            <th class='bg-warning'>Total Amount</th>
            <th class='bg-warning'>Payment Mode</th>
            <th class='bg-warning'>Payment date</th>
            <th class='bg-warning'>Delete</th>
        </tr>
    </thead>
    <tbody>";

        $s_no = 0;
        while ($row_order = mysqli_fetch_assoc($result)) {
            $order_id = $row_order['order_id'];
            $payment_id = $row_order['payment_id'];
            $total_amount = $row_order['amount'];
            $invoice_number = $row_order['invoice_number'];
            $payment_mode = $row_order['payment_mode'];
            $payment_date = $row_order['date'];
            $s_no++;
            echo "<tr>
            <td class='bg-secondary text-light'>$s_no</td>
            <td class='bg-secondary text-light'>$payment_id</td>
            <td class='bg-secondary text-light'>$order_id</td>
            <td class='bg-secondary text-light'>$invoice_number</td>
            <td class='bg-secondary text-light'>$total_amount</td>
            <td class='bg-secondary text-light'>$payment_mode</td>
            <td class='bg-secondary text-light'>$payment_date</td>
            <td class='bg-secondary text-light'>
            <a href='index.php?delete_payments=$payment_id'>
            <i class='fa-solid text-light fa-trash'></i></a></td>
        </tr>";
        }
    } else {
        echo "<h5 class='text-center text-danger mt-5'>No Payments Yet !</h5>";
    }
    echo "</tbody>";

    ?>
</table>