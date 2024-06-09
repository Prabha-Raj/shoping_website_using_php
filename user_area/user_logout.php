<?php
session_start();
session_unset();
session_destroy();
if(!isset($_SESSION['username'])){
    echo "<script>open('../index.php','_self')</script>";
}
?>