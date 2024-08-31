

<?php
    session_start();
    include('../db/connet.php');
    if(isset($_GET["login"])) {
        $dangxuat= $_GET["login"];
    }else{
        $dangxuat= '';
    }
    if($dangxuat=='dangxuat'){
        unset( $_SESSION['dangnhap']);
        header ("location:index.php");
    }

    $sql_select = mysqli_query($con,"SELECT * FROM tbl_dangky ORDER BY register_id DESC");
    // Đếm tổng số lượng register_id
    $sql_count = mysqli_query($con, "SELECT COUNT(*) AS total FROM tbl_dangky");
    $row_count = mysqli_fetch_assoc($sql_count);
    $total_register = $row_count['total'];
    // if(isset($_POST['thembaiviet'])){
    //     $tenbaiviet=$_POST['tenbaiviet'];
    //     $tomtat=$_POST['tomtat'];
    //     $noidung=$_POST['noidung'];
    //     $hinhanh=$_FILES['hinhanh']['name'];
    //     $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
    //     $path= '../uploads/';

    //     $sql_insert_baiviet=mysqli_query($con,"INSERT INTO tbl_baiviet
    //     (tenbaiviet,tomtat,noidung,baiviet_image) 
    //     value ('$tenbaiviet','$tomtat','$noidung','$hinhanh')");

    // move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    // }
    // elseif(isset($_POST["capnhatbaiviet"])) {
    //     $id_capnhat = $_POST['baiviet_id'];
    //     $tenbaiviet = $_POST['tenbaiviet'];
    //     $tomtat = $_POST['tomtat'];
    //     $noidung = $_POST['noidung'];
    //     $hinhanh = $_FILES['hinhanh']['name'];
    //     $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    //     $path = '../uploads/';
    
    //     if ($hinhanh == '') {
    //         $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', tomtat='$tomtat', noidung='$noidung' WHERE baiviet_id='$id_capnhat'";
    //     } else {
    //         move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
    //         $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', tomtat='$tomtat', noidung='$noidung', baiviet_image='$hinhanh' WHERE baiviet_id='$id_capnhat'";
    //     }
    //     mysqli_query($con, $sql_update_image);
    //     header('Location:xulibaiviet.php');
    // }

    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_delete=mysqli_query($con,"DELETE FROM tbl_dangky WHERE register_id= '$id'");
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
            $row_capnhat = mysqli_fetch_array($sql_select);
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
        .navbar .nav-link.active{
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
            <a class="nav-link" href="xulibaiviet.php" >Bài viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulilienhe.php" >Liên Hệ</a>
          </li>
          <li class="nav-item number">
            <a class="nav-link active" href="xulithongtin.php" >Thư mới</a>
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
            <div  class="mt-5">
                <h4>LIỆT KÊ BÀI VIẾT</h4>
                <table class="table table-responsive table-bordered table-tripped">
                    <tr>
                        <th>STT</th>
                        <th>Thông tin</th>
                        <th>Nội dung </th>
                        <th>Trạng Thái</th>
                    </tr>
                    <?php
                    $i=0;
                    // Reset lại con trỏ dữ liệu sau khi debug
                    mysqli_data_seek($sql_select, 0);
                    while($row= mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr>
                        <th><?php echo  $i ?></th>
                        <th> Tên trẻ: <?php echo $row['name_child'] ?><br> Tuổi(hoặc tháng) :<?php echo $row['age'] ?><br>Tên Phụ Huynh: <?php echo $row['name_parent'] ?><br>Số điện thoại: <?php echo $row['phone'] ?><br> Email : <?php echo $row['email'] ?><br>Địa chỉ: <?php echo $row['adress'] ?></th>
                        <th><?php  echo $row['content'] ?></th>
                        <!-- XÓA -->
                        <th class=" d-flex "><a style="text-decoration: none !important;" href="?xoa=<?php echo $row['register_id'] ?>">  &nbsp; <i style="font-size: 16px; color:green;padding-right:5px" class="fa-regular fa-square-check"></i> Đã đọc </a> 
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
