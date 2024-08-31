<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header ("Location: index.php");
    }
?>
<?php 
    if(isset($_GET["login"])) {
        $dangxuat= $_GET["login"];
    }else{
        $dangxuat= '';
    }
    if($dangxuat=='dangxuat'){
        unset( $_SESSION['dangnhap']);
        header ("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <img  width="50px"  src="../img/logo.png" alt=""> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="xulidanhmuc.php">Danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <div class="user ml-auto" style="  margin-left: 1000px;line-height:40px;">
        <span>Xin chào </span> <?php echo $_SESSION["dangnhap"] ?> <a class="btn btn-outline-primary" href="?login=dangxuat"> <i class="fa-solid fa-right-from-bracket"></i> LogOut</a>
        </div>
       
    </div>
  </div>
</nav>
</body>
</html>