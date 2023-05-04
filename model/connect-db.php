<?php
    function connectionDb()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbName = 'song_project';

        $conn = 'mysql:host='. $servername .'; dbname='. $dbName .'';

        try {
            $connect = new PDO($conn, $username, $password);
            // echo 'Connected to Database';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $connect;
    };