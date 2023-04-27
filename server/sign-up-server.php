<?php 
    session_start();
    include('./connect-db.php');
    $error = [];
    $userSignup = $_POST['signup'];

    if (isset($userSignup)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checkUser = "SELECT * FROM user WHERE username = '$username'";
        $query = mysqli_query($connect, $checkUser);
        $userData = mysqli_fetch_assoc($query);
        $usernameInDb = $userData['username'];

        if ($username === $usernameInDb) {
            array_push($error, "Username already exists.");
        }

        $errorsListLength = count($error);

        if ($errorsListLength == 0) {
            $sql = "INSERT INTO user SET username = '$username', password = '$password'";
            mysqli_query($connect, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['signUpSuccess'] = 'sign up successfully';
            header('location: ../client/index.php');
        } else {
            $_SESSION['error'] = 'username already exists.';
            header('location: ../client/sign-up-client.php');
        }
    }
?>