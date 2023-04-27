<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'song_project';

    $connect = mysqli_connect($servername, $username, $password, $dbName);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>