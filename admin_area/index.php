<?php
include('../includes/connect.php');
// include('../functions/commun_function.php');
@session_start();

if(isset($_SESSION['admin_name'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Deshboard</title>

    <!-- Bootstrap css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

      <!-- font awasome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--external css file link -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <style>
    body {
        overflow-x: hidden;
    }
    .admin_img{
        width: 100px;
    }
    .text{
        font-size: 12px;
    }
    .update_product_image{
        width: 80px;
    }

    .navbar-nav .nav-links{
        color:black;
        font-size:30px;
        font-weight:bold;
        padding:20px;
    }
    
    .navbar .navbars{
        display:flex;
        flex-direction:column;
    }

    .navbarPr .navbar-nav{
        display:flex;
        flex-direction:column;
        align-items:center;
    }

    .navbar-nav .nav-item{
        width: 100%;
    }

    .navbar-nav .nav-item a{
        font-size:20px;
        /* border:1px solid gray; */
        
    }

    .dhw{
        /* margin:0px; */
        width:300px;
        height:610px;
        background: linear-gradient(90deg, #00264d, #005b99);
    }

    .data{
        position:absolute;
        height:80vh;
        width:80%;
        top:50px;
        right:0;
        bottom:0;
        overflow:scroll;
        /* position:sticky; */
    }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-light" style=" height:130px;">
            <div class="container-fluid ">
                <img src="../images/logo.png" alt="logo" class="logo">
                <nav class="navbar ">
                    <ul class="navbar-nav">
                        <?php
                        if(isset($_SESSION['admin_name'])){
                            $admin_name = $_SESSION['admin_name'];
                            echo "<li class='nav-item'>
                            <a href='#' class='nav-links'>Welcome $admin_name !</a>
                            </li>";
                        }else{
                            echo "<li class='nav-item'>
                            <a href='#' class='nav-links'>Welcome Guest!</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>


        <!-- second Child -->
        <!-- <div class="bg-light">
        <p class="fw-bold text-center text-success" style="font-size: 100px;">Admin Section</p>
            <h1 class="text-center text-danger p-3">Manage Details</h1>
        </div> -->

        <!-- third Child start-->
        <nav class="navbar dhw navbar-expand-lg">
            <div class=" navbars container-fluid">
            <?php
                    // getting admin image frome database
                    $admin_name = $_SESSION['admin_name'];
                    $get_image = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
                    $get_result = mysqli_query($conn,$get_image);
                    if($get_row = mysqli_fetch_assoc($get_result)){
                        $admin_image = $get_row['admin_image'];
                    }
                ?>
            <a href="#"><img src="./admin_images/<?php echo $admin_image; ?>" alt="Admin" class="admin_img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbarPr collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light mx-1 px-3   text" aria-current="page" href="index.php?insert_products">Insert Products</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?view_products" class="nav-link active text-light px-3 text">View Products</a>
                        </li>                       
                        <li class="nav-item">
                        <a href="index.php?insert_category" class="nav-link text-light px-3 text">Inser Categories</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?view_categories" class="nav-link text-light  px-3 text">View Categories</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?insert_brands" class="nav-link text-light px-3 text">Insert Brands</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?view_brands" class="nav-link text-light  px-3 text">View Brands</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?listed_orders" class="nav-link text-light  px-3 text">All Orders</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?list_payments" class="nav-link text-light  px-3 text">All Payments</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?listed_users" class="nav-link text-light  px-3 text">Listed Users</a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?admin_logout" class="nav-link text-light  px-3 text">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <!-- Fourth Child -->
    <div class="data my-3">
       
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }elseif(isset($_GET['view_categories'])){
            include('view_categories.php');
        }elseif(isset($_GET['edit_category'])){
            include('edit_category.php');
        }elseif(isset($_GET['delete_category'])){
            include('delete_category.php');
        }elseif(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }elseif(isset($_GET['view_brands'])){
            include('view_brands.php');
        }elseif(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }elseif(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }elseif(isset($_GET['insert_products'])){
            include('insert_products.php');
        }elseif(isset($_GET['view_products'])){
            include('view_products.php');
        }elseif(isset($_GET['edit_products'])){
            include('edit_products.php');
        }elseif(isset($_GET['delete_products'])){
            include('delete_products.php');
        }elseif(isset($_GET['listed_orders'])){
            include('listed_orders.php');
        }elseif(isset($_GET['delete_order'])){
            include('delete_order.php');
        }elseif(isset($_GET['list_payments'])){
            include('list_payments.php');
        }elseif(isset($_GET['delete_payments'])){
            include('delete_payments.php');
        }elseif(isset($_GET['listed_users'])){
            include('listed_users.php');
        }elseif(isset($_GET['delete_user'])){
            include('delete_user.php');
        }elseif(isset($_GET['admin_logout'])){
            include('admin_logout.php');
        }
        
        ?>
    </div>

    
<!-- LAST Child -->

    <!-- footer start -->

    <!-- footer end -->

    
    <!-- Bootstrap js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
</html>
<?php
}else{
    include('admin_login.php');
}

?>