<?php
    session_start();
    include '../model/user-model.php';

    if (isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $result = $userModel->getSignin($username, $password);

        if ($result) {
            $_SESSION['username'] = $username;
            header('location: home-controller.php');
        } else {
            $error = 'username or password wrong';
        }
    }

    include '../view/sign-in-view.php';
