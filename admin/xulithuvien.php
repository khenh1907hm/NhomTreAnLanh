<?php
    session_start();
    include('../db/connet.php');

    $sql_select = mysqli_query($con,"SELECT * FROM tbl_library ORDER BY product_id DESC");
    $sql_danhmuc=mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");

    // Thêm mới
    $sql_number = mysqli_query($con,"SELECT * FROM tbl_dangky ORDER BY register_id DESC");
    $sql_count = mysqli_query($con, "SELECT COUNT(*) AS total FROM tbl_dangky");
    $row_count = mysqli_fetch_assoc($sql_count);
    $total_register = $row_count['total'];

    // Thêm bài viết mới
    if(isset($_POST['thembaiviet'])){
        $tenbaiviet = $_POST['tenbaiviet'];
        $tomtat = $_POST['tomtat'];
        $link = $_POST['link'];
        $danhmuc = $_POST['danhmuc'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $path = '../uploads/';
        
        if (move_uploaded_file($hinhanh_tmp, $path . $hinhanh)) {
            $sql_insert_baiviet = mysqli_query($con, "INSERT INTO tbl_library (product_name, tomtat, product_link, category_id, product_img) VALUES ('$tenbaiviet', '$tomtat', '$link', '$danhmuc', '$hinhanh')");
        } else {
            echo "Lỗi khi tải lên hình ảnh.";
        }
    } elseif(isset($_POST["capnhatbaiviet"])) {
        $id_capnhat = $_POST['product_id'];
        $tenbaiviet = $_POST['tenbaiviet'];
        $tomtat = $_POST['tomtat'];
        $link = $_POST['link'];
        $danhmuc = $_POST['danhmuc'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $path = '../uploads/';
    
        if ($hinhanh == '') {
            $sql_update_image = "UPDATE tbl_library SET product_name='$tenbaiviet', tomtat='$tomtat', category_id='$danhmuc', product_link='$link' WHERE product_id='$id_capnhat'";
        } else {
            move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
            $sql_update_image = "UPDATE tbl_library SET product_name='$tenbaiviet', tomtat='$tomtat', category_id='$danhmuc', product_link='$link', product_img='$hinhanh' WHERE product_id='$id_capnhat'";
        }
        mysqli_query($con, $sql_update_image);
        header('Location:xulithuvien.php');
    }

    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_delete=mysqli_query($con,"DELETE FROM tbl_library WHERE product_id= '$id'");
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
        li.nav-item.number {
            position:relative;
        }
        .number::after {
            content:'<?php echo $total_register; ?>';
            border-radius: 50%;
            padding: 0px 6px 0px 6px;
            color:#fff;
            background-color:red;
            position: absolute;
            right: -12px;
            top:-8px;
        }
        .navbar {
            background-color: #000;
        }
        .navbar .nav-link.active {
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
            <a class="nav-link " href="xulibaiviet.php" >Bài viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xulilienhe.php" >Liên Hệ</a>
          </li>
          <li class="nav-item number">
            <a class="nav-link " href="xulithongtin.php" >Thư mới</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active " href="xulithuvien.php" >Thư viện điện tử</a>
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
            $id_capnhat= $_GET['capnhat_id'];
            $sql_capnhat= mysqli_query($con,"SELECT * FROM tbl_library WHERE product_id= '$id_capnhat'");
            $row_capnhat = mysqli_fetch_array($sql_capnhat);
        ?>
        <div class="">
            <h4>Cập nhật danh mục</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" class="form-control" value="<?php echo $row_capnhat['product_id'] ?>">

                    <label>Tên bài viết</label>
                    <input type="text" name="tenbaiviet" class="form-control" placeholder=" Tiêu đề bài viết" value="<?php echo $row_capnhat['product_name'] ?>"  required><br>
                    <label>Tóm tắt</label>
                    <textarea rows=10 type="text" name="tomtat" class="form-control" placeholder=" Tóm tắt ngắn" required ><?php echo $row_capnhat['tomtat'] ?></textarea><br>
                    <label>Danh mục</label>
                    <select name="danhmuc" class="form-control">
                    <option value="">----------Chọn danh mục----------</option>
                    <?php
                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        $selected = ($row_danhmuc['category_id'] == $row_capnhat['category_id']) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>" <?php echo $selected; ?>><?php echo $row_danhmuc['category_name'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                    <label>Link video</label>
                    <textarea type="text" name="link" class="form-control" placeholder="Video" required><?php echo $row_capnhat['product_link'] ?></textarea><br>
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="form-control" placeholder="" value=""><br>
                    <img style="margin-bottom: 15px;" width="100px" height="100px" src="../uploads/<?php echo $row_capnhat['product_img'] ?>" alt=""><br>
                    <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success">
                </form>
        </div>
        <?php
        } else {
        ?>
        <div class="">
            <h4>Thêm bài viết</h4>
            <?php
            $sql_select= mysqli_query($con,"SELECT * FROM tbl_library ORDER BY product_id DESC")
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Tên bài viết</label>
                <input type="text" name="tenbaiviet" class="form-control" placeholder="Nhập tên bài viết" required><br>
                <label>Tóm tắt</label>
                <textarea type="text" name="tomtat" class="form-control" placeholder="Tóm tắt nội dụng" required></textarea><br>
                <label>Danh mục</label><br>
                <select style="margin-top:8px;margin-bottom:8px;" name="danhmuc" id="">
                    <option value="">----------Chọn danh mục----------</option>
                    <?php
                        while($row_danhmuc= mysqli_fetch_array($sql_danhmuc)){
                    ?>
                    <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                    <?php
                        }
                    ?>
                </select><br>
                <label>Link video</label>
                <textarea type="text" name="link" class="form-control" placeholder="Gắn mã nhúng video vào đây" required></textarea><br>
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh" class="form-control" placeholder="" required><br>
                <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success">
            </form>
        </div>
        <?php
        }
        ?>
        <div class="mt-5">
            <h4>LIỆT KÊ BÀI VIẾT</h4>
            <table class="table table-bordered">
                <thead>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Tóm tắt</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <!-- <th>Link</th> -->
                    <th>Quản Lí</th>
                </thead>
                <?php
                $i = 0;
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_library, tbl_category WHERE tbl_library.category_id = tbl_category.category_id ORDER BY tbl_library.product_id DESC");
                while ($row = mysqli_fetch_array($sql_select)) {
                    $i++;
                ?>
                <tbody>
                    <th><?php echo $i ?></th>
                    <th><?php echo $row['product_name'] ?></th>
                    <th><?php echo $row['tomtat'] ?></th>
                    <th><?php echo $row['category_name'] ?></th>
                    <th><img src="../uploads/<?php echo $row['product_img'] ?>" alt="" height="80px" width="80px"></th>
                    <!-- <th><?php echo $row['product_link'] ?></th> -->
                    <th>
                        <a style="color:red;text-decoration: none !important;" href="?xoa=<?php echo $row['product_id'] ?>">Xóa</a> || 
                        <a style="text-decoration: none !important;" href="?quanli=capnhat&capnhat_id=<?php echo $row['product_id'] ?>">Sửa</a>
                    </th>
                <?php } ?>
                </tbody>
            </table>
            <?php
// Số lượng bản ghi trên mỗi trang
$limit = 10;

// Tính tổng số bản ghi
$sql_total_records = mysqli_query($con, "SELECT COUNT(*) AS total_records FROM tbl_library");
$row_total_records = mysqli_fetch_assoc($sql_total_records);
$total_records = $row_total_records['total_records'];

// Tính tổng số trang
$total_pages = ceil($total_records / $limit);

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính offset
$offset = ($current_page - 1) * $limit;

// Truy vấn CSDL với giới hạn và offset
$sql_select = mysqli_query($con, "SELECT * FROM tbl_library ORDER BY product_id DESC LIMIT $limit OFFSET $offset");

// Hiển thị dữ liệu và phân trang
// Hiển thị dữ liệu ở đây
?>
<div class="pagination justify-content-center">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <?php $active = ($i == $current_page) ? "active" : ""; ?>
            <li class="page-item <?php echo $active; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
    </ul>
</div>
        </div>
    </div>
</div>
</body>
</html>
