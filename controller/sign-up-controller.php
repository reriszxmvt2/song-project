<?php
    session_start();
    include '../model/authentication-model.php';
    
    $signUpController = new SignUpController();

    if (isset($_POST['signup'])) {
        $signUpController->signUpValidate();
    }

    class SignUpController
    {
        public $error;
        public $successfull;

        function signUpValidate()
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $authen = new AuthenticationModel(); //todo: name standard. ทำแล้ว ( ^ w ^ )
            $result = $authen->getByUsername($username);

            if ($result) { //todo: เอา if ซ้อน if ออก. ทำแล้ว ( ^ w ^ )
                $this->error = 'username already exists.';
            } else {
                $authen->createUsername($username, $password);
                $_SESSION['username'] = $username;
                $this->successfull = 'sign up successfully';
                header('location: ../view/index.php');
            }
        }
    }

    if (isset($_SESSION['username'])) {
        header('location: ./index.php');
    }
    