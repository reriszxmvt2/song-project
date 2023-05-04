<?php 
    session_start();
    include '../model/authentication-model.php';//todo: session start first. ทำแล้ว ( ^ w ^ )
    $userSignup = $_POST['signup'];
//todo: เอา if ซ้อน if ออก.
    if (isset($userSignup)) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $authen = new AuthenticationModel();//todo: name standard. ทำแล้ว ( ^ w ^ )
        $result = $authen->getByUsername($username);

        if ($result) {
            $_SESSION['error'] = 'username already exists.';//todo: review error.
            header('location: ../client/sign-up-client.php');//todo: session มีไว้เพื่อ
        } else {
            $authen->createUsername($username, $password);
            $_SESSION['username'] = $username;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../client/index.php');
        }
    }
