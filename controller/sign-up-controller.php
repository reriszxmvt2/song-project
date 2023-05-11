<?php 
    session_start();
    include '../model/signup-model.php';
    //todo: refactor object.
    $signupModel = new SignupModel();

    $error = [];

    if (isset($_SESSION['username'])) {
        header('location: index.php');
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
            header('location: index.php');
        }
    }

    include '../view/sign-up-view.php';
