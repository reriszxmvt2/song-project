<?php 
    include('./connect-db.php');
    include('../model/sign-up-model.php');

    session_start();
    $error = [];
    $userSignup = $_POST['signup'];

    if (isset($userSignup)) {
        $userCreateUsername = $_POST['username'];
        $userCreatePassword = $_POST['password'];
        
        $result = getByUsername($userCreateUsername);
        $usernameInDb = $result['username'];

        if ($userCreateUsername === $usernameInDb) {
            array_push($error, "Username already exists.");
        }

        $errorsListLength = count($error);
        echo ' '.$errorsListLength.' ';

        if ($errorsListLength == 0) {
            $result = createUsername($userCreateUsername,$userCreatePassword);
            $_SESSION['username'] = $userCreateUsername;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../client/index.php');
        } else {
            $_SESSION['error'] = 'username already exists.';
            header('location: ../client/sign-up-client.php');
        }
    }
?>