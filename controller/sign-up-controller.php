<?php
    session_start();
    include '../model/user-model.php';
    include 'path.php';

    if (isset($_SESSION['username'])) {
        header('location:' . $redirectToHome);
    }

    $error = [];

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $result = $userModel->getByUsername($username);

        if ($result) {
            $error[] = 'username already exits.';
        }

        if (count($error) == 0) {
            $userModel->add($username, $password);
            $_SESSION['username'] = $username;
            header('location:' . $redirectToHome);
        }
    }

    include '../view/sign-up-view.php';
