<?php
include('components/menu.php');
?>
<!-- Main section start -->
<!-- Add admin page -->
<div class="main">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br> <br>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add']; //Display message.
      unset($_SESSION['add']); //Removes message.
    }
    ?>
    <br><br>
    <form action="" method="post">
      <table class="tbl1">
        <tr>
          <td>Full Name: </td>
          <td><input type="text" name="full_name" placeholder="Enter Your Full Name"></td>
        </tr>
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username" placeholder="Enter Your Username"></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input type="password" name="password" placeholder="Enter Your Password"></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
        </tr>
      </table>
    </form>

  </div>
</div>
<!-- Main section end -->
<?php
include('components/footer.php');
?>

<?php
// Check if submit button is set to post method

if (isset($_POST['submit'])) {
  // Assign variables to the add admin form data

  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); //Password Encryption using MD5.

  // SQL query to save add admin form data to the database
  $sql = "INSERT INTO tbl_admin SET
  full_name='$full_name',
  username='$username',
  password='$password'
  ";

  $result =  mysqli_query($conn, $sql); // Executing sql query and save data to the database

  // check if data was successfully inserted in database or not with an approprate message.
  if ($result == TRUE) {
    // display success message using session.
    $_SESSION['add'] = '<div class="success">Admin Added Successfully</div>';
    // Redirect to admin page
    header("location:" . SITEURL . "/admin/admin.php");
  } else {
    // display error message using session.
    $_SESSION['add'] = 'Failed to Add Admin';
    // Redirect to add admin page
    header("location:" . SITEURL . "admin/add-admin.php");
  }
}

?>