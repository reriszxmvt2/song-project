<?php
    session_start();
    include '../model/authentication-model.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $authen = new AuthenticationModel();
    $result = $authen->getSignin($username, $password);

    if ($result) {
        $_SESSION['username'] = $username;
        $_SESSION['signInSuccess'] = 'successfully';
        header('location: ../view/index.php');
    } else {
        $_SESSION['error'] = 'username or password wrong';
        header('location: ../view/sign-in-client.php');
    }

