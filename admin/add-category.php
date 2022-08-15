<?php
include('components/menu.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <div class="main">
    <div class="wrapper">
      <h1>Add Category</h1>
      <br><br>

      <?php
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      ?>
      <?php
      if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
      ?>
      <br><br>
      <!-- Add category form starts -->
      <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl1">
          <tr>
            <td>Title: </td>
            <td>
              <input type="text" name="title" placeholder="Category Title">
            </td>
          </tr>
          <tr>
            <td>Select Image: </td>
            <td>
              <input type="file" name="image">
            </td>
          </tr>
          <tr>
            <td>Featured: </td>
            <td>
              <input type="radio" name="featured" value="Yes"> Yes
              <input type="radio" name="featured" value="No"> No
            </td>
          </tr>
          <tr>
            <td>Active: </td>
            <td>
              <input type="radio" name="active" value="Yes"> Yes
              <input type="radio" name="featured" value="No"> No
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
          </tr>
        </table>
      </form>
      <!-- Add category form ends -->

      <?php
      // check if the submit botton is clicked
      if (isset($_POST['submit'])) {
        $title = $_POST['title'];

        if (isset($_POST['featured'])) {
          $featured = $_POST['featured'];
        } else {
          $featured = 'No';
        }

        if (isset($_POST['active'])) {
          $active = $_POST['active'];
        } else {
          $active = 'No';
        }

        // print_r($_FILES['image']);
        // die();

        if (isset($_FILES['image']['name'])) {
          $image_name = $_FILES['image']['name'];

          $ext = end(explode('.', $image_name));

          $image_name = "Food_Category".rand(000, 999).".".$ext;

          $path = $_FILES['image']['tmp_name'];

          $destination = "../images/category/" . $image_name;

          $upload = move_uploaded_file($path, $destination);

          if ($upload == false) {
            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image</div>";
            header('location:' . SITEURL . '/admin/add-category.php');
            die();
          }
        } else {
          $image_name = "";
        }
        
        $sql = "INSERT INTO tbl_category SET
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
        ";

        $result = mysqli_query($conn, $sql);

        if ($result == true) {
          $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
          header('location:' . SITEURL . '/admin/categories.php');
        } else {
          $_SESSION['add'] = "<div class='error'>Failed To Add Category.</div>";
          header('location:' . SITEURL . '/admin/add-category.php');
        }
        // echo 'clicked';
      }
      ?>

    </div>
  </div>

</body>

</html>

<?php
include('components/footer.php');
?>