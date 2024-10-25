<?php
// Only start session if no session is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Correct database connection
$conn = mysqli_connect("localhost", "root", "", "mystore"); 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username_session = $_SESSION['username']; 

if (isset($_POST['delete'])) {
    $delete_query = "DELETE FROM `user_table` WHERE user_name='$username_session'";
    $result_delete = mysqli_query($conn, $delete_query);
    if ($result_delete) {
        session_unset();
        session_destroy();
        echo "<script>alert('Your Account Deleted Successfully!')</script>";
        echo "<script>open('../index.php', '_self')</script>";
    } else {
        echo "<script>alert('Account Deletion Failed!')</script>";
    }
}

if (isset($_POST['dont_delete'])) {
    echo "<script>open('user_profile.php', '_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Account</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h3 {
            font-weight: bold;
            color: #dc3545;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-outline-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-outline-warning:hover {
            background-color: #e0a800;
        }

        .btn-outline-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-outline-success:hover {
            background-color: #218838;
        }

        .w-50 {
            max-width: 300px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3 class="text-danger mb-4">Delete Account</h3>
        <form action="" method="post">
            <div class="form-outline mb-4">
                <input type="submit" class="form-control btn btn-outline-warning w-50 m-auto" value="Delete Account" name="delete">
            </div>
            <div class="form-outline mb-4">
                <input type="submit" class="form-control btn btn-outline-success w-50 m-auto" value="Don't Delete Account" name="dont_delete">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
