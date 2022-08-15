<?php
include('../config/database.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Food Order System</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <div class="login">
    <h1 class="text-center">Login</h1>
    <br><br>
    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    if (isset($_SESSION['not-logged-in'])) {
      echo $_SESSION['not-logged-in'];
      unset($_SESSION['not-logged-in']);
    }
    ?>
    <br><br>

    <form action="" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" placeholder="Enter Username">
      <br><br>
      <label for="password">Password:</label>
      <input type="password" name="password" placeholder="Enter Password">
      <br><br>
      <input type="submit" name="submit" value="Login" class="btn-primary">
    </form>
    <p class="text-center">Created By <a href="www.samuelayokanmi">Samuel Ayokanmi</a></p>
  </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password='$password'";

  $result = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
    $_SESSION['user'] = $username;
    header('location:' . SITEURL . "/admin");
  } else {
    $_SESSION['login'] = "<div class='error text-center'>Login Failed. Username and Password Does not Match.</div>";
    header('location:' . SITEURL . "/admin/login.php");
  }
}
?>