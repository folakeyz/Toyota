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
         <h6 class="alert alert-primary text-center" style="padding:3px;">Thumbnails in Storage Blob</h6>
         </div>
          <table id="myTable" class="display cell-border" style="font-size:11px;">
              <thead>
                  <th style="width:5%">S/N</th>
                  <th style="width:35%">Name</th>
                  <th style="width:60%">Url</th>  
                
              </thead>
              <tbody>
                       <?php
                  $n=1;
                  $videos=".jpg";
                  $sql="SELECT * FROM `videos` WHERE `name` LIKE '%$videos%'";
                  $result=mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                     <tr>
                      <td><?=$n;?></td>
                      <td><?=$row['name'];?></td>
                      <td><?=$row['url'];?></td>
                     
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