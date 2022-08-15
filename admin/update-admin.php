<?php
include('components/menu.php');
?>

<div class="main">
  <div class="wrapper">
    <h1>Update Admin</h1>

    <br><br>

    <?php
    // Get the selected admin's ID
    
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result == true) {
      $count = mysqli_num_rows($result);

      if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row['full_name'];
        $username = $row['username'];
      } else {
        header("location:" . SITEURL . "/admin/admin.php");
      }
    }


    ?>

    <form action="" method="post">
      <table class="tbl1">
        <tr>
          <td>Full Name: </td>
          <td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
        </tr>
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username" value="<?php echo $username ?>"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

<?php
// Check if submit button is set to post method

if (isset($_POST['submit'])) {
  // Assign variables to the update admin form data
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];

  $sql = "UPDATE tbl_admin SET 
  full_name = '$full_name',
  username = '$username' WHERE id = '$id'
  ";
  $result = mysqli_query($conn, $sql);

  if ($result == true) {
    $_SESSION['update'] = '<div class="success">Admin Updated Successfully</div>';
    header('location:'.SITEURL.'/admin/admin.php');
  }
  else {
    $_SESSION['update'] = '<div class="error">Failed To Update Admin</div>';
    header('location:' . SITEURL . '/admin/update-admin.php');
  }
}

?>

<?php
include('components/footer.php');
?>