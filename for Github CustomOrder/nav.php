<?php require_once("icons.php");?>

 <nav class="navbar bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CREAMY PIES</a>
    
    <div class="align-items-center">
    <ul class="nav nav-underline me-5 align-items-center">
        <li class="nav-item me-5">
          <a class="nav-link active  text-dark" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link  text-dark" href="#">SHOP</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link  text-dark">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link user_btn_orange" >ON SALE</a>
        </li>
      </ul>
    </div>
    
    
        <form class="d-flex mt-3" role="search" action="index.php" method="get">
         <div class="input-group">
          <input name="searchkey" class="form-control border-1 border-success" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><?php echo ICONSEARCH;?></button>
          </div>
        </form>
    
<!--    button toggler-->
    <button class="navbar-toggler btn btn-outline-danger border-danger p-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
<?php echo ICONPERSON;?>
    </button>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
          <form action="login.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="uname" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="pword" placeholder="Password">
                    </div>
                    <div class="mb-5">
                        <input type="submit" value="Log In" class="btn btn-success">
                   
                        <a href="registration.php" class="btn btn-link text-success">Sign Up</a>
                   </div>
               
            </form>
            
      </div>
    </div>
  </div>
</nav>