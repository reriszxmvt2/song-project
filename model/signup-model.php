<?php
    include 'database-connector.php';
    class SignupModel extends DatabaseConnector
    {
        public function getByUsername($username)
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

        public function createUsername($username, $password)
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
