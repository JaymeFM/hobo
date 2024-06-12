<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// GET DATABASE
require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

// GET DATA
function getData($connection) {
    $sql = "SELECT * FROM genre";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// RETURN RESULTS
$results = getData($database->connection);
echo json_encode($results);

?>