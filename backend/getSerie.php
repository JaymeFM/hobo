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
function getSerie($connection) {
    $serieId = intval($_GET["serieId"]);

    $sql = "SELECT * FROM serie WHERE SerieID = :serieId";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':serieId', $serieId, PDO::PARAM_STR);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function getEpisodes($connection, $seasonId) {
    $sql = "SELECT * FROM aflevering WHERE SeizID = :seasonId";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':seasonId', $seasonId, PDO::PARAM_STR);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function getSeasons($connection) {
    $serieId = intval($_GET["serieId"]);

    $sql = "SELECT * FROM seizoen WHERE SerieID = :serieId";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':serieId', $serieId, PDO::PARAM_STR);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $key => $value) {
        $results[$key]["Episodes"] = getEpisodes($connection, $value['SeizoenID']);
    }

    return $results;
}

// RETURN RESULTS
$results = (object) [
    'serie' => getSerie($database->connection),
    'seasons' => getSeasons($database->connection),
];

echo json_encode($results);