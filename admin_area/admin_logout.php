<?php
@session_start();
@session_unset();
@session_destroy();
echo "<script>alert('You are Successfully Loged Out')</script>";
echo "<script>open('admin_login.php','_self')</script>";
?>