<?php
include_once("db.php");

if(isset($_POST['fullname'])){
    $fullname=$_POST['fullname'];
    $uname=$_POST['username'];
    $pword1=$_POST['password'];
    $pword2=$_POST['conf_password'];
    
    if($pword1 != $pword2){
        header("location: registration.php?error=pwdmismatch");
    }
    
    $sql_check_user = "SELECT * from `users` 
                        WHERE `username`='$uname'
                           OR `fullname`='$fullname'";
    $user_result = mysqli_query($conn,$sql_check_user);
    
    if(mysqli_num_rows($user_result) > 0){
        header("location: registration.php?error=alreadyexisting");
    }
    else{
        $sql_insert_user="INSERT INTO `users` 
                          (`username`,`password`,`fullname`)
                          VALUES
                          ('$uname','$pword1','$fullname')";
        mysqli_query($conn,$sql_insert_user);
        header("location: index.php?msg=userregistered");
    }
    
}

?>