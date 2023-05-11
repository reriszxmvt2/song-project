<?php
    session_start();
    include '../model/signin-model.php';

    if (isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $signinModal = new SigninModel();
        $result = $signinModal->getSignin($username, $password);

        if ($result) {
            $_SESSION['username'] = $username;
            header('location: index.php');
        } else {
            $error = 'username or password wrong';
        }
    }

    include '../view/sign-in-view.php';
