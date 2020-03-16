<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 
include_once 'test.php';

/**if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$faceid=$_REQUEST['faceid'];
	if ($faceid==""){
		$faceid="Yamariat";
	}else{
		$faceid=$faceid;
	}**/
$personmodelid="35acbf53-f7ac-4a91-bd1b-f5e1e0acc03c";
$person=json_decode(getpersons($personmodelid),true);
$video=$_REQUEST['video'];
$token=$_REQUEST['token'];
?>

<div class="video-content one">
<!--<div style="width:100%;height: 100px;">
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group col-md-12">
        <div class="col-md-4 float-left">
         <input type="text" class="form-control" placeholder="Enter Face ID" name="faceid">   
        </div>
             <div class="col-md-4 float-left">
         <input type="submit" class="btn btn-sm btn-info form-control" placeholder="Enter Face ID" value="Find">   
        </div>
    </div>
</form> 
</div> -->
<h4 style="margin-top:20px">Video Player</h4><br /><br />
<iframe width="560" height="315" src="<?php echo getvideoplayerwidget($video,$token) ?>" frameborder="0" allowfullscreen style="display:inline-block; vertical-align:top;"></iframe>
<iframe width="600" height="350" src="<?php echo getvideoinsightswidget($video,$token) ?>" frameborder="0" allowfullscreen style="display:inline-block; vertical-align:top;"></iframe>
<script src="https://breakdown.blob.core.windows.net/public/vb.widgets.mediator.js"></script>
  
  
    </div>
<?php
	include_once 'inc/footer.php';
?>




