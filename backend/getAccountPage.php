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
function getGenres($connection) {
    $sql = "SELECT * FROM genre";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getFavoriteGenre($connection, $Email) {
    $sql = "SELECT Genre FROM klant
            WHERE Email = :Email";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['Genre'];
}

// RETURN RESULTS
$entityBody = json_decode(file_get_contents('php://input'), true);
$return = (object) [
    'genres' => getGenres($database->connection),
    'favoriteGenre' => getFavoriteGenre($database->connection, $entityBody['email'])
];
echo json_encode($return);

?>