<?php
  session_start();
  include('../db/connet.php');
?>
<?php
  if(isset($_POST['dangnhap'])){
    $taikhoan= $_POST['taikhoan'];
    $matkhau=md5( $_POST['matkhau']);
    if($taikhoan == '' && $matkhau ==''){
      echo' <p> Please  fill in all fields </p>';
    }else{
      $sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email= '$taikhoan'  AND password='$matkhau' LIMIT 1");
      $count= mysqli_num_rows($sql_select_admin);
      $row_dangnhap=mysqli_fetch_array($sql_select_admin);
      if($count>0){
        $_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
        $_SESSION['admin_id'] = $row_dangnhap['admin_id'];
        header('Location: dashboard.php');
      }else {
        // echo '<script>var loginFailed = true;</script>';
      }
      
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body style="display:flex; align-items:center; justify-content:center;">
  <div class="login-page">
    <div class="form">
      <form class="register-form" method="POST">
        <img style="width: 100px;"  src="../img/logo.png" alt="" />
        <h2>Register</h2>
        <input type="text" placeholder="Full Name *" required/>
        <input type="text" placeholder="Username *" required/>
        <input type="email" placeholder="Email *" required/>
        <input type="password" placeholder="Password *" required/>
        <a class="btn" href="#">
          
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Create
        </a>
        <p class="message">Already registered? <a  href="#">Sign In</a></p>
      </form>
      
      <form class="login-form" action="" method="post">
        <img style="width: 100px;"  src="../img/logo.png" alt="" />
        <h2></i> Login Admin</h2>
        <input type="text"  name="taikhoan" placeholder="Username" required />
        <input type="password"  name="matkhau" placeholder="Password" required/>
        <input style="width: 50%; border: 0.5px solid #fff" class="btn"  type="submit" name="dangnhap" value="Sign Up">
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    function showSuccessMessage() {
    Swal.fire({
      icon: 'success',
      title: 'Successfully',
      text: 'Thông tin đã được gửi thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể ♥'
    });
  }
</script>
  </script>
  </body>
</html>