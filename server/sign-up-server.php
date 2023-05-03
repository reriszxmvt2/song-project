<?php 
    session_start();
    include '../model/authentication-model.php';//todo: seesion start first. ทำแล้ว ( ^ w ^ )
    $userSignup = $_POST['signup'];

    if (isset($userSignup)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authen = new Authentication();//todo: name standard. ทำแล้ว ( ^ w ^ )
        $result = $authen->getByUsername($username);

        if ($result) {
            $_SESSION['error'] = 'username already exists.';
            header('location: ../client/sign-up-client.php');
        } else {
            $authen->createUsername($username, $password);
            $_SESSION['username'] = $username;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../client/index.php');
        }
    }
