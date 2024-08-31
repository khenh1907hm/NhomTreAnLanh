<?php
    session_start();
    include('../db/connet.php');
    $sql_select = mysqli_query($con,"SELECT * FROM tbl_contact ORDER BY contact_id DESC");

    if(isset( $_POST["capnhatlienhe"])){
        $id_post=$_POST['contact_id'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $thoigian=$_POST['thoigian'];
        $sql_update=mysqli_query($con,"UPDATE tbl_contact SET diachi= '$diachi',sdt= '$sdt',thoigian= '$thoigian'" );
        header('Location:xulilienhe.php');
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
    <title>Danh mục</title>
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
        .navbar .nav-link{
            color:#fff;
        }
        .navbar{
            background-color: #000;
        }
    </style>
</head>
<body>
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
          <li class="nav-item ">
            <a class="nav-link " aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulidanhmuc.php">Danh mục</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulibaiviet.php">Bài viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="xulilienhe.php">Liên Hệ</a>
          </li>
          <li class="nav-item number ">
            <a class="nav-link " href="xulithongtin.php" >Thư mới</a>
          </li>
        </ul>
        <div class="user ml-auto" style="color:#fff;">
          <span>Xin chào </span> <?php echo $_SESSION["dangnhap"] ?> <a class="btn btn-outline-danger" href="?login=dangxuat"> <i class="fa-solid fa-right-from-bracket"></i> LogOut</a>
          </div>
        
      </div>
    </div>
  </nav>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_GET['quanli'])=='capnhat'){
                $id_capnhat= $_GET['id'];
                $sql_capnhat= mysqli_query($con,"SELECT * FROM tbl_contact WHERE contact_id= '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
            ?>
            <div class="col-md-3">
                <h4>Cập nhật liên hệ</h4>
                <label>Tên liên hệ</label>
                <form action="" method="POST">
                    <input type="text" name="diachi" class="form-control"  value="<?php echo $row_capnhat['diachi'] ?>" ><br>
                    <input type="hidden" name="contact_id" class="form-control"  value="<?php echo $row_capnhat['contact_id'] ?>">
                    <input type="text" name="sdt" class="form-control"  value="<?php echo $row_capnhat['sdt'] ?>" ><br>
                    <input type="text" name="thoigian" class="form-control"  value="<?php echo $row_capnhat['thoigian'] ?>" ><br>
                    <input type="submit" name="capnhatlienhe" value="Cập nhật liên hệ" class="btn btn-success" >
                </form>
            </div>
            <?php
            }
            ?>
            
            <div class="col-md-9">
                <h4>Liên hệ</h4>
                <table class="table table-responsive table-bordered table-tripped">
                    <tr>
                        <th>Địa chỉ</th>
                        <th>Hotline</th>
                        <th>Thời gian hoạt động</th>
                        <th>Quản Lí</th>
                    </tr>
                    <?php
                    while($row= mysqli_fetch_array($sql_select)){
                    ?>
                    <tr>
                        <th><?php echo $row['diachi'] ?></th>
                        <th><?php echo $row['sdt'] ?></th>
                        <th><?php echo $row['thoigian'] ?></th>
                        <th class=" d-flex justify-content-center align-items-center">&nbsp;&nbsp; <a style="text-decoration: none !important;" href="?quanli=capnhat&id=<?php echo $row['contact_id'] ?>"> Cập nhật &nbsp; <i class="fa-regular fa-pen-to-square"></i></a></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
