<?php 
    session_start();
    include '../model/signup-model.php';

    $signupModel = new SignupModel();

    $error = [];

    if (isset($_SESSION['username'])) {
        header('location: ../view/index.php');
    }

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $signupModel->getByUsername($username);  

        if ($result) {
            $error[] = 'username already exits.';
        }

        if (count($error) == 0) {
            $signupModel->createUsername($username, $password);
            $_SESSION['username'] = $username;
            $_SEESION['signupSuccess'] = 'sign up successfully';
            header('location: ../view/index.php');
        }
    }
