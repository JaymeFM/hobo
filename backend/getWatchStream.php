<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function getWatchStream($connection, $email, $password, $serieId) {
    $sql = "SELECT * FROM klant WHERE email = :email AND password = :password";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();
    $KlantNr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['KlantNr'];

    $sql = "SELECT *
            FROM aflevering
            WHERE SeizID IN (
                SELECT SeizoenID
                FROM seizoen
                WHERE SerieID = :serieId
            )
            ORDER BY Rang ASC
            LIMIT 1;";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':serieId', $serieId, PDO::PARAM_INT);
    $stmt->execute();
    $AfleveringID = $stmt->fetch(PDO::FETCH_ASSOC)['AfleveringID'];
    
    $sql = "INSERT INTO stream (KlantID, AflID, d_start, d_eind, IP) 
            VALUES (:KlantNr, :AfleveringID, NOW(), NOW(), 6);";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->bindValue(':AfleveringID', $AfleveringID, PDO::PARAM_INT);
    $stmt->execute();

    $lastInsertId = $connection->lastInsertId();

    $sql = "SELECT * FROM stream WHERE StreamID = :lastInsertId";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':lastInsertId', $lastInsertId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$response = getWatchStream($database->connection, $entityBody['email'], $entityBody['password'], $entityBody['serieId']);
echo json_encode($response);