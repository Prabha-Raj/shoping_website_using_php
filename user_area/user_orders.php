<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerse website > My Orders</title>

</head>

<body>
    <?php
// getting user id using username
$username = $_SESSION['username'];
$get_user = "SELECT * FROM `user_table` WHERE user_name='$username'";
$result = mysqli_query($conn,$get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>
    <h3 class="text-success">My All Orders</h3>
            <table class="table table-bordered mt-5">
                <thead class="bg-warning">
                    <tr>
                        <th class="bg-warning">S. No.</th>
                        <th class="bg-warning">Amount Due</th>
                        <th class="bg-warning">Total Product</th>
                        <th class="bg-warning">Invoice Number</th>
                        <th class="bg-warning">Order Date</th>
                        <th class="bg-warning">Complete/Incomplete</th>
                        <th class="bg-warning">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-secondary">
                    <?php
                    // getting all order
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
                    $result_orders = mysqli_query($conn,$get_orders);
                    $s_no = 1;
                    while($row_data= mysqli_fetch_assoc($result_orders)){
                        $order_id = $row_data['order_id'];
                        $amount_due = $row_data['amount_due'];
                        $total_products = $row_data['total_products'];
                        $invoice_number = $row_data['invoice_number'];
                        $order_status = $row_data['order_status'];
                        if($order_status == 'Pending'){
                            $order_status ="Incomplete";
                        }else{
                            $order_status ="Complete";
                        }
                        $order_date = $row_data['order_date'];
                        echo "<tr>
                        <td class='bg-secondary text-light'>$s_no</td>
                        <td class='bg-secondary text-light'>$amount_due/-</td>
                        <td class='bg-secondary text-light'>$total_products</td>
                        <td class='bg-secondary text-light'>$invoice_number</td>
                        <td class='bg-secondary text-light'>$order_date</td>
                        <td class='bg-secondary text-light'>$order_status</td>";
                        ?>
                        <?php
                        if($order_status == 'Complete'){
                            echo "<td class='bg-secondary text-light'>Paid</td>";
                        }else{
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                        </tr>";
                        }
                        $s_no++;
                        
                    }
                    ?>

                </tbody>
            </table>
</body>

</html>