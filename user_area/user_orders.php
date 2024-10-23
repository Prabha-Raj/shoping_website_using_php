<?php 
include('../includes/connect.php'); 

// Getting user ID using username
$username = $_SESSION['username'];
$get_user = "SELECT * FROM `user_table` WHERE user_name='$username'";
$result = mysqli_query($conn, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website > My Orders</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif; /* Change font family */
        }

        h3 {
            margin-top: 30px;
            text-align: center;
            color: #0056b3; /* Dark blue for header */
        }

        .table {
            margin: 0 auto; /* Center table */
            width: 90%; /* Full width */
            background-color: white; /* White background for table */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .table thead {
            background-color: #ffc107; /* Yellow for header */
            color: #343a40; /* Dark gray text */
        }

        .table tbody {
            background-color: #6c757d; /* Gray for body */
        }

        .table tbody tr {
            transition: background-color 0.3s; /* Transition effect on hover */
        }

        .table tbody tr:hover {
            background-color: #5a6268; /* Darker gray on hover */
        }

        .table th, .table td {
            vertical-align: middle; /* Center align text */
            text-align: center; /* Center align text */
            padding: 15px; /* Padding for cells */
        }

        .text-dark {
            color: #343a40 !important; /* Dark text color */
        }

        /* Link styles */
        a {
            color: #ffc107; /* Yellow link color */
            text-decoration: none; /* Remove underline */
        }

        a:hover {
            color: #ffb300; /* Slightly darker yellow on hover */
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h3 class="text-success">My All Orders</h3>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Amount Due</th>
                    <th>Total Product</th>
                    <th>Invoice Number</th>
                    <th>Order Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Getting all orders
                $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
                $result_orders = mysqli_query($conn, $get_orders);
                $s_no = 1;
                while ($row_data = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_data['order_id'];
                    $amount_due = $row_data['amount_due'];
                    $total_products = $row_data['total_products'];
                    $invoice_number = $row_data['invoice_number'];
                    $order_status = $row_data['order_status'];
                    $order_status_display = ($order_status == 'Pending') ? "Incomplete" : "Complete";
                    $order_date = $row_data['order_date'];
                    echo "<tr>
                        <td>$s_no</td>
                        <td>$amount_due/-</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status_display</td>";

                    // Display payment status
                    if ($order_status == 'Complete') {
                        echo "<td>Paid</td>";
                    } else {
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>";
                    }
                    echo "</tr>";
                    $s_no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
