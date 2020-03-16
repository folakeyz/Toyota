<?php
require'dbh.inc.php';
session_start();
session_unset();
session_destroy();

$time= date("h:i:a");
$stamp=$_GET['stamp'];
$sql="UPDATE `logs` SET `logout`='$time' WHERE `stamp`='$stamp'";
$result=mysqli_query($conn, $sql);
header("Location: ../index.php");