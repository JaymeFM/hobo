<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require_once "database.php";
$database = new Database("localhost", "root", "", "hobo");

class Response {
    public $success;
    public $error;

    public function __construct($success, $error = null) {
        $this->success = $success;
        $this->error = $error;
    }
}

function validy($input) {
    if (isset($input)) {
        if (strlen($input) > 0) {
            return true;
        }
    }
    return false;
}

function isEmailUsed($connection, $email) {
    $sql = "SELECT * FROM klant WHERE Email = :email";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) > 0) {
        return true;
    } else {
        return false;
    }
}

function register($connection, $userData) {
    $sql = "INSERT INTO klant (AboID, Voornaam, Tussenvoegsel, Achternaam, Email, password, Genre) VALUES (1, :voornaam, :tussenvoegsel, :achternaam, :email, :password, 'Science Fiction')";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':voornaam', $userData['voornaam'], PDO::PARAM_STR);
    $stmt->bindValue(':tussenvoegsel', $userData['tussenvoegsel'], PDO::PARAM_STR);
    $stmt->bindValue(':achternaam', $userData['achternaam'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $userData['email'], PDO::PARAM_STR);
    $stmt->bindValue(':password', $userData['password'], PDO::PARAM_STR);

    $stmt->execute();

    return true;
}

$entityBody = json_decode(file_get_contents('php://input'), true);

if(validy($entityBody['voornaam']) && validy($entityBody['achternaam']) && validy($entityBody['email']) && validy($entityBody['password']) && validy($entityBody['confirmPassword'])) {
    if($entityBody['password'] == $entityBody['confirmPassword']) {
        if(!isEmailUsed($database->connection, $entityBody['email'])) {
            $succes = register($database->connection, $entityBody);
            if($succes) {
                $response = new Response(true);
                echo json_encode($response);
            } else {
                $response = new Response(false, 'Something went wrong');
                echo json_encode($response);
            }
        } else {
            $response = new Response(false, 'Email already in use');
            echo json_encode($response);
        }
    } else {
        $response = new Response(false, 'Passwords do not match');
        echo json_encode($response);
    }
} else {
    $response = new Response(false, 'Missing fields');
    echo json_encode($response);
}