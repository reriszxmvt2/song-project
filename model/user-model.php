<?php
    include 'base-model.php';

    class UserModel extends BaseModel
    {
        public function getSignin($username, $password)//todo: change name 
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

        public function createUsername($username, $password)//todo: change name
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
