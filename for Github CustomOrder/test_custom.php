<?php
//This file is to connect to your database.
$host = 'localhost';
$dbname = 'sample2'; //<--replace this with the name of your Database
$username = 'root';
$password = '';

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    die();
}

if(isset($_GET['order_custom'])){

    foreach($_GET['chk_item'] as $item_name){
    $new_order_desc = "";
    $total_price = 0.00;
//    echo $item_name;
        $new_order_desc .= $item_name;
        foreach($_GET as $var => $value){
            if($var != 'chk_item' && $var != 'order_custom'){
                $new_arr = explode(":",$value);    
                if($item_name == $new_arr[0]){
                    $new_order_desc .= ":". $new_arr[2] .":" .$new_arr[3];
                }
                $total_price +=  $new_arr[1];
            }
        }
        echo "<hr>";
    echo "Order_description:" . $new_order_desc . "<br>";
    echo "total Price: " . $total_price;
        /*This part you will put the code to insert the data into the database*/
    }  
}
?>

<hr>

<html>
<head>
    <meta charset="UTF-16">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="my.css">
</head>
<body>
   
   <div class="container-fluid">
       <div class="row">
           <div class="col-4"></div>
           <div class="col-4">
              <form action="" method="get">
               <?php 
                    $sql_get_items = "SELECT * FROM `items`";
                    $items_result = mysqli_query($conn, $sql_get_items);
               
                    while($row=mysqli_fetch_array($items_result)){
                        
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name']; ?>
                        <label for="<?php echo "item".$item_id; ?>"><?php echo $item_name; ?></label>
                        <input type="checkbox" name="chk_item[]" value="<?php echo $item_name;?>" id="<?php echo "item".$item_id; ?>">
                        <?php 
//                        echo "<h3>".$item_name."</h3>";
                        
                        $sql_get_property = "SELECT * FROM `custom_properties` WHERE item_id = '$item_id'";
                        $property_result = mysqli_query($conn, $sql_get_property);
                        echo "<ul>";
                        while($prop = mysqli_fetch_array($property_result)){
                            echo "<li>".$prop['custom_property_name']."</li>";
                            $cp_id = $prop['cp_id'];
                            
                            $sql_get_variation = "SELECT * FROM `custom_property_variation` WHERE cp_id = '$cp_id'";
                            $variation_result = mysqli_query($conn, $sql_get_variation);
                            echo "<ol>";
                            while($var = mysqli_fetch_array($variation_result)){
                                //echo "<li>".$var['variation_desc']."</li>"; 
                                ?>
                            
                                <label for="variation_<?php echo $var['variation_id'];?>"><?php echo $var['variation_desc'];?></label>
                                <input type="radio" name="<?php echo $prop['custom_property_name'];?>" value="<?php echo $item_name.":".$var['price_value'].":".$prop['custom_property_name'].":".$var['variation_desc'].";";?>" id="variation_<?php echo $var['variation_id'];?>">
                            <?php }
                            echo "</ol>";
                            
                            
                        }
                        echo "</ul>";
                                    
                    }
               ?>
               <input type="submit" name="order_custom">
               </form>
           </div>
           <div class="col-4"></div>
       </div>
   </div>
    
</body>
    <script src="js/bootstrap.js"></script>
</html>