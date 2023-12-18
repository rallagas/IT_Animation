

<?php
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_GET['testcheckbox'])){
   // print_r($_GET);
   //print_r($_GET['checkbox_option']);
    
$order_ref_num = gen_order_ref_number(8);
echo $order_ref_num . "<hr>";
    
    
    foreach($_GET['checkbox_option'] as $option){
        foreach($_GET['checkbox_quantity'] as $qty){
               
         $sql_insert_checkbox = "INSERT INTO `multi_order` (`step_id`,`order_reference_number`,`ingredient_id`,`user_id`,`order_qty`)
                                       values ('5','$order_ref_num','$option','$user_id','$qty') ";
                    
        }
        echo $sql_insert_checkbox . "<br>";
        mysqli_query($conn,$sql_insert_checkbox);
    
    }
    
    
}    
?>

<form action="" method="get" class="">
    <input type="hidden" class="" name="page" value="2">
     <div class="col-lg-12 col-sm-12">
                  <h4 class="display-6">Bundle Deals</h4>
                  <div class="container-fluid">
                      <div class="row">
                             
                              <?php
                          $sql_get_ingredient = "SELECT * FROM `ingredients` where `step_id` in (2,3,4)";
                          $get_result = mysqli_query($conn,$sql_get_ingredient);
                          
                          if(mysqli_num_rows($get_result) > 0 ){
                              while($step1 = mysqli_fetch_assoc($get_result)){
                                 ?>
                                 <div class="col-3 card">
                                      <input type="checkbox" class="btn-check" name="checkbox_option[]" value="<?php echo $step1['ingredient_id'];?>" id="opt<?php echo $step1['ingredient_id'];?>" autocomplete="off">
                                            <label title=" <?php echo $step1['ingredient_description'];?>"  class="btn btn-outline-danger mb-1" for="opt<?php echo $step1['ingredient_id'];?>">
                                               <?php echo $step1['ingredient_name'];?>
                                               <?php echo "Php " . number_format($step1['price_amt'],2);?>
                                               <img src="../img/<?php echo $step1['ingredient_img']; ?>" alt="" class="img-fluid">
                                            </label>

                                      <input type="text" class="form-control" name="checkbox_quantity[]" placeholder="Quantity" value="1" >
                               
                                  </div>
                                  <?php
                              }
                          }
                          ?>
                      </div>
                      <div class="row">
                              
                      </div>
                  </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <input type="submit" name="testcheckbox" class="btn btn-success">
    </div>
</form>
