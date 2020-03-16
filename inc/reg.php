<?php
require'dbh.inc.php';
    if(isset($_POST['reg'])){
        $fname = $_POST['uname'];
        $email = $_POST['email'];
        $name = $_POST['fname'];
        $pwd = $_POST['pwd'];
        $role= $_POST['role'];
        $cpwd = $_POST['cpwd'];
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        
        if($pwd != $cpwd){
            echo'<script>
            alert("Password do not match");
            </script>';
        }else{
            
            $sql="INSERT INTO `users` (`uname`, `fname`, `email`,`pwd`,`role`)VALUES('$fname', '$name', '$email', '$hash','$role')";
            $result=mysqli_query($conn, $sql);
            if($result){
             echo'<script>
            alert("User has been added");
            </script>';
            }else{
                echo'<script>
            alert("Something went wrong");</script>';
            }
        }
    }