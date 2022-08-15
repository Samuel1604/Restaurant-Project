<?php
include('../config/database.php');
// Destroy all session to logout
  session_destroy();// This unsets $_SESSION['user']
  
  // Redirect to admin login page.
  header("location:".SITEURL."/admin/login.php");
?>