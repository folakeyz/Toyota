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
    $location=$_GET["location"];
    $feed=$_GET["feed"];
$start_from = ($page-1)*$record_per_page;
  $sql = "SELECT * FROM `videos` WHERE `name` LIKE '%$location%' AND `name` LIKE '%$feed%'  ORDER BY `id` ASC LIMIT $start_from, $record_per_page";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
?>
     
     
     <div class="feeds text-center">
  <a href="javascript:void(0);" data-href="inc/feeds.php?id=<?=$row['id']?>" class="openPopup read-more"><img src="img/video.jpg" width="80" height="80"></a>
  <p style="font-size:10px;"><?=$row['name'];?><br><b>Date: <?=$row['date'];?></b></p>
</div>
    <?php }              
    ?>
                   
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