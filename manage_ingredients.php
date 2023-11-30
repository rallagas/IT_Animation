<?php include_once("../db.php"); 
session_start();
//echo $_SESSION['user_info'];
if(!isset($_SESSION['user_id'])){
  header("location: ../index.php?msg=no_user_found");   
} ?>
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
            <div class="col-3 pt-5">
                <?php 
                if(isset($_GET['msg'])){
                   switch($_GET['msg'])
                   {
                       case 'y': echo "<span class='alert alert-success mb-2'>Ingredient has been added.</span>";
                           break;
                       case 'n': echo "<span class='alert alert-danger mb-2'>Ingredient was not added.</span>";
                           break;
                       default:
                   }
                }
                ?>
                
                <?php if(!isset($_GET['update_ingredient'])) { ?>
                <h3 class="display-6 mt-3">Add Ingredients</h3>
                <form action="process_upload.php" enctype="multipart/form-data" method="post">
                    
                    <div class="mb-3">
                        <label for="" class="form-label"> Ingredient_name</label>
                                <input type="text" name="item_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Ingredient Description</label>
                               <textarea name="item_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Step Id </label>
                        
                               <select name="step_id" id="" class="form-select">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                               </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Price </label>
                        <input type="number" name="item_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Item Image File </label>
                                <input type="file" name="item_img" class="form-control">
                       
                    </div>
                    <input type="submit" name="upload_file" class="btn btn-success">
                </form>
                <?php }
                else if (isset($_GET['update_ingredient']) && isset($_GET['ing_id'])){
                    $ing_id = $_GET['ing_id']; 
                    $sql_get_ing_info = "SELECT ing.ingredient_name
                                              , ing.ingredient_id 
                                              , ing.ingredient_description 
                                              , ing.price_amt 
                                              , steps.step_description 
                                           FROM `ingredients` ing
                                           JOIN `steps` steps
                                             on steps.step_id = ing.step_id
                                           WHERE ingredient_id = '$ing_id'";
                    $info_result = mysqli_query($conn, $sql_get_ing_info);
                    
                    $info = mysqli_fetch_array($info_result);
                    ?>
                    <h3 class="display-6 mt-3">Update Ingredients</h3>
                    <form action="">
                        <div class="mb-3">
                             <label for="" class="form-label">New Ingredient Name</label>
                            <input type="text" class="form-control" value="<?php echo $info['ingredient_name'];?>">
                        </div>
                        <div class="mb-3">
                             <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" value="<?php echo $info['ingredient_description'];?>">
                        </div>
                        <div class="mb-3">
                             <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" value="<?php echo $info['price_amt'];?>">
                        </div>
                        <div class="mb-3">
                             <label for="" class="form-label">Step</label>
                                <select name="" id="" class="form-select">
                                    <?php $sql_step_option="SELECT * FROM `steps`";
                                          $option_result =mysqli_query($conn,$sql_step_option);
                                          while($opt = mysqli_fetch_array($option_result)){ ?>
                                              <option value="<?php echo $opt['step_id'];?>"><?php echo $opt['step_description'];?></option>
                                          <?php }
                                    ?>
                                </select>
                        </div>
                        <input type="submit" class="btn btn-success">
                        
                    </form>  
                    
                <?php }
                
                ?>
            </div>
            <div class="col-8 pt-5">
                 <h3 class="display-6 mt-3">Ingredients</h3>
                    <div class="row">
                <?php
                $sql_fetch_ing = "SELECT * FROM ingredients";
                $ing_result = mysqli_query($conn,$sql_fetch_ing);
                
                while ($row = mysqli_fetch_array($ing_result)){
                    ?>
                    <div class="card px-0 col-3">
                     <?php if($row['ingredient_img'] != ''){ ?>
                      <img src="../img/<?php echo $row['ingredient_img'];?>" style="max-height:200px" class="object-fit-cover card-img-top img-fluid">
                      <?php  } ?>
                        <h6 class="ms-2 fs-5"><?php echo $row['ingredient_name'];?></h6>
                        <div class="card-body">
                           <em class="card-link"><?php echo "Php " . number_format($row['price_amt'],2);?></em>
                            <p class="card-caption">
                                <?php echo $row['ingredient_description'];?>
                            </p>
                        </div>
                        
                            <div class="card-footer">
                                <a href="?page=1&update_ingredient&ing_id=<?php echo $row['ingredient_id'];?>" class="btn btn-sm btn-success">update</a>
                                <a href="" class="btn btn-sm btn-danger">deactivate</a>
                            </div>
                    </div>
                    <?php
                }
                ?>
                </div>    
            </div>
        </div>
    </div>

</body>
    <script src="../js/bootstrap.js"></script>
   </html>