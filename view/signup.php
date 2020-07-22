<?php include('../controller/server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/assets/css/style.css">

</head>

<body>
    <div class="d-flex align-items-center flex-column justify-content-center h-100 bg-light text-white">
        <h1><strong style="color: blue;">Sign Up.</strong></h1>
        <form method="POST" action="index.php" data-toggle="modal">
            <?php include('../model/errors.php'); ?>
            <?php include('../model/connect.php');
            $db = new database(); ?>
            <!-- <p><?= $db->latest_id("idUser", "user"); ?></p> -->

            <br>
            <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Username">    
            </div>
            
            <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email">    
            </div>
            
            <div class="form-group">
            <input class="form-control" type="password" name="password_1" placeholder="Password">    
            </div>
            
            <div class="form-group">
            <input class="form-control" type="password" name="password_2" placeholder="Confirm Password">    
            </div>
            <small class="form-text text-muted" style="margin: 10px;">Already Have an Account? <a data-dismiss="modal" data-toggle="modal" href="../view/login.php">Sign In</a></small>
            <div class="form-group">
                
            </div>
            <center>
            <a href="../view/index.php" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary" name="reg_user">Sign Up</button>
            </center>
            
        </form>
    </div>

</body>

</html>