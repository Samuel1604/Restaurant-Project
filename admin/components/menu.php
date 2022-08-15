<?php
include("../config/database.php");
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order Website</title>
  <!-- linked css file -->
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <!-- Menu section start -->
  <div class="menu">
    <div class="wrapper">
      <div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="categories.php">Category</a></li>
          <li><a href="foods.php">Food</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Menu section end -->