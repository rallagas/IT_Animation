<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
<!--                Reg form goes here-->
              <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'notallowed'){ ?>
                        <div class="alert alert-danger">You are not allowed there.</div>
                    <?php }
                    else if ($_GET['error'] == 'pwdmismatch'){ ?>
                        <div class="alert alert-danger">Passwords mismatch.</div>
                    <?php }
                    else if ($_GET['error'] == 'alreadyexisting'){ ?>
                        <div class="alert alert-danger">User already exists.</div>
                    <?php }
                }
                ?>
               <h3 class="display-3">Register Here.</h3>
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Fullname </label>
                            <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Username </label>
                            <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Password </label>
                            <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Confirm Password </label>
                            <input type="password" name="conf_password" class="form-control">
                    </div>
                    
                    <input type="submit" class="btn btn-success">
                </form>
<!--                Reg form goes here end-->
                
            </div>
            <div class="col-3"></div>
        </div>
    </div>

</body>
<script src="js/bootstrap.min.js"></script>
</html>