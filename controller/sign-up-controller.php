<?php 
    session_start();
    include '../model/authentication-model.php';

    $authen = new AuthenticationModel();

    if (isset($_SESSION['username'])) {
        header('location: ./index.php');
    }

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $authen->getByUsername($username);
        $error = validate($result, $authen, $username, $password);
    }

    function validate($result, $authen, $username, $password)
    {
        if ($result) {
            $error = 'your username already exits.';
            return $error;
        } else {
            $authen->createUsername($username, $password);
            $_SESSION['username'] = $username;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../view/index.php');
        }
    }
