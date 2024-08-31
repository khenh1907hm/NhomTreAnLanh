<?php
    if(isset($_GET['id_baiviet'])){
        $id_baiviet=$_GET['id_baiviet'];
    }else{
        $id_baiviet="";
    }
?>

<div style="
    display:flex;
    flex-direction:column;
    background-size: cover;
    background-position: center;
    height: 1083px;
    margin-left: 7%;
    width: 85%;
    padding: 15px;
    border-radius: 10px;
    border-color: rgb(138, 64, 121);
    border-style: solid;" class="cover">
    <div style="" class="content">
    <?php
        $sql_baiviet= mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id ='$id_baiviet'");
        $row_baiviet=mysqli_fetch_array($sql_baiviet)
    ?>
        <div class="container">
            <h2  style="font-style:italic;text-align:center;font-size:33px;"><?php echo $row_baiviet['tenbaiviet']?></h2>
            <div style="margin-bottom: 15px;" class="time">
            <p>Thời gian đăng bài:<?php echo $row_baiviet['time']?> </p>
            </div> 
            <img style="margin:auto; display:block;" width="50%" height="auto" src="uploads/<?php echo $row_baiviet['baiviet_image']?>" alt="">
            <p style="margin-top: 50px;"><?php echo $row_baiviet['noidung']?></p>
        </div>
    </div>
</div>