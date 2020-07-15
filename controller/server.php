<?php
session_start();
extract($_POST);
// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'forum');

//METHOD AUTO INCREMENT VARCHAR ID
function latest_id($id, $table){
    $query = "SELECT $id FROM $table WHERE $id=(SELECT max($id) FROM $table);";
    // $query = "SELECT idPost FROM post WHERE idPost=(SELECT max(idPost) FROM post);";

    $db = mysqli_connect('localhost', 'root', '', 'forum');

    $result = mysqli_query($db, $query);
    $idPost = mysqli_fetch_assoc($result);

    foreach ($idPost as $data) {
        if ($data) {
            $alpha = substr($data, 0, 1); // Get the first three characters and put them in $alpha
            $numeric = substr($data, 3, 9); // Get the following six digits and put them in $numeric
            $numeric++; // Add one to $numeric
            $numeric = str_pad($numeric, 9, '0', STR_PAD_LEFT); // Pad $numeric with leading zeros
            $newids = $alpha . $numeric; // Concatenate the two variables into $newids
        }
    }
    return $newids;
}


// --------------------------------------------START REG USER--------------------------------------------
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match");}
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $Uid = latest_id("idUser", "user");
        $password = $password_1;

        $query = "INSERT INTO user VALUES('$Uid','$username', '$email', '$password', 'user', '', '', '')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
  }
// --------------------------------------------END REG USER--------------------------------------------


// -------------------------- Login - Sign In User ------------------------------------------------

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // $password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        /* there is a recordset so fetch into as array */
        $row = mysqli_fetch_assoc($results);
        /* extract the required variables from recordset array */
        $idUser = $row['idUser'];


        if (mysqli_num_rows($results) == 1) {
            $_SESSION['idUser'] = $idUser;
            $_SESSION['username'] = $username;
            $_SESSION['user_logged_in'] = true;
            echo "<script type='text/javascript'>alert('Login id already exist');</script>";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
// -------------------------- END Login - Sign In User ------------------------------------------------



// -------------------------- Add Post System ------------------------------------------------
if (isset($_POST['add_post'])) {

    $query_latest_idPost = "SELECT idPost FROM post WHERE idPost=(SELECT max(idPost) FROM post);";

    $result = mysqli_query($db, $query_latest_idPost);
    $latest_idPost = mysqli_fetch_assoc($result);

    foreach ($latest_idPost as $data) {

        if ($data) {
            $alpha = substr($data, 0, 1); // ngambil character dari index ke-1 dimasukin ke variabel alpha
            $numeric = substr($data, 2, 9); // ngambil 9 character sisa dari idPost terakhir mulai dari character kedua dimasukin ke variabel numeric
            $numeric++; // nambah 1 nilai numeric 
            $numeric = str_pad($numeric, 9, '0', STR_PAD_LEFT); // Pad $numeric with leading zeros
            $idPost = $alpha . $numeric; // Concatenate the two variables into $newids
        }
    }

    $idUser = mysqli_real_escape_string($db, $_SESSION['idUser']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $article = mysqli_real_escape_string($db, $_POST['article']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($category)) {
        array_push($errors, "Masukkan kategori post!");
    }
    if (empty($title)) {
        array_push($errors, "<?php alert('Masukkan judul post! ?>')");
    }
    if (empty($article)) {
        array_push($errors, "Masukkan artikel post!");
    }

    // KLO NGGA ADA ERROR, SYSTEM NGINPUT DATANYA
    if (count($errors) == 0) {
        $query = "INSERT INTO post VALUES('$idPost', '$idUser', '$category', now(), '$title', '$article')";
        mysqli_query($db, $query);
        header('location: forum.php');
    }
}
// -------------------------- END Add Post System ------------------------------------------------