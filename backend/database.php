<?php

class Database {
    public $connection;
    public $hostname;
    public $username;
    public $password;
    public $database_name;

    function __construct($hostname, $username, $password, $database_name) {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database_name = "hobo";

        try {
            
            $dsn = "mysql:host={$this->hostname};dbname={$this->database_name}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    function closeConnection() {
        $this->connection = null;
    }
}


?>

