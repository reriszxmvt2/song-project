<?php
class DatabaseConnector
{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbName;
    protected $conn;
    protected $connect;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'root';
        $this->dbName = 'song_project';
        $this->conn = 'mysql:host=' . $this->servername . '; dbname=' . $this->dbName . '';

        try {
            $this->connect = new PDO($this->conn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
