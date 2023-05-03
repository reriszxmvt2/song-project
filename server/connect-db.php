<?php //todo: PDO /complete/

    function connectionDb() //todo: run 100k 
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
