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

?>

<link rel="stylesheet" href="css/lightbox.css">
<?php
       if(isset($_GET['search'])){
       $prefix=$_GET['input'];
       $loc=$_GET['location'];
         $time=$_GET['time'];
       $type=".mp4";
       $query = "SELECT * FROM `videos` WHERE `date` LIKE '%$prefix%' AND `name` LIKE '%$loc%'AND `name` LIKE '%$type%' AND `time` LIKE '%$time%' ORDER BY `id` ASC LIMIT $start_from, $record_per_page";
       $myquery=mysqli_query($conn, $query);
     $count =mysqli_num_rows($myquery); 
       }
          ?>
    <div class="video-content">
    <a href="blobsfolder.php"><img src="img/back.png" width="50px"></a>
  <p class="alert alert-info" style="padding:3px;">Total Number of searched video = <?=$count?></p>
  <?php
 while($rows=mysqli_fetch_assoc($myquery)){
    ?> 
  <div class="feeds text-center">
  <a href="javascript:void(0);" data-href="inc/feeds.php?id=<?=$rows['id']?>" class="openPopup read-more"><img src="img/video.jpg" width="80" height="80"></a>
  <p style="font-size:10px;"><b>Date: <?=$rows['date'];?><br> Time:<?=$rows['time'];?> </b></p>
</div>
      <?php } ?>
                   
                    <div class="modal fade lg-modal" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="modal-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.openPopup').on('click', function() {
                                var dataURL = $(this).attr('data-href');
                                $('.modal-body').load(dataURL, function() {
                                    $('#myModal').modal({
                                        show: true
                                    });
                                });
                            });
                        });
                    </script>
</div>

<div class='paginator'>
     <?php 
         $prefix=$_GET['input'];
       $loc=$_GET['location'];
     $type=".mp4";
    $query3 = "SELECT * FROM `videos` WHERE `date` LIKE '%$prefix%' AND `name` LIKE '%$loc%'AND `name` LIKE '%$type%'";
    $result3 = mysqli_query($conn, $query3);
   $total3 = mysqli_num_rows($result3);
    $total_page = ceil($total3/$record_per_page);
    for($i=1; $i<=1; $i++){
        echo '<a href="search_cctv?search&input='.$prefix.'&location='.$loc.'&page=1" class="btn btn-md pag-btn">'.$i.'</a>';
    }
    $px=$_GET['page'] + 1;
    echo'<a href="search_cctv?search&page='.$px.'&input='.$prefix.'&location='.$loc.'" class="btn btn-md pag-btn"><i class="fa fa-caret-right"></i></a>';
    ?>
</div>      
  <script>
    
    window.document.onkeydown = function(e) {
  if (!e) {
    e = event;
  }
  if (e.keyCode == 27) {
    lightbox_close();
  }
}

function lightbox_open() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  window.scrollTo(0, 0);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
  lightBoxVideo.play();
}

function lightbox_close() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  document.getElementById('light').style.display = 'none';
  document.getElementById('fade').style.display = 'none';
  lightBoxVideo.pause();
}
    </script>

</div>
            
      