<?php
    session_start();
    include './connect-db.php' ;
    include '../model/Authentication-model.php' ;

    $errors = [];
    $userSignin = $_POST['signin'];

    if (isset($userSignin)) {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        $result = getSignin($inputUsername, $inputPassword, $connect);

        if ($result) {
            $_SESSION['username'] = $inputUsername;
            $_SESSION['signInSuccess'] = 'successfully';
            header('location: ../client/index.php');
        } else {
            array_push($errors, 'username or password wrong');
            $_SESSION['error'] = 'username or password wrong';
            header('location: ../client/sign-in-client.php');
        }
    }
