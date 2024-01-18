<?php
require "connect.php";
session_start();
if (isset($_SESSION['email'])) {
    $data = $_GET['data'];
      $q1 ="INSERT INTO `cart` (`user-no`, `product-no`) VALUES ('$_SESSION[email]', '$data');";
      $result1 = mysqli_query($conn, $q1);
      echo "<script>window.location ='shop.php'; </script>";

    } else {
        echo "<script>alert('You have no account, first create your account ')</script>";
        echo "<script>window.location ='shop.php'; </script>";
    }
?>