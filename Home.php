<?php
include_once('db/connet.php');
?>
<?php
  $sql_category= mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhóm trẻ An Lành</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/Home.css" />
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
      <?php include ('include/menu.php') ?>
      <?php  ?>
      <?php
      if(isset($_GET['quanli'])){
        $tam= $_GET['quanli'];
      }else{
        $tam='';
      }

      if($tam == 'chitietbaiviet'){
        include('include/chitietbaiviet.php');
      }elseif($tam =='chitietthuvien'){
        include('include/chitietthuvien.php');
      }else{
        include ('include/slider.php');
      }
      ?>
      <?php include ('include/footer.php') ?>
      
    </div>
    <script src="js/main.js"></script>
    <script>
      let votes = {
  option1: 0,
  option2: 0,
  option3: 0,
  option4: 0
};

document.getElementById('voteButton').addEventListener('click', function() {
  let selectedOption = document.querySelector('input[name="survey"]:checked');
  let notification = document.getElementById('notification');
  let notificationText = document.getElementById('notificationText');
  
  if (selectedOption) {
    votes[selectedOption.value]++;
    notificationText.textContent = 'Cảm ơn bạn đã bình chọn!';
    notification.style.display = 'block';
  } else {
    notificationText.textContent = 'Vui lòng chọn một tùy chọn trước khi bình chọn.';
    notification.style.display = 'block';
  }
});

document.getElementById('resultButton').addEventListener('click', function() {
  let questionDiv = document.querySelector('.question');
  
  questionDiv.innerHTML = `
    <p>Con được học và chơi gì?: ${votes.option1}</p>
    <p>"Khi đến trường cô giáo như mẹ hiền": ${votes.option2}</p>
    <p>Con được ăn gì? Uống gì? Ngủ ngon không: ${votes.option3}</p>
    <p>Tất cả ý kiến trên: ${votes.option4}</p>
  `;
  
  // Hide the vote button and show results in place of radio buttons
  document.querySelector('.answer').style.display = 'none';
  document.getElementById('notification').style.display = 'none';
});
    </script>
  </body>
</html>
