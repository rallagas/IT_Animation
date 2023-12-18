<?php include_once("db.php"); ?>
<html>
<head>
    <meta charset="UTF-16">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="my.css">
    <style>
/*
    #offcanvasNavbar{
            background-image:url("img/pizza1.jpeg");
        }  
#home-page{
    background-image:url("img/pizza2.png");
    background-clip: inherit;
    background-size: cover;
      background-attachment: fixed;
    background-blend-mode: normal;
    background-position: left;
}
*/
.user_btn_orange {
    color: orange;
}

    </style>
</head>
<body id="home-page">

<div class="container-fluid">

 <div class="row">
        <?php require("nav.php");?>
 </div>
<div class="row">
       
     
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "404"){ ?>
                    <div class="alert alert-danger">Invalid Username and Password</div>
                <?php }
            }
            
            if(isset($_GET['msg'])){
                if($_GET['msg'] == 'userregistered'){ ?>
                    <div class="alert alert-success">User Successfully Registered. You may login now.</div>
                <?php }
                else if($_GET['msg'] == 'notallowed'){ ?>
                    <div class="alert alert-warning">You are not allowed there.</div>
                <?php }
            }
            ?>
</div>
    
    <div class="row">
        <div class="col-md-8 col-lg-12">
                <?php
                        if(isset($_GET['searchkey'])){
                            $searchkey = htmlspecialchars($_GET['searchkey']);
                            
                            $sql_search = "SELECT *
                                             FROM `ingredients`
                                            WHERE ingredient_name LIKE '%{$searchkey}%'
                                               OR ingredient_description LIKE '%{$searchkey}%'"
                                ;
                            $search_result = mysqli_query($conn, $sql_search);
                            
                            if(mysqli_num_rows($search_result) < 1){
                                echo "No Results found.";
                            }
                            else{
                                while($row = mysqli_fetch_array($search_result)){
                                    echo $row['ingredient_name'] . " - " . $row['ingredient_description'] . "<hr>";
                                }
                            }
                        }
               ?>
        </div>
   
        <div class="col-md-4 col-lg-12">

            
        </div>
    </div>
</div>

</body>
    <script src="js/bootstrap.js"></script>
   </html>