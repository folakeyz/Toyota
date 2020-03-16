<?php
include'inc/head.php'; 
require'inc/dbh.inc.php'; 
?>
<div class="app mx-auto">
   <div class="left-app text-center">
    <!-- <img src="img/makefg.png">!-->
       <h2 class="text-center"><b>CCTV APPLICATION</b></h2>
   </div>
   <div class="right-app">
       <div class="top">
           <img src="img/toyota.jpg" class="float-right" style="width:50" height="50">
       </div>
       <div class="col-md-12 text-center">
           <img src="img/toyota.png" width="100" height="100"><hr>
           <h5 style="color:gray"><b>Hey, good to see you Again!</b></h5>
           <div class="col-md-12 mx-auto login first">
               
                <form method="post" action="inc/process.php" autocomplete="off">
           <?php
      if(isset($_GET['error'])){
          if($_GET['error'] == "emptyfields"){
              echo'<p class="alert alert-danger" style="padding:3px;font-size:11px;">All fieds are compulsory</p>';
          }elseif($_GET['error'] == "wrongpassword"){
              echo'<p class="alert alert-info" style="padding:3px;font-size:11px;">Incorrect Email/PAssword</p>';
          }elseif($_GET['error'] == "nouser"){
              echo'<p class="alert alert-warning" style="padding:3px;font-size:11px;">User does nto exist</p>';
          }elseif($_GET['error'] == "sqlerror"){
              echo'<p class="alert alert-danger" style="padding:3px;font-size:11px;">Something Went Wrong, Pls Try Again</p>';
          }
      }
      ?>
           <div class="form-group">
               <input type="text" name="uname"  placeholder="Username/Email" class="form-control">
           </div>
           <div class="form-group">
               <input type="password" name="pwd" placeholder="Enter Password" class="form-control">
           </div>
           <div class="form-group col-md-12">
            <button type="submit" class="btn fcmb-btn " name="login">Login&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
                  </div>
       </form>
          
           </div>

       </div>
   </div>
</div>
<?php
include'inc/footer.php'; 

?>