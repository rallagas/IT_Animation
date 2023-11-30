<?php include_once("../db.php"); 
session_start();
//echo $_SESSION['user_info'];
if(!isset($_SESSION['user_id'])){
  header("location: ../index.php?msg=no_user_found");   
} 


function get_total_sales_multi_order($conn){
    $sql_get_sales = "SELECT sum(i.price_amt * mo.order_qty) sales
                         FROM `multi_order` mo 
                         JOIN `ingredients` i 
                           ON mo.ingredient_id = i.ingredient_id 
                        ";
   $sales_result = mysqli_query($conn, $sql_get_sales);
   $row = mysqli_fetch_array($sales_result);

    return "Php ".number_format($row['sales'],2);
}

function get_total_sales_custom_order($conn){
    $sql_get_sales = "SELECT (sum(i1.price_amt) * sum(o.quantity)) +
                             (sum(i2.price_amt) * sum(o.quantity)) +
                             (sum(i3.price_amt) * sum(o.quantity)) +
                             (sum(i4.price_amt) * sum(o.quantity)) sales
                        FROM `orders` o
                        JOIN `ingredients` i1
                          ON (o.step1 = i1.ingredient_id)
                          
                        JOIN `ingredients` i2
                          ON (o.step2 = i2.ingredient_id)
                    
                        JOIN `ingredients` i3
                          ON (o.step3 = i3.ingredient_id)
                          
                        JOIN `ingredients` i4
                          ON (o.step4 = i4.ingredient_id)
                WHERE o.order_status = 'D'
                      ";
   $sales_result = mysqli_query($conn, $sql_get_sales);
   $row = mysqli_fetch_array($sales_result);

    return "Php ".number_format($row['sales'],2);
}


?>
<html>
<head>
    <meta charset="UTF-16">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../my.css">

</head>
<body id="home-page">
    <div class="container-fluid">
        <div class="row">
           <div class="col-1"></div>
            <div class="col-4">Sales <br>
            Multi Order : <?php echo get_total_sales_multi_order($conn); ?> <br>
            Custom Order : <?php echo get_total_sales_custom_order($conn); ?> <br>
            
            </div>
            <div class="col-3">Pending Orders</div>
            <div class="col-3">User Registered</div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 pt-5">
                <h3 class="display-5">Manage Orders (Multi Order)</h3>
                     <?php
                        if(isset($_GET['msg'])){
                            switch($_GET['msg']){
                                case 'y': echo "<span class='alert alert-success'>Update Successful</span>";
                                    break;
                                case 'n': echo "<span class='alert alert-danger'>Update was not successful.</span>";
                                    break;
                                default:
                            }
                        }
                    ?>
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-4">
                                  <h3>Pending</h3>
                                   <?php
                                     $sql_get_reference = "SELECT DISTINCT mo.order_reference_number
                                                                         , u.fullname
                                                                         , u.user_address
                                                                      from `multi_order` mo
                                                                      join `users` u
                                                                        on mo.user_id = u.user_id
                                                                     where mo.order_status = 'P' ";
                                     $reference_result = mysqli_query($conn, $sql_get_reference);
                                     
                                     while($row = mysqli_fetch_assoc($reference_result)){ //loop for the reference number
                                         
                                         $ord_ref_num = $row['order_reference_number'];
                                         $user = $row['fullname'];
                                         $address = $row['user_address'];
                                         
                                         echo "<em>".$ord_ref_num."</em> - <a>".$user."</a> <br>" ;
                                         echo "<small>".$address."</small>" ;
                                         $sql_get_ingredient = "SELECT i.ingredient_name
                                                                     , i.price_amt
                                                                     , i.ingredient_description
                                                                     , i.ingredient_img
                                                                  from `multi_order` mo
                                                                  JOIN `ingredients` i
                                                                    ON mo.ingredient_id = i.ingredient_id
                                                                 where mo.order_reference_number = '$ord_ref_num'";
                                         $ingredient_result = mysqli_query($conn,$sql_get_ingredient);
                                         
                                         echo "<ul>";
                                         while($ing = mysqli_fetch_assoc($ingredient_result)){
                                             echo "<li>" . $ing['ingredient_name'] . "(". $ing['price_amt'] .")" . "</li>";
                                         }
                                         echo "</ul>";  ?>
                                     <a href="update_order_status.php?update_order_status=D&order_reference_number=<?php echo $ord_ref_num;?>" class="btn btn-success btn-sm">Delivered</a>
                                     <a href="update_order_status.php?update_order_status=X&order_reference_number=<?php echo $ord_ref_num;?>" class="btn btn-danger btn-sm">Cancel</a> <hr>
                                     <?php } //end loop for the reference number
                                     ?>
                
                              </div>
                              <div class="col-4">
                                 <h3>Delivered</h3>
                                  <?php
                                     $sql_get_reference = "SELECT DISTINCT `order_reference_number` from `multi_order` where order_status = 'D' ";
                                     $reference_result = mysqli_query($conn, $sql_get_reference);
                                     
                                     while($row = mysqli_fetch_assoc($reference_result)){ //loop for the reference number
                                         
                                         $ord_ref_num = $row['order_reference_number'];
                                         echo "<em>".$ord_ref_num."</em>" . "<br>";
                                         $sql_get_ingredient = "SELECT i.ingredient_name
                                                                     , i.price_amt
                                                                     , i.ingredient_description
                                                                     , i.ingredient_img
                                                                  from `multi_order` mo
                                                                  JOIN `ingredients` i
                                                                    ON mo.ingredient_id = i.ingredient_id
                                                                 where mo.order_reference_number = '$ord_ref_num'";
                                         $ingredient_result = mysqli_query($conn,$sql_get_ingredient);
                                         
                                         echo "<ul>";
                                         while($ing = mysqli_fetch_assoc($ingredient_result)){
                                             echo "<li>" . $ing['ingredient_name'] . "(". $ing['price_amt'] .")" . "</li>";
                                         }
                                         echo "</ul>";
                                         
                                     } //end loop for the reference number
                                     ?>
                                  
                              </div>
                               <div class="col-4">
                                 <h3>Cancelled</h3>
                                  <?php
                                     $sql_get_reference = "SELECT DISTINCT `order_reference_number` from `multi_order` where order_status = 'X' ";
                                     $reference_result = mysqli_query($conn, $sql_get_reference);
                                     
                                     while($row = mysqli_fetch_assoc($reference_result)){ //loop for the reference number
                                         
                                         $ord_ref_num = $row['order_reference_number'];
                                         echo "<em>".$ord_ref_num."</em>" . "<br>";
                                         $sql_get_ingredient = "SELECT i.ingredient_name
                                                                     , i.price_amt
                                                                     , i.ingredient_description
                                                                     , i.ingredient_img
                                                                  from `multi_order` mo
                                                                  JOIN `ingredients` i
                                                                    ON mo.ingredient_id = i.ingredient_id
                                                                 where mo.order_reference_number = '$ord_ref_num'";
                                         $ingredient_result = mysqli_query($conn,$sql_get_ingredient);
                                         
                                         echo "<ul>";
                                         while($ing = mysqli_fetch_assoc($ingredient_result)){
                                             echo "<li>" . $ing['ingredient_name'] . "(". $ing['price_amt'] .")" . "</li>";
                                         }
                                         echo "</ul>";
                                         
                                     } //end loop for the reference number
                                     ?>
                                  
                              </div>
                          </div>
                      </div>
                      
               
            </div>
            <div class="col-1"></div>
        </div>
    </div>

</body>
    <script src="../js/bootstrap.js"></script>
   </html>