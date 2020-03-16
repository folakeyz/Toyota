<?php
include_once"dbh.inc.php";

$record_per_page = 50;
$page = '';
if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}
    $id=$_GET["id"];
$start_from = ($page-1)*$record_per_page;
  $sql = "SELECT * FROM `videos` WHERE `id`='$id'";
$result=mysqli_query($conn, $sql);
$fetch=mysqli_fetch_assoc($result);
echo '<video autoplay loop controls>
<source src="'.$fetch['url'].'" type="video/mp4">
'.$fetch['name'].'</video>';
