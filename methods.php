<?php
class database_con{
    function db_con($hostname, $username, $password, $database_name){
        $connection = new mysqli($hostname, $username, $password, $database_name);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);

    }
    echo "Connected successfully";
    return $connection;
}

?>  