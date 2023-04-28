<?php //todo: PDO /complete/
    include('config-db.php');

    $conn = 'mysql:host='. $servername .'; dbname='. $dbName .'';

    try {
        $connect = new PDO($conn, $username, $password);
        echo "Connected to Database";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
