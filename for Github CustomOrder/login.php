<?php
include_once("db.php");
session_start();

if(isset($_POST['uname']) && isset($_POST['pword'])){
    $user_name = $_POST['uname'];
    $pass_word = $_POST['pword'];
   
    $sql_get_user_data = "SELECT * FROM `users` 
                           WHERE `username`='$user_name'
                             AND `password`='$pass_word'";
    $user_result = mysqli_query($conn, $sql_get_user_data);
    
    if (mysqli_num_rows($user_result) > 0) { //test if there is a result
      while($row = mysqli_fetch_assoc($user_result)) {
          
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_type'] = $row['user_type'];
                $_SESSION['user_info'] = $row['user_id'];
        $_SESSION['user_global_info'] = array('username'=>$row['username']
                                              ,'fullname'=>$row['fullname']
                                              ,'user_type'=>$row['user_type']
                                              ,'user_status'=>$row['status']
                                             );
            if($row['user_type'] == 'A') 
            {
                header("location: admin/");
                die();
            }
            else if ($row['user_type'] == 'U') 
            {
                header("location: users/");
            }
            else {
                header("location: index.php");
            }
      }
    } else {
      header("location: index.php?error=404");
    }
}
else{
    header("location: index.php?msg=notallowed");
}
?>