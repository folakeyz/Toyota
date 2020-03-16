<?php
include'inc/dbh.inc.php';
    $check="SELECT * FROM `videos`";
    $chkresult=mysqli_query($conn, $check);
    $row=mysqli_num_rows($chkresult);
    
if(isset($_POST['sub'])){
       
    $name= $_POST["name"];
    $url = $_POST["url"];   
    $date = $_POST["date"];  
    $content = $_POST["content"];  
    $count = $_POST["count"];  
    $time = $_POST["time"];  
   $count;
    

    if($count > $row){
      $sql1 = "TRUNCATE TABLE `videos`";	
	$result1 = mysqli_query($conn,$sql1);  
     foreach ( $name as $idx => $val ) {
    $all_array[] = [ $val, $url[$idx], $date[$idx], $content[$idx], $time[$idx]];
        
    $vname = $name[$idx];
    $vurl = $url[$idx];
    $vdate = $date[$idx];
    $vcontent = $content[$idx];
    $vtime = $time[$idx];
   
$sql="INSERT INTO `videos` (`name`,`url`,`date`,`content`,`time`)VALUES('$vname','$vurl','$vdate','$vcontent','$vtime')";
$result = mysqli_query($conn, $sql);  
         if($result){
             header("location:dashboard.php");
         }
        
        
    }
    }else{
       foreach ( $name as $idx => $val ) {
    $all_array[] = [ $val, $url[$idx], $date[$idx], $content[$idx], $time[$idx]];
        
    $vname = $name[$idx];
    $vurl = $url[$idx];
    $vdate = $date[$idx];
    $vcontent = $content[$idx];
    $vtime = $time[$idx];
           
    $sql="UPDATE `videos` SET `name`='$vname', `url`='$vurl',`date`='$vdate',`content`='$vcontent', `time`='$vtime'";
    $result = mysqli_query($conn, $sql);   
            if($result){
             header("location:dashboard.php");
         }
     }
     
   
  
}
 
      

     
}
