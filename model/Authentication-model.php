<?php 
    include 'connect-db.php'; 
    include 'signup-model.php';
    include 'signin-model.php';
        //todo: review oop ( ^ v ^ )/
    class AuthenticationModel
    {
        public $connect;
        public $username;
        public $password;

        public function __construct($username, $password)
        {
            $this->connect = connectionDb();
            $this->username = $username;
            $this->password = $password;
        }
    }
