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

function getNew($connection) {
    $sql = "SELECT *
    FROM serie
    WHERE Actief = 1
    ORDER BY serie.SerieID DESC;";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getContinue($connection, $KlantNr) {
    $sql = "SELECT *
            FROM 
                stream
            JOIN 
                aflevering ON stream.AflID = aflevering.AfleveringID
            JOIN 
                seizoen ON aflevering.SeizID = seizoen.SeizoenID
            JOIN 
                serie ON seizoen.SerieID = serie.SerieID
            WHERE 
                stream.KlantID = :KlantNr
            ORDER BY 
                stream.d_start DESC;";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// RETURN RESULTS
$entityBody = json_decode(file_get_contents('php://input'), true);

function validyUser($connection, $email, $password) {
    $sql = "SELECT * FROM klant WHERE email = :email AND password = :password";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) > 0) {
        return $results[0]['KlantNr'];
    }

    return false;
}

$return = (object) [
    'genres' => (object) [],
    'new' => getNew($database->connection),
    'continue' => [],
];

if(!empty($entityBody['email']) && !empty($entityBody['password'])) {
    $KlantNr = validyUser($database->connection, $entityBody['email'], $entityBody['password']);

    if($KlantNr) {
        $return->continue = getContinue($database->connection, $KlantNr);
    }
}

foreach(getGenres($database->connection) as $genreKey => $genre) {
    $sql = "SELECT serie_genre.GenreID, serie.*
    FROM serie_genre
    JOIN serie ON serie_genre.SerieID = serie.SerieID
    WHERE serie_genre.GenreID = :genreID AND Actief = 1; ";
    $stmt = $database->connection->prepare($sql);
    $stmt->bindParam(':genreID', $genre['GenreID'], PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);   

    $keyName = $genre['GenreNaam'];
    $return->genres->$keyName = $results;
}

// RETURN RESULTS
echo json_encode($return);
