<?php 
    include '../model/Authentication-model.php';

    session_start();
    $error = [];
    $userSignup = $_POST['signup'];

    if (isset($userSignup)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $result = getByUsername($username);//todo: sort by priority. and ไม่ต้องส่ง $connect ไปทุกหน้า. [ ทำแล้ว ( ^ w ^ ) ]
        $usernameInDb = $result['username'];

        if ($username === $usernameInDb) {
            array_push($error, 'username already exists.');
        }

        $errorsListLength = count($error);

        if ($errorsListLength == 0) {
            createUsername($username, $password);
            $_SESSION['username'] = $username;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../client/index.php');
        } else {
            $_SESSION['error'] = 'username already exists.';
            header('location: ../client/sign-up-client.php');
        }
    }
