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
        <h1><strong style="color: blue;">Login.</strong></h1>
        <br>
        <form name="form1" method="POST" action="index.php" data-toggle="modal">
            <?php include('../model/errors.php'); ?>

            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>

            <small class="form-text text-muted" style="margin: 10px;">Not yet a member? <a data-dismiss="modal" data-toggle="modal" href="../view/signup.php">Sign Up</a></small>
            <center>
            <a href="../view/index.php" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary " name="login_user">Sign In</button>
            </center>
        </form>
    </div>

</body>

</html>