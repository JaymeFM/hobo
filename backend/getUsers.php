<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function getUsers($connection, $search) {
    $sql = "SELECT * 
            FROM klant
            WHERE 
                KlantNr LIKE :searchTerm OR
                Voornaam LIKE :searchTerm OR 
                Tussenvoegsel LIKE :searchTerm OR 
                Achternaam LIKE :searchTerm OR 
                Email LIKE :searchTerm OR 
                Genre LIKE :searchTerm OR 
                ContentManager LIKE :searchTerm OR 
                Admin LIKE :searchTerm";
    $stmt = $connection->prepare($sql);
    $likeSearchTerm = '%' . $search . '%';
    $stmt->bindParam(':searchTerm', $likeSearchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = getUsers($database->connection, $entityBody['search']);
echo json_encode($results);