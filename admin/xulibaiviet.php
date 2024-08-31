

<?php
    session_start();
    include('../db/connet.php');

    $sql_select = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
// the moi
    $sql_number = mysqli_query($con,"SELECT * FROM tbl_dangky ORDER BY register_id DESC");


    $sql_count = mysqli_query($con, "SELECT COUNT(*) AS total FROM tbl_dangky");
    $row_count = mysqli_fetch_assoc($sql_count);
    $total_register = $row_count['total'];
//end: thu moi

    if(isset($_POST['thembaiviet'])){
        $tenbaiviet=$_POST['tenbaiviet'];
        $tomtat=$_POST['tomtat'];
        $noidung=$_POST['noidung'];
        $hinhanh=$_FILES['hinhanh']['name'];
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        $path= '../uploads/';

        $sql_insert_baiviet=mysqli_query($con,"INSERT INTO tbl_baiviet
        (tenbaiviet,tomtat,noidung,baiviet_image) 
        value ('$tenbaiviet','$tomtat','$noidung','$hinhanh')");

    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    }
    elseif(isset($_POST["capnhatbaiviet"])) {
        $id_capnhat = $_POST['baiviet_id'];
        $tenbaiviet = $_POST['tenbaiviet'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $path = '../uploads/';
    
        if ($hinhanh == '') {
            $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', tomtat='$tomtat', noidung='$noidung' WHERE baiviet_id='$id_capnhat'";
        } else {
            move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
            $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', tomtat='$tomtat', noidung='$noidung', baiviet_image='$hinhanh' WHERE baiviet_id='$id_capnhat'";
        }
        mysqli_query($con, $sql_update_image);
        header('Location:xulibaiviet.php');
    }

    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_delete=mysqli_query($con,"DELETE FROM tbl_baiviet WHERE baiviet_id= '$id'");
    }
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
        .navbar{
            background-color: #000;
        }
        .navbar .nav-link.active{
            color:#fff;
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
            <a class="nav-link active" href="xulibaiviet.php" >Bài viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulilienhe.php" >Liên Hệ</a>
          </li>
          <li class="nav-item number">
            <a class="nav-link " href="xulithongtin.php" >Thư mới</a>
          </li>
        </ul>
        <div class="user ml-auto" style="color:#fff;">
          <span>Xin chào </span> <?php echo $_SESSION["dangnhap"] ?> <a class="btn btn-outline-danger" href="?login=dangxuat"> <i class="fa-solid fa-right-from-bracket"></i> LogOut</a>
          </div>
        
      </div>
    </div>
  </nav>
    <div class="container-fluid">
        <div class="row">
            <?php
            if(isset($_GET['quanli'])=='capnhat'){
                $id_capnhat= $_GET['id'];
                $sql_capnhat= mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id= '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
            ?>
            
            <div class="">
                <h4>Cập nhật danh mục</h4>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="baiviet_id" class="form-control"  value="<?php echo $row_capnhat['baiviet_id'] ?>">

                        <label>Tên bài viết</label>
                        <input type="text" name="tenbaiviet" class="form-control" placeholder=" Tiêu đề bài viết" value="<?php echo $row_capnhat['tenbaiviet'] ?>"  require><br>
                        <label>Tóm tắt</label>
                        <textarea rows=10 type="text" name="tomtat" class="form-control" placeholder=" Tóm tắt ngắn"  require ><?php echo $row_capnhat['tomtat'] ?></textarea><br>
                        <label>Nội dung</label>
                        <textarea rows=10 name="noidung" class="form-control" placeholder="Nội dung" require ><?php echo $row_capnhat['noidung'] ?></textarea><br>
                        <label>Hình ảnh</label>
                        <input type="file" name="hinhanh" class="form-control" placeholder=""  value=""  require><br>
                            <img style="margin-bottom: 15px;" width="100px" height="100px" src="../uploads/<?php echo $row_capnhat['baiviet_image'] ?>" alt=""><br>
                        <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success" >
                    </form>
                
            </div>
            <?php
            }else{
                ?>
            <div class="">
                <h4>Thêm bài viết</h4>
                <?php
                $sql_select= mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC")
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên bài viết</label>
                    <input type="text" name="tenbaiviet" class="form-control" placeholder="" require><br>
                    <label>Tóm tắt</label>
                    <textarea rows=10 type="text" name="tomtat" class="form-control" placeholder="" require ></textarea><br>
                    <label>Nội dung</label>
                    <textarea rows=10 type="text" name="noidung" class="form-control" placeholder="" require></textarea><br>
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="form-control" placeholder=""  require><br>
                    <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success" >
                </form>
            </div>
            <?php
            }
            ?>
            
            <div  class="mt-5">
                <h4>LIỆT KÊ BÀI VIẾT</h4>
                <table class="table table-responsive table-bordered table-tripped">
                    <tr>
                        <th>STT</th>
                        <th>Tên bài viết </th>
                        <th>Tóm tắt </th>
                        <th>Nội dung chính </th>
                        <th>Hình ảnh </th>
                        <th>Quản Lí</th>
                    </tr>
                    <?php
                    $i=0;
                    while($row= mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr>
                        <th><?php echo  $i ?></th>
                        <th><?php echo $row['tenbaiviet'] ?></th>
                        <th><?php echo $row['tomtat'] ?></th>
                        <th><?php echo $row['noidung'] ?></th>
                        <th><img src="../uploads/<?php echo $row['baiviet_image'] ?>" alt="" height="80px" width="80px"></th>
                        <!-- XÓA -->
                        <th class=" d-flex "><a style="color:red;text-decoration: none !important;" href="?xoa=<?php echo $row['baiviet_id'] ?>">  &nbsp; <i class="fa-solid fa-trash"></i></a> &nbsp;&nbsp; ||
                        <!-- SỬA -->
                        &nbsp;&nbsp; <a style="text-decoration: none !important;" href="?quanli=capnhat&id=<?php echo $row['baiviet_id'] ?>">  &nbsp; <i class="fa-regular fa-pen-to-square"></i></a></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
