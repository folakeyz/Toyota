<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

$date = date("F, j, Y");
$time = date("h:i:a");
?>
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery.dataTables.min.js"></script>
<div class="user">
 <div class="col-md-12">
         <div class="col-md-4 mx-auto">
         <h6 class="alert alert-warning text-center" style="padding:3px;">Audit Trail</h6>
     </div>
          <table id="myTable" class="display cell-border" style="font-size:11px;">
              <thead>
                  <th style="width:15%">S/N</th>
                  <th style="width:15%">Username</th>
                  <th style="width:15%">Email</th>   
                  <th style="width:15%">Date</th>   
                  <th style="width:15%">Login Time</th>   
                  <th style="width:15%">Logout TIme</th>   
                
              </thead>
              <tbody>
                       <?php
                  $n=1;
                  $videos=".mp4";
                  $sql="SELECT * FROM `logs`";
                  $result=mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                     <tr>
                      <td><?=$n;?></td>
                      <td><?=$row['uname'];?></td>
                      <td><?=$row['email'];?></td>
                      <td><?=$row['date'];?></td>
                      <td><?=$row['login'];?></td>
                      <td><?=$row['logout'];?></td>
                     
                      <?php $n++; }  ?>
                  </tr>
              </tbody>
          </table>
          <script>
           $(document).ready( function () {
    $('#myTable').DataTable();
                
} );
           </script>
      </div>
</div>