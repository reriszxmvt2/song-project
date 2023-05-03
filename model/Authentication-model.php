<?php 
    include '../server/connect-db.php';
    
    class Authentication //todo: name standard. ทำแล้ว ( ^ w ^ )
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
            $preparedSql= $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
