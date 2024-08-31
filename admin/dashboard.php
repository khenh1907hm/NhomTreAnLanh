<?php
    session_start();
    include('../db/connet.php');
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


    $sql_number = mysqli_query($con,"SELECT * FROM tbl_dangky ORDER BY register_id DESC");


    $sql_count = mysqli_query($con, "SELECT COUNT(*) AS total FROM tbl_dangky");
    $row_count = mysqli_fetch_assoc($sql_count);
    $total_register = $row_count['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
      <style>
        li.nav-item.number{
            position:relative;
        }
        <?php
            $i=0;
            $row_capnhat = mysqli_fetch_array($sql_number);
            $i++;
        ?>
        .number::after{
            content:'<?php echo $total_register; ?>';
            border-radius: 50%;
            padding: 0px 6px 0px 6px;
            color:#fff;
            background-color:red;
            position: absolute;
            right: -12px;
            top:-8px;
        }
        /* Carousel styling */
#introCarousel,
.carousel-inner,
.carousel-item,
.carousel-item.active {
  height: 100vh;
}

.carousel-item:nth-child(1) {
  background-image: url('../img/background_2.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: left left;
}

.carousel-item:nth-child(2) {
  background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
}

.carousel-item:nth-child(3) {
  background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
}

/* Height for devices larger than 576px */
@media (min-width: 992px) {
  #introCarousel {
    margin-top: -58.59px;
  }
}

.navbar .nav-link {
  color: #fff !important;
}
    </style>
    
</head>
<body>
  <!--Main Navigation-->
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
    <div class="container-fluid">
      <!-- Navbar brand -->
      <a class="navbar-brand nav-link" href="dashboard.php">
        <strong style="color:tan">AN LANH </strong>
      </a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulidanhmuc.php">Danh mục</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulibaiviet.php" >Bài viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulilienhe.php" >Liên Hệ</a>
          </li>
          <li class="nav-item number">
            <a class="nav-link " href="xulithongtin.php" >Thư mới</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="xulithuvien.php" >Thư viện điện tử</a>
          </li>
        </ul>
        <div class="user ml-auto" style="color:#fff;">
          <span>Xin chào </span> <?php echo $_SESSION["dangnhap"] ?> <a class="btn btn-outline-danger" href="?login=dangxuat"> <i class="fa-solid fa-right-from-bracket"></i> LogOut</a>
          </div>
        
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Carousel wrapper -->
  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
    </ol>

    <!-- Inner -->
    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <img width="70px" src="../img/logo.png" alt="logo">
            </div>
          </div>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <h2>You can place here any content</h2>
            </div>
          </div>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <div class="mask" style="
              background: linear-gradient(
                45deg,
                rgba(29, 236, 197, 0.7),
                rgba(91, 14, 214, 0.7) 100%
              );
            ">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <h2>And cover it with any mask</h2>
              <a class="btn btn-outline-light btn-lg m-2"
                href="https://mdbootstrap.com/docs/standard/content-styles/masks/"  role="button">Learn
                about masks</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Carousel wrapper -->
</header>
<!--Main Navigation-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>