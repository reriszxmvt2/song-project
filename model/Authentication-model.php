<?php
    include 'connect-db.php'; 
    //todo: change folder name. ย้าย connect db ไว้ใน model. ทำแล้ว ( ^ w ^ )
    class AuthenticationModel//todo: name same file name. ทำแล้ว ( ^ w ^ )
    {
        public $connect;

        function __construct()
        {
            $this->connect = connectionDb();
        }

        function getSignin($username, $password)
        {
            $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
            $paramValues = [
                ':username' => $username,
                ':password' => $password,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function getByUsername($username)
        {
            $sql = 'SELECT * FROM user WHERE username = :username';
            $paramValues = [
                ':username' => $username,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function createUsername($username, $password)
        {
            $sql = 'INSERT INTO user (username, password) VALUES (:username, :password)';
            $paramValues = [
                ':username' => $username,
                ':password' => $password,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
