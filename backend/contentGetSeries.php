<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function getSeries($connection, $search) {
    $sql = "SELECT * 
            FROM serie
            WHERE 
                SerieID LIKE :searchTerm OR
                SerieTitel LIKE :searchTerm OR 
                IMDBLink LIKE :searchTerm OR 
                TrailerVideo LIKE :searchTerm OR 
                description LIKE :searchTerm";
    $stmt = $connection->prepare($sql);
    $likeSearchTerm = '%' . $search . '%';
    $stmt->bindParam(':searchTerm', $likeSearchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = getSeries($database->connection, $entityBody['search']);
echo json_encode($results);