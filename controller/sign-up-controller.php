<?php 
    session_start();
    include '../model/authentication-model.php';

    $signupModel = new SignupModel($username, $password);//todo: change authen to model. ทำแล้ว ( ^ v ^ )/

    $error = [];

    if (isset($_SESSION['username'])) {
        header('location: ./index.php');
    }

    if (isset($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $signupModel->getByUsername($username);  
    }
    
    if ($result) {
        $error[] = 'username already exits.';
    }

    if (isset($_POST['signup']) && count($error) == 0) {
        $signupModel->createUsername($username, $password);
        $_SESSION['username'] = $username;
        header('location: ../view/index.php?signupSuccess=sign up successfully'); //todo: ห้่่ามใช้ session send sign up successfully. ( ^ v ^ )/
    }
