<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

$record_per_page = 50;
$page = '';
if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}
$start_from = ($page-1)*$record_per_page;

 $location=$_GET['location'];
?>
<link rel="stylesheet" href="css/lightbox.css">
<div class="video-content one">
<?php
   
         $sql2="SELECT  * FROM `location` WHERE `cam_int`='$location'";
         $result2=mysqli_query($conn, $sql2);
    $name=mysqli_fetch_assoc($result2);
    
    ?>
<a href="blobsfolder.php"><img src="img/back.png" width="50"> Home&nbsp;&nbsp;<i class="fa fa-chevron-right">&nbsp;&nbsp;</i><?=$name['location'];?></a>

    
<hr><br>
      <?php
   
         $sql="SELECT  * FROM `camera` WHERE `location`='$location'";
         $result=mysqli_query($conn, $sql);
         while($row=mysqli_fetch_assoc($result)){
             ?>
  <div class="feeds text-center">
<a href="cctv.php?page=1&location=<?=$location;?>&feed=<?=$row['camera'];?>"><img src="img/folder.png" width="80" height="80">
  </a>
  <p style="font-size:10px;"><?=$row['camera'];?></p>

</div>
<?php } ?>




   <?php include'inc/footer.php'; ?>