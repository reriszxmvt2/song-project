<?php
class BaseModel
{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->_connectionDb();
    }

    private function _connectionDb() 
    {
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbName = 'song_project';
        $conn = 'mysql:host=' . $servername . '; dbname=' . $dbName . '';

        try {
            $this->connect = new PDO($conn, $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->connect;
    }
}
