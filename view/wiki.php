<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/style.css">
</head>

<body>

    <!------------------------------------------------- NAVBAR ------------------------------------------------->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger nav-title" href="#home">IncautiouS</a>
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
                            <a href="../view/login.php" class="btn btn-primary nav-ling">Sign In</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!------------------------------------------------- END NAVBAR ------------------------------------------------->



    <section id="postpage">
        <div class="container-fluid postpage">
            <div class="row">

                <div class="col-2">

                </div>
                <div class="col-7 post-column">

                </div>

                <div class="col-3">
                </div>
            </div>
        </div>
    </section>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>