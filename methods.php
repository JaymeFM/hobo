<?php

class Database {
    public $connection;
    public $hostname;
    public $username;
    public $password;
    public $database_name;

    function __construct($hostname, $username, $password, $database_name) {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;

        try {
            
            $dsn = "mysql:host={$this->hostname};dbname={$this->database_name}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    function closeConnection() {
        $this->connection = null;
    }
}

?>

