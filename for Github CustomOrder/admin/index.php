<?php include_once("../db.php"); 
session_start();
echo $_SESSION['user_info'];
if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type'])){
  header("location: ../index.php?msg=no_user_found");   
}
else{
    if($_SESSION['user_type'] != 'A'){
        header("location: ../index.php?msg=not_an_admin");   
    }
}

//-------------------------------
//**Functions applicable only in this page.

//-------------------------------
?>
<html>
<head>
    <meta charset="UTF-16">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../my.css">

</head>
<body id="home-page">
<?php include "nav.php"; ?>
   
  
    <?php if(isset($_GET['page'])){
       switch($_GET['page'])
       {
           case 1: include_once "manage_ingredients.php";
               break;
           case 2: include_once "manage_orders.php";
               break;
       }
        
    }
    ?>




</body>
    <script src="../js/bootstrap.js"></script>
   </html>