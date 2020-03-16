<?php
require'dbh.inc.php';
   if(isset($_POST['add_l'])){
    $loc=$_POST['location'];
    
     $sql1="SELECT  * FROM `location`";
    $result1=mysqli_query($conn, $sql1);
    $count=mysqli_num_rows($result1);
    $add=$count+1;
    
    $sql="INSERT INTO `location`(`location`, `cam_int`)VALUES('$loc', '$add')";
    $result=mysqli_query($conn, $sql);
    if($result){
       header("location:../location.php?location=added");
    }
}

   if(isset($_POST['camera'])){
    $loc=$_POST['loc'];
    $cam=$_POST['cam'];
    
    
    $sql="INSERT INTO `camera`(`camera`, `location`)VALUES('$cam', '$loc')";
    $result=mysqli_query($conn, $sql);
    if($result){
       header("location:../location.php?location=added");
    }
}
