<?php
  include('components/menu.php');
?>

  <!-- Main section start -->
  <div class="main">
    <div class="wrapper">
      <h1>Dashbord</h1>
      <br><br>
      <?php
        if(isset($_SESSION['login']))
        {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
      ?>
      <br><br>
      <div class="boxes">

        <div class="box">
          <h1>5</h1>
          <br>
          Categories
        </div>

        <div class="box">
          <h1>5</h1>
          <br>
          Categories
        </div>

        <div class="box">
          <h1>5</h1>
          <br>
          Categories
        </div>

        <div class="box">
          <h1>5</h1>
          <br>
          Categories
        </div>

      </div>
    </div>
  </div>
  <!-- Main section end -->

<?php
  include('components/footer.php');
?>