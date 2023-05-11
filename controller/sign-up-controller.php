<?php 
    session_start();
    include '../model/get-user.php';
    
    $error = [];

    if (isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $signupModel = new GetUser(); //todo: refactor object. ทำแล้ว
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
