<?php
    include '../model/signin-model.php';
    include '../view/sign-in-view.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $authen = new SigninModel();
    $result = $authen->getSignin($username, $password);
    
    if ($result) {
        $_SESSION['username'] = $username;
        header('location: ../view/index.php');
    } else {
        $_SESSION['error'] = 'username or password wrong';
        header('location: ../view/sign-in-client.php');
    }
