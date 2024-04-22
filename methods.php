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

        
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database_name);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } 
        echo "Connected successfully";
    }
    function closeConnection() {
        $this->connection->close();
    }
}
?>
