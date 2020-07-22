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


        <!------------------------------------------------- START POST SECTION ------------------------------------------------->
        <section id="postpage">
            <div class="container-fluid postpage">
                <div class="row">

                    <!-- KOLOM KATEGORI -->
                    <div class="col-2">

                    </div>
                    <!-- END KOLOM KATEGORI -->

                    <!-- KOLOM POSTINGAN -->
                    <div class="col-7 post-column">

                        <!-- KOLOM PENAMBAHAN POST -->
                        <div class="post-add">
                            <div class="text-center">
                                <a href="../view/addPost.php" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                        <!-- END KOLOM PENAMBAHAN POST -->

                        <!-- AWAL POSTINGAN -->
                        <?php include '../model/connect.php';
                        $db = new database();
                        // $jumlahPost = $db->hitung_post();

                        foreach ($db->tampil_post() as $x) { ?>
                            <div class="post-container">
                                <div class="container">
                                    <p class="post-desc"><?php echo $x['category']; ?> | <?php echo $x['username']; ?> |
                                        <?php echo $x['date']; ?> | <?php echo $x["idPost"]; ?></p>
                                    <h3 class="post-title"><?php echo $x['title']; ?></h3>
                                    <p class="post-article"><?php echo $x['article']; ?></p>
                                </div>
                            </div>


                        <?php }  ?>

                        <!-- AKHIR POSTINGAN -->
                    </div>

                    <!-- END KOLOM POSTINGAN -->

                    <div class="col">
                    </div>
                </div>
            </div>
        </section>
        <!-------------------------------------------------- END POST SECTION ------------------------------------------------->

        <!-- IF USER HASN'T LOGIN YET -->
    <?php else : header('location:../view/login.php'); ?>



    <?php endif; ?>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>