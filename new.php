<?php include'inc/head.php'; ?>
<div class="login-bg">
    <div class="contents">
       <div class="left">
           <div><img src="img/FCMB_Logo.png"></div>
           <br><br>
           <div class="text-center">
               <img src="img/top%20image.png" >
           </div>
           <h3 class="text-center">Hey, good to see you again!</h3>
           <p class="text-center">Login to get going</p>
           
           <div class="left-box">
               <form method="post" action="inc/reg.php">
          
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
               <input type="text" name="uname"  placeholder="Username">
           </div>
           <div class="form-group">
               <input type="text" name="fname" placeholder="Enter Name">
           </div>
               <div class="form-group">
               <input type="text" name="email" placeholder="Email">
           </div>
             <div class="form-group">
               <select class="form-control" name="role">
                   <option>Admin</option>
                   <option>User</option>
               </select>
           </div>
           <div class="form-group">
               <input type="password" name="pwd" placeholder="Enter Password">
               <input type="password" name="cpwd" placeholder="Enter Password2">
           </div>
           <div class="form-group col-md-12">
                      <input type="submit" name="reg" class="btn btn-primary">
                  </div>
       </form>
   </div>
                  
                 
                  
             
        
       </div>
        
       <div class="right">
           
       </div> 
    </div>
</div>