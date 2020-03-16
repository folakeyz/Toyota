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
    
if(isset($_POST['login'])){
       $email = $_POST['uname'];
    $password = $_POST['pwd'];
    
    if(empty($email) || empty($password)){
      header("Location: ../index.php?error=emptyfields");
        exit();   
    }
    else{
        $sql = "SELECT * FROM users WHERE email=? OR uname=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../index.php?error=sqlerror");
        exit();   
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
             $pwdCheck = password_verify($password, $row['pwd']);  
                if($pwdCheck == false){
                     header("Location: ../index.php?error=wrongpassword");
        exit();  
                }
                else if($pwdCheck == true){
         $rand = rand(10000, 99999);
       $letter = "CCTV";
        $stamp = $letter.$rand;
                  session_start();
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['pix'] = $row['pix'];
                    $_SESSION['mobile'] = $row['mobile'];
                    $_SESSION['location'] = $row['location'];
                   $date=date("F, j, Y");
                   $time=date("h:i:a");
                    $_SESSION['stamp']=$stamp;
                    $uname=$row['uname'];
                    $mail=$row['email'];
                    $rol=$row['role'];
                    
                    $inst="INSERT INTO `logs` (`uname`,`email`, `role`,`login`,`date`,`stamp`)VALUES('$uname','$mail','$rol','$time','$date','$stamp')";
                    $stm=mysqli_query($conn, $inst);
                    
                    header("Location: ../dashboard.php?login=success");  
                    exit();
                }else{
                  header("Location: ../index.php?error=wrongpassword");  
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
        exit(); 
            }
        }
    }
}
else{
        header("Location: ../index.php?error=emptyfields");
        exit(); 
}
