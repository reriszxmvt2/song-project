<?php
    session_start();
    include '../model/user-model.php';

    if (isset($_SESSION['username'])) {
        header('location: record-controller/home-controller.php');
    }

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $result = $userModel->getUser($username, $password);

        if ($result) {
            $_SESSION['username'] = $username;
            header('location: ./record-controller/home-controller.php');
            exit();
        } else {
            $error = 'username or password wrong';
        }
    }

    include '../view/sign-in-view.php';
