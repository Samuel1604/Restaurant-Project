<?php

if (!isset($_SESSION['user'])) {
  $_SESSION['not-logged-in'] = "<div class='error text-center'>Please Login To Access Admin Panel.</div>";
  header('location:' . SITEURL . "/admin/login.php");
}
