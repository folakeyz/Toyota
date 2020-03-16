<?php

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

?>
<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

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

<h6 style="margin-top:20px">Suspect List</h6><br /><br />
 <a class="btn btn-success" href="search.php" style="color:white">Search</a><hr>
  <table class="table table-striped table-bordered " style="width:50%">
    <thead>
       <!-- <th>ID</th> -->
        <th>Identifier</th>
		<th>Person of Interest</th>
       
    </thead> 
    <tbody>
	<?php
		
		foreach ($person['results'] as $rows) {  
			
	?>

        <tr>
            <!--<td><?php //echo $rows['id']; ?></td>-->
            <td><?php echo $rows['name']; ?></td>
			<!--<td><?php //echo $rows['sampleFace']['id']; ?></td>-->
			<!--<td><?php echo getcustomfacepicture($personmodelid,$rows['id'],$rows['sampleFace']['id']); ?></td> -->
			<td><img src="data:image/jpeg;base64, 
			<?php 
			
			$pict=getcustomfacepicture($personmodelid,$rows['id'],$rows['sampleFace']['id']);
			echo base64_encode($pict);
			
			?>
			"alt="Red dot" height="100" /></td>
        </tr>
<?php
}
?>
    </tbody> 
  </table>
  
    </div>
<?php
	include_once 'inc/footer.php';
?>




