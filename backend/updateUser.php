<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

function updateUser($connection, $KlantNr, $data) {

    $sql = "UPDATE klant
            SET
                AboID = :AboID,
                Voornaam = :Voornaam,
                Tussenvoegsel = :Tussenvoegsel,
                Achternaam = :Achternaam,
                Email = :Email,
                password = :password,
                Genre = :Genre,
                ContentManager = :ContentManager,
                Admin = :Admin
            WHERE KlantNr = :KlantNr";
    $stmt = $connection->prepare($sql);

    $AboID = $data['AboID'];
    $Voornaam = $data['Voornaam'];
    $Tussenvoegsel = $data['Tussenvoegsel'];
    $Achternaam = $data['Achternaam'];
    $Email = $data['Email'];
    $password = $data['password'];
    $Genre = $data['Genre'];
    $ContentManager = $data['ContentManager'];
    $Admin = $data['Admin'];

    $stmt->bindParam(':KlantNr', $KlantNr, PDO::PARAM_INT);
    $stmt->bindParam(':AboID', $AboID, PDO::PARAM_INT);
    $stmt->bindParam(':Voornaam', $Voornaam, PDO::PARAM_STR);
    $stmt->bindParam(':Tussenvoegsel', $Tussenvoegsel, PDO::PARAM_STR);
    $stmt->bindParam(':Achternaam', $Achternaam, PDO::PARAM_STR);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':Genre', $Genre, PDO::PARAM_STR);
    $stmt->bindParam(':ContentManager', $ContentManager, PDO::PARAM_INT);
    $stmt->bindParam(':Admin', $Admin, PDO::PARAM_INT);

    $stmt->execute();
    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$results = updateUser($database->connection, $entityBody['KlantNr'], $entityBody['data']);
echo json_encode($results);