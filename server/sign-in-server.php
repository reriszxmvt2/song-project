<?php
    session_start();
    include('./connect-db.php');
    $errors = [];
    $userSignin = $_POST['signin'];

    if (isset($userSignin)) {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        $result = $connect->query("SELECT * FROM user WHERE username = '$inputUsername' AND password = '$inputPassword'");
        $userInDb = count($result);

        if ($userInDb === 1) {
            $_SESSION['username'] = $inputUsername;
            $_SESSION['signInSuccess'] = 'successfully';
            header('location: ../client/index.php');
        } 
          
        if ($userInDb === 0) {
            array_push($errors, 'username or password wrong');
            $_SESSION['error'] = 'username or password wrong';
            header('location: ../client/sign-in-client.php');
        }
    }