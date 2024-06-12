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
    $sql = "SELECT * FROM serie WHERE Actief = 1";

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function getGenres($connection) {
    $sql = "SELECT * FROM genre";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}



// RETURN RESULTS
$return = (object) [
    'genres' => (object) []
];

foreach(getGenres($database->connection) as $genreKey => $genre) {
    $sql = "SELECT serie_genre.GenreID, serie.*
    FROM serie_genre
    JOIN serie ON serie_genre.SerieID = serie.SerieID
    WHERE serie_genre.GenreID = :genreID;";
    $stmt = $database->connection->prepare($sql);
    $stmt->bindParam(':genreID', $genre['GenreID'], PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);   

    $keyName = $genre['GenreNaam'];
    $return->genres->$keyName = $results;
}

echo json_encode($return);