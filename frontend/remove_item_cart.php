<?php
require "connect.php";
session_start();
    $data = $_GET['data'];
      $q1 ="DELETE FROM `cart` WHERE `product-no`='$data';";
      $result1 = mysqli_query($conn, $q1);
      echo "<script>window.location ='shopping-cart.php'; </script>";


?>