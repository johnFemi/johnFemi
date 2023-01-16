<?php
session_start();
include 'includes/db.php';
include 'functions/function.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:200px;">
           <div class="col-sm-5 col-md-5">
            <div class="card">
                <div class="card-header text-center text-primary">
                    <h1 style="font-weight:bolder; font-size:30px; margin-bottom:10px;">Admin Login <i class="fa fa-lock"></i></h1>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group" style="margin-botton:3px:">
                    <input type="text" class="form-control" placeholder="Email" name="admin_email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="admin_password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary form-control" value="Login" name="admin_login">
                </div>
                
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php adminLogin(); ?>
</body>
</html>