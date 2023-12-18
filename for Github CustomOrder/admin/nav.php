<?php require_once("../icons.php");
session_start();
if(isset($_GET['logout'])){
   session_destroy();
   header("location: ../index.php?logout_successful");
}

function activate_link($page_id){
    $class="";
    if(isset($_GET['page'])){
        if($_GET['page'] == $page_id){
            $class= "active";
        }
    }
    return $class;
}
?>

 <nav class="navbar bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href=""> <img class="border rounded border-1" width="100" height="50" src="../img/pizza_logo.jpeg" alt=""> </a>
    
    <div class="align-items-center">
    <ul class="nav nav-underline me-5 align-items-center">
        <li class="nav-item me-5">
          <a class="nav-link <?php echo activate_link(1); ?>   text-dark" aria-current="page" href="index.php?page=1">MANAGE INGREDIENTS</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link <?php echo activate_link(2); ?> text-dark"  href="index.php?page=2">MANAGE ORDERS</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link <?php echo activate_link(4); ?>  text-dark">USERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo activate_link(3); ?>  text-dark" >ON SALE</a>
        </li>
      </ul>
    </div>
    
    
        <form class="mt-3" role="search">
         <div class="input-group">
          <input class="form-control border-1 border-success" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><?php echo ICONSEARCH;?></button>
          </div>
        </form>
        
    <a href="?logout" class="btn btn-link">Logout</a>
    <a href="#" class="btn btn-outline-danger"><?php echo $_SESSION['user_global_info']['fullname'];?></a>
  </div>
  
  
  
</nav>
