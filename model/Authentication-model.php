<?php 
    include '../server/connect-db.php';
    
    function getSignin($username, $password)
    {
        global $connect;
        $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
        $executeData = [ //todo : constand. ทำแล้ว ( ^ w ^ )
            ':username' => $username, 
            ':password' => $password,
        ];
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute($executeData);
        $result = $preparedSql->fetch();//todo: change to fetch. ทำแล้ว ( ^ w ^ )

        return $result;
    };
    function getByUsername($username) 
    {
        global $connect;
        $sql = 'SELECT * FROM user WHERE username = :username';
        $executeData = [
            ':username' => $username,
        ];
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute($executeData);
        $result = $preparedSql->fetch();

        return $result;
    }
    function createUsername($username, $password)
    {
        global $connect;
        $sql = 'INSERT INTO user SET username = :username, password = :password'; //todo: name bindparam. ทำแล้ว ( ^ w ^ )
        $executeData = [
            ':username' => $username,
            ':password' => $password,
        ];
        $preparedSql= $connect->prepare($sql);
        $preparedSql->execute($executeData);
    }
