<?php require_once("../icons.php");?>

 <nav class="navbar bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img class="border rounded border-1" width="100" height="50" src="../img/pizza_logo.jpeg" alt=""> </a>
    
    <div class="align-items-center">
    <ul class="nav nav-underline me-5 align-items-center">
        <li class="nav-item me-5">
          <a class="nav-link active  text-dark" aria-current="page" href="#">MAKE YOUR OWN PIZZA</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link  text-dark" href="#">DEALS</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link  text-dark">BUNDLES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-dark" >ON SALE</a>
        </li>
      </ul>
    </div>
    
    
        <form class="d-flex mt-3" role="search">
         <div class="input-group">
          <input class="form-control border-1 border-success" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><?php echo ICONSEARCH;?></button>
          </div>
        </form>
  </div>
  
  
  
</nav>
