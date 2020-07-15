<?php include('../controller/server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IoN Forum</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/style.css">

</head>

<body>

    <?php if (isset($_SESSION['user_logged_in'])) : ?>

    <!------------------------------------------------- FORM ADD POST ------------------------------------------------->
    <section id="form">
        <div class="container-fluid">
            <div class="row h-100">
                <div class="col-8">
                    <div class="container post-add">
                        <h2>Create Post</h2>
                        <form method="POST" action="../view/forum.php">
                            <?php 
                            include('../model/errors.php');
                            include('../model/connect.php');
                            $db = new database ();?>
                            
                            <p id="idPost"><?= $db->latest_id("idPost", "post");?></p>
                            <p id="idUser"><?= $_SESSION['idUser'];?></p>

                            <label for="category">Post Category : </label>
                            <select name="category" id="category">
                                <option value="quest">Quest</option>
                                <option value="monster">Monster</option>
                                <option value="item">Item</option>
                                <option value="shop">Shop</option>
                            </select>
                            <br><br>
                            Post Title : <input class="input-title" type="text" name="title" id="title" placeholder="Post Title">
                            <br><br>
                            Article : <br><textarea name="article" id="article" cols="70" rows="10"
                                maxlength="3000"></textarea>
                            <br><br>
                            <input class="btn btn-primary" type="submit" name="add_post" value="Post Now"> 
                        </form>
                    </div>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------- END FORM ADD POST ------------------------------------------------->

    <?php else : ?>
    <!------------------------------------------------- FORM LOGIN ------------------------------------------------->
    <div class="container-fluid">
                <div class="row h-100 align-item-center">
                    <div class="col-sm-12 text-center">
                        <h1><strong style="color: blue;">Login.</strong></h1>
                        <br>
                        <form method="POST" action="index.php" data-toggle="modal">
                            <?php include('../model/errors.php'); ?>
                            <input class="login-item" type="text" name="username" placeholder="Username">
                            <br>
                            <input class="login-item" type="password" name="password" placeholder="Password">
                            <br>
                            <p style="margin: 10px;">Not yet a member? <a data-dismiss="modal" data-toggle="modal" href="#modalSignUp">Sign Up</a></p>
                            <br>
                            <br>
                            <button type="submit" class="login-button " name="login_user">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
    <?php endif; ?>




    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>