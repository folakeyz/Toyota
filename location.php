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

<div class="video-content one">
    
<div class="col-md-6 float-left">
  <h6 class="alert alert-info text-center" style="padding:3px;font-size:11px;">Add State</h6>
  <form method="post" action="">
       <div class="form-group col-md-12">
       <select class="form-control" name="state" style="border:none;border-bottom:1px solid gainsboro;border-radius:0;font-size:12px;" required>
           <?php require'state.php';?>
           
       </select>
       
   </div> 
      <div class="form-group col-md-12">
     <input type="submit" class="btn btn-sm btn-info" name="state" value="Add State">  
   </div> 

  </form>
  
  
   <h6 class="alert alert-info text-center" style="padding:3px;font-size:11px;">Add a New Location</h6>
  <form method="post" action="inc/location.php">
       <div class="form-group col-md-12">
     <input type="text" class="form-control" name="location" placeholder="Enter Location" style="border:none;border-bottom:1px solid gainsboro;border-radius:0;font-size:12px;" required>  
   </div> 
      <div class="form-group col-md-12">
     <input type="submit" class="btn btn-sm btn-info" name="add_l" value="Add Location">  
   </div> 

  </form>
  
  
   <h6 class="alert alert-info text-center" style="padding:3px;font-size:11px;">Add a Camera to Location</h6>
  <form method="post" action="inc/location.php">
            <div class="form-group col-md-12">
     <select class="form-control" name="loc" placeholder="Enter Camera Name" style="border:none;border-bottom:1px solid gainsboro;border-radius:0;font-size:12px;" required>  
     <option value="">Select Branch</option>
     <?php
         $sql="SELECT  * FROM `location`";
         $result=mysqli_query($conn, $sql);
         while($row=mysqli_fetch_assoc($result)){
             
             ?>
                <option value="<?=$row['cam_int'];?>"><?=$row['location'];?></option>
             <?php
         }
         
         ?>
  

                </select>
   </div>
       <div class="form-group col-md-12">
     <input type="text" class="form-control" name="cam" placeholder="Enter Camera Name" style="border:none;border-bottom:1px solid gainsboro;border-radius:0;font-size:12px;" required>  
   </div> 
      <div class="form-group col-md-12">
     <input type="submit" class="btn btn-sm btn-primary" name="camera" value="Add Camera">  
   </div> 

  </form>
  
</div>






<div class="col-md-6 float-left">
   <h6 class="alert alert-primary" style="padding:3px;font-size:11px;">Available Location</h6>
     <?php
         $sql="SELECT  * FROM `location`";
         $result=mysqli_query($conn, $sql);
         while($row=mysqli_fetch_assoc($result)){
             
             ?>
                <p style="font-size:11px;"><?=$row['location'];?></p>
             <?php
         }
         
         ?>
</div>
</div>




<?php include'inc/footer.php'; ?>