<?php

// includeing connect.php file
// include('./includes/connect.php');
$conn = mysqli_connect('localhost', 'root', '', 'mystore');
if (!$conn) {
  echo "Connection Not build";
} else {
  // echo "Connection Sucsess";
}


// getting all products 
function get_all_products()
{
  global $conn;

  // condition to check
  if (!isset($_GET['category_id']) and !isset($_GET['brand_id'])) {
    $select_query = "SELECT * FROM `products` ORDER BY rand()";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_keywords = $row['product_keywords'];
      $product_category_id = $row['category_id'];
      $product_brand_id = $row['brand_id'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_price = $row['product_price'];
      echo "<div class='col-md-4 mb-3'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' style='font-size:80%;'>$product_description</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-secondary '>View more</a>
            </div>
          </div>
        </div>";
    }
  }
}


// getting some products
function get_products()
{
  global $conn;

  // condition to check
  if (!isset($_GET['category_id']) and !isset($_GET['brand_id'])) {
    $select_query = "SELECT * FROM `products` ORDER BY rand()  LIMIT 0,9";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_keywords = $row['product_keywords'];
      $product_category_id = $row['category_id'];
      $product_brand_id = $row['brand_id'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_price = $row['product_price'];
      echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' style='font-size:80%;'>$product_description</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-outline-secondary '>View more</a>
              </div>
            </div>
          </div>";
    }
  }
}



// getting unique category form database
function get_unique_category()
{
  global $conn;

  // condition to check
  if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $select_query = "SELECT * FROM `products` WHERE category_id=$category_id ORDER BY rand()  LIMIT 0,20";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h1 class='text-center text-danger'>Not stock for this Category !</h1>";
    } else {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_category_id = $row['category_id'];
        $product_brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' style='font-size:80%;'>$product_description</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-outline-secondary '>View more</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}


// getting unique brand from database
function get_unique_brand()
{
  global $conn;

  // condition to check
  if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id ORDER BY rand()  LIMIT 0,20";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h1 class='text-center text-danger'>Service is Not Available for this Brand !</h1>";
    } else {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_category_id = $row['category_id'];
        $product_brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' style='font-size:80%;'>$product_description</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-outline-secondary '>View more</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}

// getting brands from databas
function get_brands()
{
  global $conn;
  $select_brands = "Select * from `brands`";
  $result_brands = mysqli_query($conn, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "<li class='nav-item'>
                <a href='index.php?brand_id={$brand_id}' class='nav-link' style='font-size:85%;'>{$brand_title}</a>
                </li>";
  }
}

// getting categories from database
function get_categories()
{
  global $conn;
  $select_categories = "Select * from `categories`";
  $result_categories = mysqli_query($conn, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
            <a href='index.php?category_id={$category_id}' class='nav-link' style='font-size: 85%;'>{$category_title}</a>
            </li>";
  }
}

// searching products
function search_product()
{
  global $conn;

  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
    $result_query = mysqli_query($conn, $search_query) or die("<script>alert('your search products Not available in database')</script>");
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h1 class='text-center text-danger'>Result Not mached, No Products found for this Category (\"$search_data_value\") !</h1>";
    } else {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_category_id = $row['category_id'];
        $product_brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' style='font-size:80%;'>$product_description</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-outline-secondary '>View more</a>

              </div>
            </div>
          </div>";
      }
    }
  }
}

function view_product_details()
{
  global $conn;

  // condition to check
  if (isset($_GET['product_id']) and !isset($_GET['category_id']) and !isset($_GET['brand_id'])) {
    $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    $row = mysqli_fetch_assoc($result_query);
    $product_price = $row['product_price'];
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_keywords = $row['product_keywords'];
      $product_category_id = $row['category_id'];
      $product_brand_id = $row['brand_id'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_price = $row['product_price'];
      echo "<div class='col-md-4'>
    <div class='card'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h6 class='btn-outline-secondary'>Rs:-  $product_price/-</h6>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text' style='font-size:80%;'>$product_description</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-warning'>Add to Cart</a>
          <a href='index.php' class='btn btn-outline-secondary '>Go To Home</a>
      </div>
    </div>
  </div>

  <!-- related images  -->
  <div class='col-md-8'>
    <div class='row'>
      <div class='col-md-12'>
        <h1 class='text-center mb-5'>Related Products</h1>
      </div>
      <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
      </div>
    </div>
  </div>";
    }
  }
}

// get ip address function
function get_ip_address()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  return $ip_address;
}
// $ip_address = get_ip_address();  
// echo 'User Real IP Address - '.$ip_address;  

// cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip_address = get_ip_address();
    $product_id = $_GET['add_to_cart'];
    $select_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address' AND product_id=$product_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present inside the cart')</script>";
      echo "<script>open('index.php','_self')</script>";
    } else {
      $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_query = mysqli_query($conn, $select_query) or die("<script>alert('products Not Selected from database')</script>");
    $row = mysqli_fetch_assoc($result_query);
    $product_price = $row['product_price'];
      $product_price = (int)$product_price;
      $insert_query = "INSERT INTO `cart` (product_id,ip_address,quantity,amount) VALUES ($product_id,'$ip_address',1,$product_price)";
      $result_query = mysqli_query($conn, $insert_query);
      echo "<script>alert('This item has been added successfully in the cart')</script>";
      echo "<script>open('index.php','_self')</script>";
    }
  }
}

// cart item details
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip_address = get_ip_address();
    $select_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_cart_items = mysqli_num_rows($result_query);
  } else {
    global $conn;
    $ip_address = get_ip_address();
    $select_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_cart_items = mysqli_num_rows($result_query);
  }
  echo $num_of_cart_items;
}

// total cart price function;

function total_cart_price()
{
  global $conn;
  $total_price = 0;
  $ip_address = get_ip_address();
  $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip_address'";
  $result = mysqli_query($conn, $cart_query);
  while ($rows = mysqli_fetch_array($result)) {
    $product_id = $rows['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_products = mysqli_query($conn, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
  //  return $total_price;
}

// getting user orders details
function get_user_orders_details()
{
  global $conn;
  $username = $_SESSION['username'];
  $get_details = "SELECT * FROM `user_table` WHERE user_name='$username'";
  $result_query = mysqli_query($conn, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_user_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_user_account'])) {
          $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
          $result_orders_query = mysqli_query($conn, $get_orders) or die("<script>alert('order Not select')</script>");
          $row_count = mysqli_num_rows($result_orders_query);
          // echo $row_count;
          if ($row_count > 0) {
            echo "<h3 class='text-center text-success mt-5 mb-2 '> You hava <span class='text-danger'>$row_count</span> Pending orders </h3>
              <p class='text-center'><a href='user_profile.php?my_orders' class='text-dark'>Orders Details</a>";
          } else {
            echo "<h3 class='text-center text-success mt-5 mb-2 '> You hava Zero Pending orders </h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a>";
          }
        }
      }
    }
  }
}
