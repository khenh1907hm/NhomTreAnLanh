<?php
  include('db/connet.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Goc Phu Huynh</title>
     <link rel="stylesheet" href="css/BangTin.css">
     <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div id="header">
      <!-- --------Begin: Introduce---------- -->
      <div id="location">
        <i class="fa-solid fa-location-dot"></i>
        <h5 class="localtion-text">
          Thị trấn Liên Nghĩa, Đức Trọng, Lâm Đồng
        </h5>
      </div>
      <div id="contact">
        <i class="fa-solid fa-mobile-screen-button"></i>
        <h5 style=" font-size:15px;" class="mobile-text">0839395281 - 0559776768</h5>
      </div>
      <div id="icon-list">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-google-plus-g"></i>
      </div>
      <!-- --------End: Introduce---------- -->
      <div id="nav">
        <img src="img/mainlogo.png" alt="logo" />
        <ul class="nav_list">
          <li>
            <a href="Home.php"
              ><i class="fa-solid fa-house"></i>
              Trang Chủ
            </a>
          </li>
          <li>
            <a href="PhuHuynh.php">Tin tức mới</a>
          </li>
          <li>
            <a style="width: 125.5px" href="#">Góc của bé ♥</a>
            <ul class="subnav">
              <li>
                <a href="ThucDon.php">Thực đơn</a>
              </li>
              <li>
                <a href="LichHoc.php">Lịch học</a>
              </li>
            </ul>
          </li>
          <li>
            <a style="width: 125.5px" href="BangTin.php">Bản Tin</a>
          </li>
          <li>
            <a href="TuyenSinh.php">Tuyển Sinh</a>
          </li>
          <li>
            <a style="width: 108px" href="/LienHe.php">Liên Hệ</a>
          </li>
          <i class="fa-solid fa-magnifying-glass"></i>
        </ul>
      </div>
    </div>
  <div id="slider">


    <div id="cover">
    <select style="position:absolute;right:0;margin-right:11%;width: 15%;border-radius:999px;padding:5px;" name="category_select" id="category_select">
          <option value="0">--------Chọn danh mục-------</option>
          <?php
            // Truy vấn để lấy tất cả các danh mục từ bảng tbl_category
            $sql_categories = mysqli_query($con, 'SELECT * FROM tbl_category');
            while($row_category = mysqli_fetch_array($sql_categories)) {
              echo "<option value='" . $row_category['category_id'] . "'>" . $row_category['category_name'] . "</option>";
            }
          ?>
        </select>
      <div class=" container-fluid" style="display: flex;flex-direction: column;margin-top:20px" id="content">
      <?php
            if(isset($_GET['category_id']) && $_GET['category_id'] != 0) {
              // Nếu người dùng đã chọn một danh mục cụ thể
              $selected_category_id = $_GET['category_id'];
              // Truy vấn để lấy các bản tin thuộc danh mục đã chọn
              $sql_baiviet = mysqli_query($con, "SELECT tbl_library.*, tbl_category.category_name FROM tbl_library JOIN tbl_category ON tbl_library.category_id = tbl_category.category_id WHERE tbl_library.category_id = $selected_category_id ORDER BY tbl_library.product_id DESC");
              while($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
          ?>
                <a style="display:inline-block;text-decoration: none;" href="Home.php?quanli=chitietthuvien&id_thuvien=<?php echo $row_baiviet['product_id']?>">
                  <div style="max-width: 1083px;" class="same_box">
                    <div class="row">
                      <div class="col-md-4 d-flex justify-content-center"><img style="width:100%;padding:15px; " src="uploads/<?php echo $row_baiviet['product_img']?>" alt="ảnh giới thiệu"></div>
                      <div class="col-md-8">
                        <p class="topic"><?php echo $row_baiviet['product_name']?></p><br>
                        <span style="color:#2e2a2a;">Thời gian đăng bài: </span> <span style=" border-right: 1px solid #ccc;padding-right: 5px"><?php echo $row_baiviet['time']?></span>
                        <p style="font-size:16px;display:inline-block;margin-bottom:0px;"><?php echo $row_baiviet['category_name']?></p>
                        </div>
                    </div>
                  </div>
                </a>
          <?php
              }
            } else {
              // Nếu chưa chọn danh mục, hiển thị tất cả các bản tin
              $sql_baiviet= mysqli_query($con,'SELECT tbl_library.*, tbl_category.category_name FROM tbl_library JOIN tbl_category ON tbl_library.category_id = tbl_category.category_id ORDER BY tbl_library.product_id DESC');
              while($row_baiviet=mysqli_fetch_array($sql_baiviet)){
          ?>
                <a style="display:inline-block;text-decoration: none;" href="Home.php?quanli=chitietthuvien&id_thuvien=<?php echo $row_baiviet['product_id']?>">
                  <div style="max-width: 1083px;" class="same_box">
                    <div class="row">
                      <div class="col-md-4 d-flex justify-content-center"><img style="width:100%;padding:15px; " src="uploads/<?php echo $row_baiviet['product_img']?>" alt="ảnh giới thiệu"></div>
                      <div class="col-md-8">
                        <p class="topic"><?php echo $row_baiviet['product_name']?></p><br>
                        <span style="color:#2e2a2a;">Thời gian đăng bài: </span> <span style=" border-right: 1px solid #ccc;padding-right: 5px"><?php echo $row_baiviet['time']?></span>
                        <p style="font-size:16px;display:inline-block;margin-bottom:0px;"><?php echo $row_baiviet['category_name']?></p>
                      </div>
                    </div>
                  </div>
                </a>
          <?php
              }
            }
          ?>
        </div>
      </div>
    </div>
  <div id="footer">
    <div class="subfooter">
      <div class="text_box">
        <h2>Kết nối với chúng tôi <i class="fa-regular fa-user"></i></h2>
        <a
          href="https://www.google.com/maps/place/25+%C4%90%C3%B4ng+%C4%90%C3%B4,+Li%C3%AAn+Ngh%C4%A9a,+%C4%90%E1%BB%A9c+Tr%E1%BB%8Dng,+L%C3%A2m+%C4%90%E1%BB%93ng,+Vi%E1%BB%87t+Nam/@11.7341425,108.3635017,17z/data=!3m1!4b1!4m6!3m5!1s0x317146d2a0c130b7:0x736adc8bbae3750!8m2!3d11.7341425!4d108.3683726!16s%2Fg%2F11jblfgwp4?entry=ttu"
          ><i class="fa-solid fa-house"></i>
            25 Đông Đô,Thị trấn Liên Nghĩa, Đức Trọng, Lâm Đồng</i
          ></a
        ><br />
        <a href="tel:0839395292"
          ><i class="fa-solid fa-phone"></i> SĐT: 0839395281-0559776769</i><br
        /></a>
        <a href="www.facebook/khenh1907"
          ><i class="fa-brands fa-facebook"></i> facebook: www.facebook/khenh1907</i><br
        /></a>
        <i class="fa-regular fa-envelope-open"></i> gmail: hminh19072003@gmail.com</i><br />
        <i class="fa-regular fa-credit-card"></i> Techcombank : 19038205728013 </i>
      </div>
      <div class="topic_box">
        <h2 style="text-align: left">Phương châm :</h2>
        <br />
        <h4>
          "Trẻ con như búp trên cành<br />
          biết ăn, biết ngủ, biết học hành là ngoan"
        </h4>
        <h2 style="text-align: right">"Hồ Chí Minh"</h2>
      </div>
      <img
        style="padding-left: 200px"
        src="img/logo_1.png"
        alt="banner"
        class="banner"
      />
    </div>
  </div>
</body>
<script>
    // Script để chuyển hướng khi chọn một danh mục
    document.getElementById('category_select').addEventListener('change', function() {
      var selectedCategoryId = this.value;
      // Chuyển hướng trang về chính nó với tham số category_id để thực hiện việc lọc bản tin
      window.location.href = 'BangTin.php?category_id=' + selectedCategoryId;
    });
  </script>
</html>
