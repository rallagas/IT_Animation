<?php include_once("../db.php"); 
session_start();
//echo $_SESSION['user_info'];
if(!isset($_SESSION['user_id'])){
  header("location: ../index.php?msg=no_user_found");   
}
else{
    $user_id = $_SESSION['user_id'];
}

//-------------------------------
//**Functions applicable only in this page.
function status_badge($status){
    $val = "";
    $color="";
    $ret = "";
    switch($status){
        case "P": $val="Pending"; $color="warning" ;break;
        case "D": $val="On the Way"; $color="primary" ;break;
        case "X": $val="Cancelled"; $color="danger" ;break;
        case "C": $val="Delivered"; $color="success" ;break;
    }
    
    $ret = "<span class='badge rounded-pill bg-".$color." float-end'>".$val."</span>";
    return $ret;
}
function gen_order_ref_number($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J'
                     ,'K','L','M','N','O','P','Q','R','S','T'
                     ,'U','V','W','X','Y','Z','0','1','2','3'
                     ,'4','5','6','7','8','9','0');
    $key="";
    for ($i = 1; $i <= $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,25)];
        }
        else{
             $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
        }
     }
    return $key;
}
//-------------------------------
?>
<html>
<head>
    <meta charset="UTF-16">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../my.css">
    <style>
    #offcanvasNavbar{
            background-image:url("../img/pizza1.jpeg");
        }  


    </style>
</head>
<body id="home-page">

<div class="container-fluid">

     <div class="row">
            <?php require("nav.php");?>
     </div>
     
     
     <div class="row">
         <div class="col-12">
            <?php if(isset($_GET['page'])){
               switch($_GET['page'])
               {
                   case 1: include_once "myop.php";
                       break;
                   case 2: include_once "bundle_deals.php";
                       break;
                   default:
               }
            }
            ?>
         </div>
     </div>


</div>

</body>
    <script src="../js/bootstrap.js"></script>
   </html>