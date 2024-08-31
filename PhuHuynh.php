<?php
  include('db/connet.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goc Phu Huynh</title>
    <link rel="stylesheet" href="css/PhuHuynh.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
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
    <div style="display: flex;flex-direction: column;" id="content">
      <!-- <div class="same_box">
        <img src="img/logo.png" alt="ảnh content">
        <p class="topic">Thông báo Về việc chi trả kinh phí hỗ trợ học phí cho học sinh học tháng 4 và 5 năm học 2021 - 2022 do ảnh hưởng của dịch Covid-19</p><br>
        <p>Thực hiện kế hoạch số 167/KH-BCĐ ngày 24/5/2021 của Ban chỉ đạo tuyển sinh Quận Hà Đông về việc tuyển sinh vào các trường mầm non, lớp 1, lớp 6 năm học 2021 - 2022;Căn cứ tình hình thực tế, Trường mầm non Hoa Mai thông báo về việc tuyển sinh năm học 2021 - 2022 cụ thể như sau</p>
      </div> -->
      <?php
        $sql_baiviet= mysqli_query($con,'SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC');
        while($row_baiviet=mysqli_fetch_array($sql_baiviet)){
      ?>
      <a style="display:inline-block;text-decoration: none;" href="Home.php?quanli=chitietbaiviet&id_baiviet=<?php echo $row_baiviet['baiviet_id']?>">
        <div style="max-width: 1083px;" class="same_box">
          <div class="row">
            <div class="col-md-4 d-flex justify-content-center"><img style="width:100%;padding:15px; " src="uploads/<?php echo $row_baiviet['baiviet_image']?>" alt="ảnh content"></div>
            <div class="col-md-8">
              <p class="topic"><?php echo $row_baiviet['tenbaiviet']?></p><br>
              <p style="font-size:16px;"><?php echo $row_baiviet['tomtat']?></p>
              <span style="color:#2e2a2a;">Thời gian đăng bài: </span> <span><?php echo $row_baiviet['time']?></span>
            </div>
          </div>
        </div>
      </a>
      <?php
        }
      ?>
      <!-- <div class="same_box">
        <img src="img/logo.png" alt="ảnh content">
        <p class="topic">Thông báo về việc nghỉ Lễ Giỗ Tổ Hùng Vương (mùng 10/3)</p><br>
        <p>Căn cứ Điều 115 quy định về ngày nghỉ Lễ, Tết tại Bộ luật Lao động, trường mầm non Hoa Mai trân trọng thông báo về thời gian nghỉ giao dịch trong dịp Lễ Giỗ Tổ Hùng Vương năm 2021</p><br>
        <p>Thông tin từ Bộ giáo dục và đào tạo</p>
      </div>
      <div class="same_box"> 
        <img src="img/logo.png" alt="ảnh content">
        <p class="topic">Thông báo Về việc chi trả kinh phí hỗ trợ học phí cho học sinh học tháng 4 và 5 năm học 2021 - 2022 do ảnh hưởng của dịch Covid-19</p><br>
        <p>Thực hiện kế hoạch số 167/KH-BCĐ ngày 24/5/2021 của Ban chỉ đạo tuyển sinh Quận Hà Đông về việc tuyển sinh vào các trường mầm non, lớp 1, lớp 6 năm học 2021 - 2022;Căn cứ tình hình thực tế, Trường mầm non Hoa Mai thông báo về việc tuyển sinh năm học 2021 - 2022 cụ thể như sau</p>
      </div> -->
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
</html>