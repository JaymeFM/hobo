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
function getHistory($connection, $KlantNr) {
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

function getFavorite($connection, $KlantNr) {
    $sql = "SELECT 
                s.*,
                SUM(a.Duur) AS TotalDuration
            FROM 
                stream str
            JOIN 
                aflevering a ON str.AflID = a.AfleveringID
            JOIN 
                seizoen sez ON a.SeizID = sez.SeizoenID
            JOIN 
                serie s ON sez.SerieID = s.SerieID
            WHERE 
                str.KlantID = :KlantNr
            GROUP BY 
                s.SerieID
            ORDER BY 
                TotalDuration DESC
            LIMIT 1;";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getGlobal($connection, $KlantNr) {
    $sql = "SELECT 
                SUM(a.Duur) AS TotalWatchTime,
                AVG(a.Duur) AS AverageWatchSession
            FROM 
                stream s
            JOIN 
                aflevering a ON s.AflID = a.AfleveringID
            WHERE 
                s.KlantID = :KlantNr  -- Replace ? with the specific KlantNr
            GROUP BY 
                s.KlantID;";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

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


// RETURN RESULTS
$entityBody = json_decode(file_get_contents('php://input'), true);
$email = $entityBody['email'];
$password = $entityBody['password'];

$KlantNr = validyUser($database->connection, $email, $password);

if($KlantNr) {
    $return = (object) [
        'history' => getHistory($database->connection, $KlantNr),
        'stats' => (object) [
            'favorite' => getFavorite($database->connection, $KlantNr)[0],
            'global' => getGlobal($database->connection, $KlantNr)[0]
        ]
    ];

    echo json_encode($return);
}