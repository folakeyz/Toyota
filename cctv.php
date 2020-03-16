<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 
if(isset($_GET["location"]) && $_GET["feed"]){
    
    $location=$_GET["location"];
    $tim="SELECT * FROM `location` WHERE `cam_int`='$location'";
    $timresult=mysqli_query($conn, $tim);
    $timvideo=mysqli_fetch_assoc($timresult);
    $tims=$timvideo['location'];
    $location=$tims;
    
    
    $feed=$_GET["feed"];
    $nxt=$_GET["location"];
    
    $dxn="fbn-cctv";
    $hash=password_hash($dxn, PASSWORD_DEFAULT);
    
}else{
   header("location:blobsfolder.php");
}

$record_per_page = 35;
$page = '';
if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}
$start_from = ($page-1)*$record_per_page;
  $sql = "SELECT * FROM `videos` WHERE `name` LIKE '%$location%' AND `name` LIKE '%$feed%'  ORDER BY `id` ASC LIMIT $start_from, $record_per_page";
$result=mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);


?>
<link rel="stylesheet" href="css/lightbox.css">
  
<div class="video-content">
   <div class="sorting">
    
       <form method="get" action="search_cctv.php" autocomplete="off">
           <div class="container">
                  <small class="float-right"><b><?=$location;?>&nbsp;&nbsp;<i class="fa fa-caret-right">&nbsp;&nbsp;</i><?=$feed;?></b></small>
                   <small>Search by Date</small><hr>
               <div class="row">
              
                   <div class="form-group col-md-3">
                       <input type="text" name="input" placeholder="YYYY-MM-DD" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY-MM-DD"/ class="form-control">
                       <input type="hidden" name="location" value="<?=$_GET['feed'];?>">
                       <input type="hidden" name="page" value="1">
                       </div>
                       <div class="form-group col-md-3">
                       <input type="text" name="time" placeholder="Enter Time" class="form-control" >
                       
                       </div>
                       <div class="form-group col-md-3">
                       <button type="submit" name="search"  class="form-control btn btn-fcmb">Search</button>
                     
                   </div>  
              
               </div>
           </div>
           
       </form>
   </div>
  <hr>
  <?php
    if($count == 0){
    echo '<div class="col-md-3"><h6 class="alert alert-info" style="padding:3px;">No Videos Available  in this Folder</h6></div>';
   echo'<script type="text/javascript">
window.location.href = "blobsfolder.php";
</script>';
}
 while($row=mysqli_fetch_assoc($result)){
    ?>
 <div class="feeds text-center">
  <a href="playvideo.php?id=<?=$row['id']?>&hash=<?=$hash?>"><img src="img/video.jpg" width="80" height="80"></a>
  <p style="font-size:10px;"><b>Date: <?=$row['date'];?><br> Time:<?=$row['time'];?> </b></p>
</div>
   
                   
                   
   <?php } ?>


</div>
<div class="paginator">
     <?php 
        
    $query2 = "SELECT * FROM `videos` WHERE `name` LIKE '%$location%' AND `name` LIKE '%$feed%'  ORDER BY `id`";
    $result2 = mysqli_query($conn, $query2);
   $total = mysqli_num_rows($result2);
    $total_page = ceil($total/$record_per_page);
    for($i=1; $i<=3; $i++){
        echo '<a href="cctv.php?page='.$i.'&location='.$nxt.'&feed='.$feed.'" class="btn btn-md pag-btn">'.$i.'</a>';
    }
    $px=$_GET['page'] + 1;
    echo'<a href="cctv.php?page='.$px.'&location='.$nxt.'&feed='.$feed.'" class="btn btn-md pag-btn"><i class="fa fa-caret-right"></i></a>';
    ?>
</div>
 <?php  

include'inc/footer.php'; ?>



















