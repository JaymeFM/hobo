<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function updateWatchStream($connection, $StreamId) {
    $sql = "UPDATE stream 
            SET d_eind = NOW() 
            WHERE StreamID = :StreamId;";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':StreamId', $StreamId, PDO::PARAM_INT);

    $stmt->execute();
    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$response = updateWatchStream($database->connection, $entityBody['streamId']);
echo json_encode($response);