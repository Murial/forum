<?php include('../controller/server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IncautiouS</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/style.css">

</head>

<body>
    <!------------------------------------------------- NAVBAR ------------------------------------------------->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger nav-title" href="../view/index.php">IncautiouS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../view/index.php" target="">Home.</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../view/forum.php" target="">forum.</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../view/wiki.html">wiki.</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Contact.</a></li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_logged_in'])) : ?>
                            <button type="button" class="btn btn-primary " onclick="location.href='../controller/logout.php';">
                                Sign Out
                            </button>
                        <?php else : ?>
                            <button type="button" class="nav-link login btn " data-toggle="modal" data-target="#modalLogin">
                                Sign In
                            </button>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!------------------------------------------------- END NAVBAR ------------------------------------------------->

    <?php if (isset($_SESSION['user_logged_in'])) : ?>
        <?php
        include '../model/connect.php';
        $db = new database();

	    $idUser = $_GET['idUser'];
	    $query = mysqli_query($db->connect, "SELECT * FROM user WHERE idUser = '$idUser';");
	    $m = mysqli_fetch_array($query);
	    ?>
        <div id="edit" class="d-flex align-items-center flex-column h-100 mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h2><center>Tabel User</center></h2>
                    <br>
                    <form class="form-group" method="POST" action="../view/adminPanel.php">
                        Username : <input class="input-title form-control" value="<?php echo $m['username']; ?>" type="text" name="usernaqqqqqme" id="title" placeholder="Username">
                        <br>
                        Email : <input class="input-title form-control" value="<?php echo $m['email']; ?>" type="text" name="email" id="title" placeholder="Email">
                        <br>
                        Password : <input class="input-title form-control" value="<?php echo $m['password']; ?>" type="text" name="password" id="title" placeholder="Password">
                        <br>
                        Role : <input class="input-title form-control" value="<?php echo $m['role']; ?>" type="text" name="role" id="title" placeholder="Role">
                        <br>
                        Badge : <input class="input-title form-control" value="<?php echo $m['badge']; ?>" type="text" name="badge" id="title" placeholder="Badge">
                        <br>
                        Desc : <br><textarea name="desc" id="desc" value="<?php echo $m['desc']; ?>" cols="37" rows="10" maxlength="3000" placeholder="Description"></textarea>
                        <br>
                        Profile Pict : <input class="input-title form-control" value="<?php echo $m['profilePict']; ?>" type="text" name="profilePict" id="title" placeholder="Description">
                        <br>
                        Kampus : <input class="input-title form-control" value="<?php echo $m['kampus']; ?>" type="text" name="kampus" id="title" placeholder="Kampus">
                        <br>
                        <input class="btn btn-primary" type="submit" name="add_post" value="Edit">
                    </form>
                </div>
            </div>
        </div>

    <?php else : header('location:../view/login.php'); ?>

    <?php endif; ?>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
    <script src="assets/js/main.js"></script>
</body>

</html>