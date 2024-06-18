<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function updateSerie($connection, $SerieID, $data) {

    $sql = "UPDATE serie
            SET
                SerieTitel = :SerieTitel,
                IMDBLink = :IMDBLink,
                Actief = :Actief,
                TrailerVideo = :TrailerVideo,
                description = :description
            WHERE SerieID = :SerieID";
    $stmt = $connection->prepare($sql);

    $SerieTitel = $data['SerieTitel'];
    $IMDBLink = $data['IMDBLink'];
    $Actief = $data['Actief'];
    $TrailerVideo = $data['TrailerVideo'];
    $description = $data['description'];

    $stmt->bindParam(':SerieID', $SerieID, PDO::PARAM_INT);
    $stmt->bindParam(':SerieTitel', $SerieTitel, PDO::PARAM_STR);
    $stmt->bindParam(':IMDBLink', $IMDBLink, PDO::PARAM_STR);
    $stmt->bindParam(':Actief', $Actief, PDO::PARAM_STR);
    $stmt->bindParam(':TrailerVideo', $TrailerVideo, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    $stmt->execute();
    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = updateSerie($database->connection, $entityBody['SerieID'], $entityBody['data']);
echo json_encode($results);