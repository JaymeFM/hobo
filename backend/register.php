<?php

// CORS
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

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

$entityBody = json_decode(file_get_contents('php://input'), true);

if(validy($entityBody['voornaam']) && validy($entityBody['achternaam']) && validy($entityBody['email']) && validy($entityBody['password']) && validy($entityBody['confirmPassword'])) {
    if($entityBody['password'] == $entityBody['confirmPassword']) {
        $response = new Response(true);
        echo json_encode($response);
    } else {
        $response = new Response(false, 'Passwords do not match');
        echo json_encode($response);
    }
} else {
    $response = new Response(false, 'Missing fields');
    echo json_encode($response);
}