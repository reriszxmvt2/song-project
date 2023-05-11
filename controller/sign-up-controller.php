<?php 
    session_start();
    include '../model/user-model.php';
    
    $error = [];

    if (isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UserModel(); //todo: refactor object. ทำแล้ว
        $result = $userModel->getByUsername($username);  

        if ($result) {
            $error[] = 'username already exits.'; 
        }

        if (count($error) == 0) {
            $userModel->createUsername($username, $password);
            $_SESSION['username'] = $username;
            header('location: index.php');
        }
    }

    include '../view/sign-up-view.php';
