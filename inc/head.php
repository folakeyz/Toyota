<?php 
    session_start();
   // include'inc/dbh.inc.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toyota CCTV</title>
    <link rel="icon" href="img/toyota.png">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/fontawesome/css/all.css">
 <link rel="stylesheet" href="css/ty.css">
 <!--<link rel="stylesheet" href="css/fcmb.css">!-->
       <link rel="stylesheet" href="css/roboto.css">
       <link rel="stylesheet" href="css/josefin.css">
 <script src="js/jquery3.min.js"></script>
 <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
     <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ckeditor.js"></script>
        <script src="js/canvasjs.min.js"></script>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>
<?php
   $date=date("F, j, Y"); 
    
$old = "January, 12, 2020";
 if($date == $old){
  header("location:expired.php");
     } else{
 ?>
 
    <body onload="startTime()">


<?php    }  ?>

     
     




<script>
           function enforce_maxlength(event) {
  var t = event.target;
  if (t.hasAttribute('maxlength')) {
    t.value = t.value.slice(0, t.getAttribute('maxlength'));
  }
}
document.body.addEventListener('input', enforce_maxlength);
           </script>