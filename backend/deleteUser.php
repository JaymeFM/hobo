<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function deleteUser($connection, $KlantNr) {
    $sql = "DELETE FROM klant WHERE KlantNr = :KlantNr;";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->execute();
    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = deleteUser($database->connection, $entityBody['KlantNr']);
echo json_encode($results);