<?php
require'dbh.inc.php';
if(isset($_POST['assign'])){
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $mobile=$_POST['mobile'];
   $email=$_POST['email'];
   $role=$_POST['role'];
   $cdate=$_POST['cdate'];
   $ctime=$_POST['ctime'];
   $uname=$_POST['uname'];
   $pwd=$_POST['pwd'];
   $cpwd=$_POST['cpwd'];
   $cby=$_POST['id'];
$hash=password_hash($pwd, PASSWORD_DEFAULT);
   $location=$_POST['location'];
    $phone_count = strlen($mobile);
    $name_count = strlen($uname);
     $errorFname = false;
     $errorLname = false;
     $errorMobile = false;
     $errorEmail = false;
     $errorRole = false;
     $errorUname = false;
     $errorPwd = false;
     $errorCpwd = false;
     $errorLocation = false;
     $errorCount = false;
     $errorNcount = false;
     $errorMatch = false;
    if(empty($fname)){
      echo '<span class="text-danger">First Name field is Required</span><br>';
             $errorFname = true;  
    }
     elseif(empty($lname)){
      echo '<span class="text-danger">Last Name field is Required</span><br>';
             $errorLname = true;  
    }
    elseif(empty($mobile)){
      echo '<span class="text-danger">Enter Mobile Number</span><br>';
             $errorMobile = true;  
    }
    elseif($phone_count != 11 ){
echo '<span class="text-danger">Phone Number Must be 11 Characters</span><br>';
             $errorCount = true;
}
    elseif(empty($email)){
      echo '<span class="text-danger">Enter Email Address</span><br>';
             $errorEmail = true;  
    }
    elseif(empty($role)){
      echo '<span class="text-danger">Role field is Required</span><br>';
             $errorRole = true;  
    }
        elseif(empty($uname)){
      echo '<span class="text-danger">Enter Username</span><br>';
             $errorUname = true;  
    }
         elseif($name_count < 5){
      echo '<span class="text-danger">Username Must be greather than 5 Characters</span><br>';
             $errorNcount = true;  
    }
        
      elseif(empty($pwd)){
      echo '<span class="text-danger">Enter Password</span><br>';
             $errorPwd = true;  
    }
     elseif(empty($cpwd)){
      echo '<span class="text-danger">Confirm Password</span><br>';
             $errorCpwd = true;  
    }
    elseif(empty($location)){
      echo '<span class="text-danger">Location field is Required</span><br>';
             $errorLocation = true;  
    }
     
     elseif($pwd != $cpwd ){
echo '<span class="text-danger">Password do not match</span><br>';
             $errorMatch = true;
}else{
    $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`role`='$role',`uname`='$uname',`pwd`='$hash',`location`='$location' WHERE `id`='$cby'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo'<script>
                alert("User info has been Edited");
                </script>';
        echo '<script>
             window.location.href="user.php";
                </script>';       
    }
}
}
?>
<script>
var errorMobile = "<?php echo $errorMobile; ?>";
var errorUname = "<?php echo $errorUname ?>";
var errorFname = "<?php echo $errorFname; ?>";
var errorLname = "<?php echo $errorLname; ?>";
var errorEmail = "<?php echo $errorEmail; ?>";
var errorPwd = "<?php echo $errorPwd; ?>";
var errorCpwd= "<?php echo $errorCpwd; ?>";
var errorNcount= "<?php echo $errorNcount; ?>";
    if(errorMobile == true){
        $("#bio-mobile").addClass("input-danger");
    }
    if(errorUname == true){
        $("#bio-uname").addClass("input-danger");
    }
     if(errorNcount == true){
        $("#bio-uname").addClass("input-danger");
    }
       if(errorFname == true){
        $("#bio-fname").addClass("input-danger");
    }
           if(errorLname== true){
        $("#bio-lname").addClass("input-danger");
    }
           if(errorEmail == true){
        $("#bio-email").addClass("input-danger");
    }
           if(errorPwd == true){
        $("#bio-pwd").addClass("input-danger");
    }
           if(errorCpwd == true){
        $("#bio-Cpwd").addClass("input-danger");
    }
    
</script>