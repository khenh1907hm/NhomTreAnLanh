<?php
  include('db/connet.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goc Phu Huynh</title>
    <link rel="stylesheet" href="css/LienHe.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
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
        <h5 class="mobile-text">0839395281 - 0559776768</h5>
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
            <a href="PhuHuynh.php">Góc Phụ Huynh</a>
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
            <a style="width: 108px" href="LienHe.php">Liên Hệ</a>
          </li>
          <i class="fa-solid fa-magnifying-glass"></i>
        </ul>
      </div>
    </div>
  <div id="cover">
    <div class="box_content">
        <div class="tilte"><h1>Thông Tin Liên Hệ </h1></div>
        <img class="cloud_img" src="img/cloud.png" alt="đám mây">
    </div>
    <div id="slider">
    <?php
        $sql_contact= mysqli_query($con,'SELECT * FROM tbl_contact ORDER BY contact_id DESC');
        $row_contact=mysqli_fetch_array($sql_contact);
      ?>
        <div class="icon_list">
            <div class="location">
                <i class="ti-location-pin"></i><b>Địa chỉ</b>
                <p><?php echo $row_contact['diachi'] ?></p>
            </div>
        </div>
        <div class="icon_list">
            <div class="location">
                <i class="ti-mobile"></i><b>Hotline</b>
                <p><?php echo $row_contact['sdt'] ?></p>
            </div>
        </div>
        <div class="icon_list_1">
            <div class="location">
                <i class="ti-time"></i><b>Thời gian Hoạt động</b>
                <p> Time:<?php echo $row_contact['thoigian'] ?> </p>
            </div>
        </div>
    </div>
    <div id="map">
      <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3906.4399091553896!2d108.36611797489739!3d11.73402768847904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317146d2a3cc6a9b%3A0x71293e21e1fa319c!2zMTUgxJDDtG5nIMSQw7QsIExpw6puIE5naMSpYSwgxJDhu6ljIFRy4buNbmcsIEzDom0gxJDhu5NuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1705373948566!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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