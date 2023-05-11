<?php
    include 'base-model.php';
    
    class SigninModel extends BaseModel
    {
        public function getSignin($username, $password)
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
    }
