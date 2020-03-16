<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

$date = date("F, j, Y");
$time = date("h:i:a");
?>
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery.dataTables.min.js"></script>
<div class="muser">
   <div class="row">
      <div class="col-md-6">
      <h6 class="alert alert-warning text-center" style="padding:3px">Add a New User</h6>
            <p class="upload-info" style="font-size:11px;">
           </p>
      <form method="post" action="inc/user.php" enctype="multipart/form-data" autocomplete="off">
      <div class="container">
      <div class="row">
        <div class="form-group col-md-6">
                <label>First Name</label>
           <input type="text" name="fname" class="form-control" placeholder="First Name" id="bio-fname">
       </div>   
        <div class="form-group col-md-6">
                <label>Last Name</label>
           <input type="text" name="lname" class="form-control" placeholder="Last Name" id="bio-lname">
       </div>   
          <div class="form-group col-md-6">
                <label>Mobile Number</label>
           <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" id="bio-mobile" maxlength="11">
       </div>
           <div class="form-group col-md-6">
                 <label>Email</label>
           <input type="email" name="email" class="form-control" placeholder="Email Address" id="bio-email">
       </div> 
       <div class="form-group col-md-6">
                <label>User Role</label>
           <select class="form-control" name="role" id="bio-role" style="font-size:11px;">
               <option value="">Select User Role</option>
               <option value="Admin">Admin</option>
               <option value="User">User</option>
           </select>
            <input type="hidden" name="cdate" class="form-control" value="<?=$date;?>" id="bio-cdate">
           <input type="hidden" name="ctime" class="form-control" value="<?=$time;?>" id="bio-ctime">
           <input type="hidden" name="cby" class="form-control" value="<?=$_SESSION['uname'];?>" id="bio-cby">
       </div>
        <div class="form-group col-md-6">
          <label>Username</label>
           <input type="text" name="uname" class="form-control" placeholder="Username" id="bio-uname">
       </div>
        <div class="form-group col-md-6">
          <label>Password</label>
           <input type="password" name="pwd" class="form-control" placeholder="Password" id="bio-pwd">
       </div>  
         <div class="form-group col-md-6">
          <label>Confirm Password</label>
           <input type="password" name="cpwd" class="form-control" placeholder="Confirm Password" id="bio-cpwd">
       </div>   
       <div class="form-group col-md-6">
         <label>Location</label>
      <select class="form-control" name="location" id="bio-location" style="font-size:11px;">
               <option value="">Select User Location</option>
                   <?php
         $sql="SELECT  * FROM `location`";
         $result=mysqli_query($conn, $sql);
         while($row=mysqli_fetch_assoc($result)){
             
             ?>
                <option value="<?=$row['location'];?>"><?=$row['location'];?></option>
             <?php
         }
         
         ?>
  
           </select>
       </div>  
        <div class="form-group col-md-6">
         <hr>
          <input type="submit" name="assign" class="btn btn-warning btn-sm btn-block" value="Add User" id="bio-assign">
       </div>      
      </div>
      </div>
      </form>
      </div>
      
       <div class="col-md-6 table-responsive">
          <table id="myTable" class="display" style="font-size:11px;width:100%">
              <thead>
              
                  <th>S/N</th>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Created By</th>
                  <th>Date Created</th>
                <th>Edit</th>
                  <th>Delete</th>
                
              </thead>
              <tbody>
               
                  
                       <?php
                  $n=1;
                  $sql="SELECT * FROM `users`";
                  $result=mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                     <tr>
                      <td><?=$n;?></td>
                      <td><?=$row['uname'];?></td>
                      <td><?=$row['fname'];?></td>
                      <td><?=$row['lname'];?></td>
                      <td><?=$row['email'];?></td>
                      <td><?=$row['role'];?></td>
                      <td><?=$row['createdby'];?></td>
                      <td><?=$row['created'];?></td>
                      <td><a href="edituser.php?edit=<?=$row['id'];?>" class="btn btn-sm btn-primary" style="font-size:11px"><i class="fa fa-edit"></i></a></td>
                       <td> <a href="inc/user.php?delete=<?=$row['id'];?>" class="btn btn-sm btn-danger" style="font-size:11px"><i class="fa fa-trash"></i></a></td>
                      
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
    
</div>
   <script>
             $(document).ready(function() {
                 $("form").submit(function(event){
                    event.preventDefault();
                     var fname = $("#bio-fname").val();
                     var lname = $("#bio-lname").val();
                     var mobile = $("#bio-mobile").val();
                     var email = $("#bio-email").val();
                     var role = $("#bio-role").val();
                     var cdate = $("#bio-cdate").val();
                     var ctime = $("#bio-ctime").val();
                     var uname = $("#bio-uname").val();
                     var pwd = $("#bio-pwd").val();
                     var cpwd = $("#bio-cpwd").val();
                     var cby = $("#bio-cby").val();
                     var location = $("#bio-location").val();
                     var assign = $("#bio-assign").val();
                     $(".upload-info").load("inc/user.php", {
                         fname: fname,
                         lname: lname,
                         mobile: mobile,
                         email: email,
                         role: role,
                         cdate: cdate,
                         ctime: ctime,
                         uname: uname,
                         pwd: pwd,
                         cpwd: cpwd,
                         cby: cby,
                         location: location,
                         assign: assign
                     });
                 }); 
              });
            </script>




   <?php
include'inc/footer.php'; ?>