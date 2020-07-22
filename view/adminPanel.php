<?php include('../controller/server.php');
include '../model/connect.php';
$db = new database();
?>
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
    <?php if (isset($_SESSION['user_logged_in'])) : ?>

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

        <!-- <div class="d-flex align-items-center flex-column justify-content-center h-100">
            <p><a class="btn btn-secondary" href="#tabel-user">Tabel User</a>
            <a class="btn btn-secondary" href="">Tabel Post</a>
            <a class="btn btn-secondary" href="">Tabel Comment</a>
            <a class="btn btn-secondary" href="">Tabel Wiki</a></p>
        </div> -->

        <!------------------------------------------------- START TABEL USER ------------------------------------------------->
        <div id="tabel-user" class="d-flex align-items-center flex-column justify-content-center h-100 mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">TABEL USER</h3><br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Id User</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Badge</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Profile Pict</th>
                                <th scope="col">Kampus</th>
                                <th scope="col">Command</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($db->tampil_data('user') as $x) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $x['idUser']; ?></td>
                                    <td><?php echo $x['username']; ?></td>
                                    <td><?php echo $x['email']; ?></td>
                                    <td><?php echo $x['password']; ?></td>
                                    <td><?php echo $x['role']; ?></td>
                                    <td><?php echo $x['badge']; ?></td>
                                    <td><?php echo $x['desc']; ?></td>
                                    <td><?php echo $x['profilePict']; ?></td>
                                    <td><?php echo $x['kampus']; ?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="edit.php?idUser=<?php print $x['idUser']; ?>">edit</a>
                                        <a class="btn btn-secondary" href="#modaledit">hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary" href="../view/signup.php">Tambah Data</a>
        </div>
        <!------------------------------------------------- END TABEL USER ------------------------------------------------->


        <!------------------------------------------------- START MODAL EDIT------------------------------------------------->
        <div class="modal fade" id="modaledit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="login-container">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <h1><strong style="color: blue;">Tabel User</strong></h1>
                                        <br>
                                        <?php foreach($db->edit($_GET['id']) as $d){ ?>
                                        <form class="form-group" method="POST" action="../view/adminPanel.php">
                                            <label for="category">Post Category : </label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="quest">Quest</option>
                                                <option value="monster">Monster</option>
                                                <option value="item">Item</option>
                                                <option value="shop">Shop</option>
                                            </select>
                                            <br>
                                            Username : <input class="input-title form-control" type="text" name="username" id="title" placeholder="Username">
                                            <br>
                                            Email : <input class="input-title form-control" type="text" name="email" id="title" placeholder="Email">
                                            <br>
                                            Password : <input class="input-title form-control" type="text" name="password" id="title" placeholder="Password">
                                            <br>
                                            Role : <input class="input-title form-control" type="text" name="role" id="title" placeholder="Role">
                                            <br>
                                            Badge : <input class="input-title form-control" type="text" name="badge" id="title" placeholder="Badge">
                                            <br>
                                            Desc : <br><textarea name="desc" id="desc" cols="37" rows="10" maxlength="3000" placeholder="Description"></textarea>
                                            <br>
                                            Profile Pict : <input class="input-title form-control" type="text" name="profilePict" id="title" placeholder="Description">
                                            <br>
                                            Kampus : <input class="input-title form-control" type="text" name="kampus" id="title" placeholder="Kampus">
                                            <br>
                                            <input class="btn btn-primary" type="submit" name="add_post" value="Edit">
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------- END MODAL EDIT ------------------------------------------------->

    <?php else : header('location:../view/login.php'); ?>

    <?php endif; ?>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
    <script src="assets/js/main.js"></script>
</body>

</html>