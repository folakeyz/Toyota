<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 
include_once 'test.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$faceid=$_REQUEST['faceid'];
	if ($faceid==""){
		$faceid="Yamariat";
	}else{
		$faceid=$faceid;
	}
 $res=json_decode(searchvideo($faceid), true);

?>


       <div class="video-content one">
<div style="width:100%;height: 100px;">
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
</div>

  <table class="table table-striped table-bordered ">
    <thead>
        <th>Videos</th>
        <th>Play Video</th>
       
    </thead> 
    <tbody>
	<?php
		
		foreach ($res['results'] as $rows) {  
			$gvtoken=getvideoaccesstoken($rows['id']);
			//echo $gvtoken;
			//echo getvideoplayerwidget($rows['id'],$gvtoken)."\n\n";
			//echo getvideoinsightswidget($rows['id'],$gvtoken);
			$data=base64_decode(getvideothumbnail($rows['id'],$rows['thumbnailId']));
						
			$im = imagecreatefromstring($data);

			$img_file='images/'.$rows['thumbnailId'].'.jpg';

			if ($im !== false) {
			   // header('Content-Type: image/jpg');
				imagejpeg($im,$img_file,100);
				imagedestroy($im);
			}
			else {
				echo 'An error occurred.';
			}
			
					
						//echo $rows['accountId']."\n";
						//echo $rows['id'];
	?>

        <tr>
            <td><img src="<?php echo $img_file; ?>"></td>
            <!--<td><a href="<?php //echo getvideoplayerwidget($rows['id'],$gvtoken); ?>" target="_blank" class="btn btn-sm btn-info">Play Video</a></td> -->
			<td><a href="AI-video.php?video=<?php echo $rows['id'].'&token='.trim($gvtoken,'"'); ?>" target="_blank" class="btn btn-sm btn-info">Play Video</a></td>
        
        </tr>
<?php
}
?>
    </tbody> 
  </table>
  
    </div>

<?php 
}else{?>

       <div class="video-content one">
<div style="width:100%;height: 100px;">
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
</div>

  <table class="table table-striped table-bordered ">
    <thead>
        <th>Videos</th>
        <th>View</th>
       
    </thead> 
    <tbody>
        <tr>
            <td></td>
            <td><a href="" class="btn btn-sm btn-info">View</a></td>
        
        </tr>
    </tbody> 
  </table>
  
    </div>
<?php 

	include_once 'inc/footer.php';

 ?>
	
	
<?php
}
?>


