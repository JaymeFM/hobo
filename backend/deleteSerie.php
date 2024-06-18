<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function deleteSerie($connection, $SerieID) {
    $sql = "DELETE FROM serie WHERE SerieID = :SerieID;";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':SerieID', $SerieID, PDO::PARAM_INT);
    $stmt->execute();
    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = deleteSerie($database->connection, $entityBody['SerieID']);
echo json_encode($results);