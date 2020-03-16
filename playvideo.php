<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

if(isset($_GET['id']) && $_GET['hash']){


    $id=$_GET['id'];
 $sql = "SELECT * FROM `videos` WHERE `id`='$id'";
$result=mysqli_query($conn, $sql);
$fetch=mysqli_fetch_assoc($result);
 
?>

<link rel="stylesheet" href="css/lightbox.css">
<div class="video-content one" style="padding-right:100px;">
<a href="blobsfolder.php"><img src="img/back.png" width="50"> Go Back</a><a class="btn btn-sm btn-success float-right" href="<?=$fetch['url']?>" download style="color:white">Download Video</a>

<div class="col-8 mx-auto" style="padding-top:50px;">
 <br><br>
  <video autoplay loop controls style="width:100%;">
<source src="<?=$fetch['url']?>" type="video/mp4">
</video>

</div>

</div>


  
  

  
   <?php 
}else{
       echo'<script type="text/javascript">
window.location.href = "blobsfolder";
</script>';
      
    }
    
    
    
    
    include'inc/footer.php'; ?>