<?php
include_once('db/connet.php');
?>
<?php
  $sql_category= mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhóm trẻ An Lành</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/Home.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div id="main">
      <?php include ('include/menu.php') ?>
      <?php include ('include/slider.php') ?>
      <?php include ('include/footer.php') ?>
      
    </div>
    <script src="js/main.js"></script>
  </body>
</html>
