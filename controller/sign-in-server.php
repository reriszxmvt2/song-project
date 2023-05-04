<?php
    session_start();
    include '../model/authentication-model.php';
    $userSignin = $_POST['signin'];

    if (isset($userSignin)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authen = new AuthenticationModel();
        $result = $authen->getSignin($username, $password);

        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['signInSuccess'] = 'successfully';
            header('location: ../client/index.php');
        } else {
            $_SESSION['error'] = 'username or password wrong';
            header('location: ../client/sign-in-client.php');
        }
}
