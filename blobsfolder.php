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
$location = $_SESSION['location'];
$role = $_SESSION['role'];

?>
<link rel="stylesheet" href="css/lightbox.css">
<div class="video-content one">
      <?php
      if($role == "Admin"){
          $sql="SELECT  * FROM `location`";
         $result=mysqli_query($conn, $sql); 
      }else{
         $sql="SELECT  * FROM `location` WHERE `location`='$location'";
         $result=mysqli_query($conn, $sql);  
      }
        
         while($row=mysqli_fetch_assoc($result)){
             ?>
  <div class="feeds text-center">
  <a href="blobsubfolder.php?location=<?=$row['cam_int'];?>" class="abj"><img src="img/folder.png" width="80" height="80">
  </a>
  <p style="font-size:10px;"><?=$row['location'];?></p>

</div>
<?php } ?>

</div>
    

   <?php

include'inc/footer.php'; ?>



















