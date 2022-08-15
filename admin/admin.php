<?php
include('components/menu.php');
?>

<!-- Main section start -->
<div class="main">
  <div class="wrapper">
    <h1>Admin Dashbord</h1>
    <!-- Add admin button -->
    <br> <br>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add']; //Display message.
      unset($_SESSION['add']); //Removes message.
    }
    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    if (isset($_SESSION['password_changed'])) {
      echo $_SESSION['password_changed'];
      unset($_SESSION['password_changed']);
    }
    if (isset($_SESSION['user_not_found'])) {
      echo $_SESSION['user_not_found'];
      unset($_SESSION['user_not_found']);
    }
    ?>
    <br> <br>
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br> <br>
    <table class="tbl">
      <tbody>
        <tr>
          <th>S.N.</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Actions</th>
        </tr>
        <?php
        // Get all admin from database
        $sql = "SELECT * FROM tbl_admin";
        // Execute query
        $result = mysqli_query($conn, $sql);
        // check there are rows in the database if result is TRUE
        if ($result == TRUE) {
          // count number of rows in database
          $count = mysqli_num_rows($result);
          // checks if there is a row in the database
          if ($count > 0) {
            // loops over all rows in the database.
            $sn = 1;
            while ($rows = mysqli_fetch_assoc($result)) {
              // Get each data of a row
              $id = $rows['id'];
              $full_name = $rows['full_name'];
              $username = $rows['username'];
        ?>
              <!-- Display database rows in the table -->
              <tr>
                <td><?php echo $sn++ ?> </td>
                <td><?php echo $full_name ?> </td>
                <td><?php echo $username ?> </td>
                <td>
                  <a href="<?php echo SITEURL; ?>/admin/change-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                  <a href="<?php echo SITEURL; ?>/admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                  <a href="<?php echo SITEURL; ?>/admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                </td>
              </tr>
        <?php
            }
          } else {
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Main section end -->

<?php
include('components/footer.php');
?>