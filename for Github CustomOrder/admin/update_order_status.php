<?php
include_once ("../db.php");

if(isset($_GET['update_order_status']) && isset($_GET['order_reference_number'])){
    $new_order_status = htmlspecialchars($_GET['update_order_status']);
    $ord_ref_num = htmlspecialchars($_GET['order_reference_number']);
    
    $sql_update_status = "UPDATE `multi_order`
                             SET `order_status` = '$new_order_status'
                           WHERE `order_reference_number` = '$ord_ref_num'";
    
    $upd_status = mysqli_query($conn, $sql_update_status);
    
    if($upd_status){
        header("location: index.php?page=2&msg=y");
        die();
    }
    else{
        header("location: index.php?page=2&msg=n");
        die();
    }
    
        
    
}
