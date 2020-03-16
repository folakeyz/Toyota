<?php
if(!$_SESSION['uname']){
   header("location:index");
}

?>
  <div class="portal-content">
    <div class="lagoon-nav blue">
        <div class="profile-img">
            <div class="pix-circle mx-auto">
                <div class="pix-img">
                    <img src="img/toyota.png">
                </div>
        <p><b>Welcome <?=$_SESSION['uname'];?></b>!</p>
                
            </div>
        </div>
        <div class="dev-links">
            <ul>
                <li><a href="dashboard.php">
         <i class="fa fa-desktop"></i>
          &nbsp;&nbsp;Dashboard
      </a> </li>
        <li> <a href="blobsfolder.php">
         <i class="fa fa-camera"></i>
          &nbsp;&nbsp;CCTV
      </a></li>

              <?php
        $type="Admin";
        if($_SESSION['role'] == $type){
            ?>  <li>
             
       
        <a href="user.php">
         <i class="fa fa-users"></i>
          &nbsp;&nbsp;User
      </a></li> <?php
        }
        ?>
                
 <?php
        if($_SESSION['role']== $type){
            ?>
                <li>
                     <a href="location.php">
         <i class="fa fa-map-marker"></i>
          &nbsp;&nbsp;Add Location
      </a>
                </li>
                          <?php
        }
        ?>
                   <?php
        $type="Admin";
        if($_SESSION['role'] == $type){
            ?>  <li>
             
       
        <a href="listperson.php">
         <i class="fa fa-search"></i>
          &nbsp;&nbsp;Facial Recongition
      </a></li> <?php
        }
        ?>
               
               <?php
        if($_SESSION['role']== $type){
            ?>
               
                <li><a href="audit.php">
         <i class="fa fa-clipboard"></i>
          &nbsp;&nbsp;Audit trail
      </a></li>
                <?php
        }
        ?>
                 <li>   <a href="inc/signoff.php?stamp=<?=$_SESSION['stamp'];?>">
         <i class="fa fa-power-off"></i>
          &nbsp;&nbsp;Log-Out
      </a></li>
                
                
                
            </ul>
        </div>
    </div>
      <div class="azure-content">
      <div class="content-nav">
         <div class="c-left">
<!--            <img src="img/firstbank3.png" alt="FCMB Logo">-->
            <p><b><?=date("F, j, Y");?></b></p> 
            <b id="txt"><p></p></b>
         </div>
        
      </div> 