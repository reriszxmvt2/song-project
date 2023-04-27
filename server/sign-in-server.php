<?php
    session_start();
    include('./connect-db.php');
    $errors = [];
    $userSignin = $_POST['signin'];

    if (isset($userSignin)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($connect, $sql);
        $userInDb = mysqli_num_rows($query);

        if ($userInDb === 1) {
            $_SESSION['username'] = $username;
            $_SESSION['signInSuccess'] = 'successfully';
            header('location: ../client/index.php');
        } 
           
        if ($userInDb === 0) {
            array_push($errors, 'username or password wrong');
            $_SESSION['error'] = 'username or password wrong';
            header('location: ../client/sign-in-client.php');
        }
    }