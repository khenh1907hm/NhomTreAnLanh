<?php
    if(isset($_GET['id_thuvien'])){
        $id_baiviet=$_GET['id_thuvien'];
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
        $sql_baiviet= mysqli_query($con,"SELECT tbl_library.*, tbl_category.category_name FROM tbl_library JOIN tbl_category ON tbl_library.category_id = tbl_category.category_id WHERE product_id='$id_baiviet'");
        $row_baiviet=mysqli_fetch_array($sql_baiviet)
    ?>
        <div class="container">
            <h2  style="font-style:italic;text-align:center;font-size:33px;"><?php echo $row_baiviet['product_name']?></h2>
            <div style="margin-bottom: 15px;" class="time">
            <p>Thời gian đăng bài:<?php echo $row_baiviet['time']?> </p>
            </div> 
            <!-- <img style="margin:auto; display:block;" width="50%" height="auto" src="uploads/<?php echo $row_baiviet['baiviet_image']?>" alt=""> -->
            <div class="content">
            <p style="margin-top: 50px;font-size :22px;"> <?php echo $row_baiviet['tomtat']?></p>
            <div class="video" style="display: flex; justify-content: center;">
                <?php echo  $row_baiviet['product_link'];?>
            </div>
            </div>
        </div>
    </div>
</div>