<?php
include('./components/menu.php');

include('../config/database.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$result = mysqli_query($conn, $sql);

if ($result == true) {
  $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
  header('location:'.SITEURL.'/admin/admin.php');
} else {
  $_SESSION['delete'] = '<div class="error">Failed to delete admin</div>';
  header('location:' . SITEURL . '/admin/admin.php');
}