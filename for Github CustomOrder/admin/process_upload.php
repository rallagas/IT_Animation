<?php
include_once ("../db.php");

if(isset($_POST["upload_file"])){
    $item_name = htmlspecialchars($_POST['item_name']);
    $item_desc = htmlspecialchars($_POST['item_desc']);
    $step_id = htmlspecialchars($_POST['step_id']);
    $item_price = htmlspecialchars($_POST['item_price']);
    $file_name = $_FILES["item_img"]["name"];

    
    
    $target_file = "../img/" . basename($file_name);
   
    $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $file_name = $item_name . "." . $image_file_type;
    
    $target_file = "../img/" . $file_name;
    

        
    echo $image_file_type . "<br>";
   // print_r($_FILES["item_img"]);
  //  echo $target_file . "<br>";
    echo $_FILES["item_img"]['tmp_name'] . "<br>";
    if($_FILES["item_img"]['type'] != "image/jpeg") {
        echo "File Type is not allowed.";
    }
    echo $_FILES["item_img"]['name'] . "<br>";
    echo $_FILES["item_img"]['full_path'] . "<br>";
    echo $_FILES["item_img"]['error'] . "<hr>";

   if($_FILES["item_img"]['size'] > 500000){
       echo "file is too large.";
   }
 //  
$image_property = getimagesize($_FILES["item_img"]["tmp_name"]) ;
// print_r($image_property); 
 echo "width" . ":" .$image_property[0] . "<br>";
 echo "height" . ":" .$image_property[1] . "<br>";
 echo "width & height" . ":" .$image_property[3] . "<br>";
 echo "File Type" . ":" .$image_property['mime'];
 //  
   echo "<hr>";
 $status = move_uploaded_file($_FILES["item_img"]["tmp_name"], $target_file);
   if($status){
       $sql_insert_ingredient = "INSERT INTO `ingredients` 
                                 (`ingredient_name`,`step_id`,`price_amt`,`ingredient_description`,`ingredient_img`)
                               VALUES
                                  ('$item_name','$step_id','$item_price','$item_desc','$file_name')";
       mysqli_query($conn,$sql_insert_ingredient);
       header("location: index.php?page=1&msg=y");
   }
   else{
       echo $status;
       header("location: index.php?page=1&msg=n");
   }
    
}







