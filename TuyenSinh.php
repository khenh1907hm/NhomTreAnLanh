<?php
  include('db/connet.php');
  if(isset($_POST['guithongtin'])){
    $name_child=$_POST['name_child'];
    $age=$_POST['age'];
    $name_parent=$_POST['name_parent'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $adress=$_POST['adress'];
    $content=$_POST['content'];


    $sql_update= mysqli_query($con,"INSERT INTO tbl_dangky(name_child,age,name_parent,phone,email,adress,content)
    VALUE ('$name_child','$age','$name_parent','$phone','$email','$adress','$content')");
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goc Phu Huynh</title>
    <link rel="stylesheet" href="css/TuyenSinh.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
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
            <a href="PhuHuynh.php">Bài viết</a>
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
  <div id="slider">
  <div id="cover">
      <div class="form">
        <form action="#" method="POST" class="sub_form">
          <div class="upper-form">
            <h2>Đăng Kí Thông Tin</h2>
            <label> Họ và tên bé</label><br>
            <input type="text" name="name_child"><br>
            <label>Số tuổi của bé</label><br>
            <input type="text" name="age"><br>
            <label>Họ tên phụ huynh</label><br>
            <input type="text" name="name_parent"><br>
            <label>Số điện thoại phụ huynh</label><br>
            <input type="text" name="phone"><br>
            <label>E-mail</label><br>
            <input type="text" name="email"><br>
            <label>Địa chỉ nhà</label><br>
            <input type="text" name="adress"><br>
            <label>Tin nhắn</label><br>
            <textarea type="text" name="content" placeholder="Nhập tối đa 1000 kí tự"
                style="display: flex;
                      border-radius: 50px;
                      border-style: none;
                      outline: none;
                      margin-top: 8px;
                      padding: 12px 24px;
                      width: 400px;
                      height:100px;
                      background-color: #EAEEED;"> 
            </textarea><br><br>
            <div class="btn">
              <button onclick="showSuccessMessage()" name="guithongtin" type="submit">Gửi Thông Tin</button><br>
            </div>
          </div>
        </form>
      </div>
      <video autoplay src="img/TruongManNonAnLanh.mp4" type="video/mp4" loop ></video>
  </div>
</div>
  <!--  -->
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  // Hàm để hiển thị thông báo khi người dùng nhấn vào nút "Gửi Thông Tin"
  function showSuccessMessage() {
    Swal.fire({
      icon: 'success',
      title: 'Successfully',
      text: 'Thông tin đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể ♥',
      onClose: () => {
    console.log("Thông báo đã đóng!"); 
      }
    });
  }
  
</script>
</body>
</html>