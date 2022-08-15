<?php
include('./components/menu.php');
?>
<!-- Main section start -->
<div class="main">
  <div class="wrapper">
    <h1>Category Dashbord</h1>
    <!-- Add category button -->
    <br> <br>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>

    <br><br>

    <a href="<?php echo SITEURL; ?>/admin/add-category.php" class="btn-primary">Add Category</a>
    <br> <br>
    <table class="tbl">
      <tbody>
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Image Name</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
        <?php
        // Get all admin from database
        $sql = "SELECT * FROM tbl_category";
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
              $title = $rows['title'];
              $image_name = $rows['image_name'];
              $featured = $rows['featured'];
              $active = $rows['active'];
        ?>
              <!-- Display database rows in the table -->
              <tr>
                <td><?php echo $sn++ ?> </td>
                <td><?php echo $title ?> </td>

                <td>
                  <?php
                  if ($image_name != "") {
                  ?>
                    <img src="<?php echo SITEURL; ?>/images/category<?php echo $image_name; ?>" alt="<?php echo $image_name?>">
                  <?php
                  } else{
                    echo "<div class='error'>Image Not Added.</div>";
                  }
                  ?>
                </td>

                <td><?php echo $featured ?> </td>
                <td><?php echo $active ?> </td>
                <td>
                  <a href="<?php echo SITEURL; ?>/admin/update-category.php?id=<?php echo $id ?>" class="btn-secondary">Update Category</a>
                  <a href="<?php echo SITEURL; ?>/admin/delete-category.php?id=<?php echo $id ?>" class="btn-danger">Delete Category</a>
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
include('./components/footer.php');
?>