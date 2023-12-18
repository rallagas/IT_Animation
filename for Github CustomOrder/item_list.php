<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-2"></div>
           <div class="col-8">
               <form action="item_list.php" method="get">
                  <div class="input-group mt-3">
                   <input type="text" name="searchItem" class="form-control" placeholder="Search" />
                    <input type="submit" class="btn btn-success" value="search">
                    </div>
                </form>
           </div>
           <div class="col-2"></div>
       </div>
       
       <div class="row">
           <div class="col-2"></div>
           <div class="col-8">
                <?php
                include_once("db.php"); //connect to the database

                if(isset($_GET['searchItem'])){
            
                $searchkey=$_GET['searchItem'];
                    
                $sql_item_list = "SELECT * FROM `items` WHERE `item_name` LIKE '%{$searchkey}%' "; //SQL for the items table

                $item_list_result = mysqli_query($conn,$sql_item_list);

                    if(mysqli_num_rows($item_list_result) > 0 ){
                        while($row = mysqli_fetch_assoc($item_list_result)){
                            echo $row['item_name'] . " - " . " Php " . $row['item_price'] . "<hr>";
                        }
                    }
                    else{
                        echo "Walang items.";
                    }
                }
                ?>
           </div>
           <div class="col-2"></div>
       </div>
   </div>
    
</body>
   <script src="js/bootstrap.js"></script>
</html>

