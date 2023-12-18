<?php
require_once "../db.php";
session_start();

    //**Once the order form gets submitted it gets process in this part.**//
    if(isset($_GET['process_order'])){
        if(isset($_SESSION['user_id']) ){
            $step_1 = $_GET['step1'];
            $step_2 = $_GET['step2'];
            $step_3 = $_GET['step3'];
            $step_4 = $_GET['step4'];
            
            $user_id = $_SESSION['user_id'];
            $qty = $_GET['order_qty'];
            
               
                    $sql_get_breakdown = "SELECT `ingredient_name`, `price_amt` FROM `ingredients` 
                               WHERE `ingredient_id` in ('$step_1','$step_2','$step_3','$step_4')";
        

            $sql_result = mysqli_query($conn, $sql_get_breakdown);

            $total = 0.00; 
    ?>
  <div class="row justify-content-center">
                   <div class="col-4 border border-1">
                   <strong>Order Summary</strong> <hr>
            <?php if(mysqli_num_rows($sql_result) > 0){ 
                while($r = mysqli_fetch_assoc($sql_result)){
                    echo $r['ingredient_name'] . " = " . $r['price_amt'] . "<br>";
                    $total = $total + $r['price_amt'];
                }
                echo "Quantity: " . $qty . " pcs<br>";
                echo "<hr>";
                echo "Total Amount to pay: Php " .  number_format($total * $qty,2); ?>
                  <br>
            <a href="?check_out=1&step1=<?php echo $step_1;?>&step2=<?php echo $step_2;?>&step3=<?php echo $step_3;?>&step4=<?php echo $step_4;?>&u_id=<?php echo $_SESSION['user_id'];?>&qty=<?php echo $qty;?>" class="btn btn-success">Check Out</a>
              
            <?php 
            }

            ?>
            </div>
                </div>
            <?php
        }

       
    }




 if(isset($_GET['check_out'])){
                $step1 = $_GET['step1'];
                $step2 = $_GET['step2'];
                $step3 = $_GET['step3'];
                $step4 = $_GET['step4'];
            
                $user_id = $_GET['u_id'];
                $qty = $_GET['qty'];
            
                $sql_insert_order = "INSERT INTO `orders` (`step1`,`step2`,`step3`,`step4`,`user_id`,`quantity`)
                             VALUES ('$step1','$step2','$step3','$step4','$user_id','$qty')";
                
                

             mysqli_query($conn, $sql_insert_order);
         //   unset($_SESSION['process_order']);
            header("location:index.php?page=1&order=successful");
            die();
}
    //**End-of-Order_processing