<?php
include('components/menu.php')
?>
<div class="main">
  <div class="wrapper">
    <h1>Change Password</h1>
    <br><br>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }
    if (isset($_SESSION['pwd_not_match'])) {
      echo $_SESSION['pwd_not_match'];
      unset($_SESSION['pwd_not_match']);
    }
    ?>

    <form action="" method="post">
      <table class="tbl1">
        <tr>
          <td>Current Password: </td>
          <td>
            <input type="password" name="current_password" placeholder="Current Password">
          </td>
        </tr>
        <tr>
          <td>New Password: </td>
          <td>
            <input type="password" name="new_password" placeholder="New Password">
          </td>
        </tr>
        <tr>
          <td>Confirm Password: </td>
          <td>
            <input type="password" name="confirm_password" placeholder="Confirm Password">
          </td>
        </tr>
        <tr colspan="2">
          <td>
            <input type="hidden" name="id" value="<?php echo $id ?>">
          </td>
          <td>
            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
          </td>
        </tr>
      </table>
    </form>

  </div>
</div>

<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $current_password = md5($_POST['current_password']);
  $new_password = md5($_POST['new_password']);
  $confirm_password = md5($_POST['confirm_password']);

  $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";

  $result = mysqli_query($conn, $sql);

  if ($result == true) {
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      if ($new_password == $confirm_password) {
        $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";

        $result2 = mysqli_query($conn, $sql2);

        if ($result2 == true) {
          $_SESSION['password_changed'] = "<div class='success'>Password Changed Successfully.</div>";
          header('location:' . SITEURL . '/admin/admin.php');
        } else {
          $_SESSION['password_changed'] = "<div class='error'>Failed To Change Password.</div>";
          header('location:' . SITEURL . '/admin/change-password.php');
        }
      } else {
        $_SESSION['pwd_not_match'] = "<div class='error'>Password Does Not Match.</div>";
        header('location:' . SITEURL . '/admin/change-password.php');
      }
    } else {
      $_SESSION['user_not_found'] = '<div class="error">User Not Found. </div>';
      header('location:' . SITEURL . '/admin/admin.php');
    }
  }
}
?>
<?php
include('components/footer.php')
?>