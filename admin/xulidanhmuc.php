<?php
    include('../db/connet.php');

    $sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");

    if(isset($_POST['themdanhmuc'])){
        $danhmuc=$_POST['danhmuc'];
        $sql_insert=mysqli_query($con,"INSERT INTO tbl_category(category_name) value ('$danhmuc')");
    }elseif(isset( $_POST["capnhatdanhmuc"])){
        $id_post=$_POST['id_danhmuc'];
        $danhmuc=$_POST['danhmuc'];
        $sql_update=mysqli_query($con,"UPDATE tbl_category SET category_name= '$danhmuc' WHERE category_id = '$id_post'" );
        // header('Location:xuludanhmuc.php');
    }

    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_delete=mysqli_query($con,"DELETE FROM tbl_category WHERE category_id= '$id'");
        // header('Location:xuludanhmuc.php');
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
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_GET['quanli'])=='capnhat'){
                $id_capnhat= $_GET['id'];
                $sql_capnhat= mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id= '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
            ?>
            <div class="col-md-4">
                <h4>Cập nhật danh mục</h4>
                <label>Tên danh mục</label>
                <form action="" method="POST">
                    <input type="text" name="danhmuc" class="form-control"  value="<?php echo $row_capnhat['category_name'] ?>" ><br>
                    <input type="hidden" name="id_danhmuc" class="form-control"  value="<?php echo $row_capnhat['category_id'] ?>">
                    <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-success" >
                </form>
            </div>
            <?php
            }else{
                ?>
            <div class="col-md-4">
                <h4>Thêm danh mục</h4>
                <?php
                $sql_select= mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC")
                ?>
                <label>Tên danh mục</label>
                <form action="" method="POST">
                    <input type="text" name="danhmuc" class="form-control" placeholder="" ><br>
                    <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-success" >
                </form>
            </div>
            <?php
            }
            ?>
            
            <div class="col-md-8">
                <h4>liệt kê danh mục</h4>
                <table class="table table-responsive table-bordered table-tripped">
                    <tr>
                        <th>STT</th>
                        <th>Tên Danh Mục</th>
                        <th>Quản Lí</th>
                    </tr>
                    <?php
                    $i=0;
                    while($row= mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr>
                        <th><?php echo  $i ?></th>
                        <th><?php echo $row['category_name'] ?></th>
                        <th class=" d-flex justify-content-center align-items-center"><a style="color:red;text-decoration: none !important;" href="?xoa=<?php echo $row['category_id'] ?>"> Xóa &nbsp; <i class="fa-solid fa-trash"></i></a> &nbsp;&nbsp; ||
                        &nbsp;&nbsp; <a style="text-decoration: none !important;" href="?quanli=capnhat&id=<?php echo $row['category_id'] ?>"> Cập nhật &nbsp; <i class="fa-regular fa-pen-to-square"></i></a></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
