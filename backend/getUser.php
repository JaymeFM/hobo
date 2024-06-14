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
    public $data;

    public function __construct($success, $dataOrError = null) {
        $this->success = $success;
        
        if ($success) {
            $this->data = $dataOrError;
            $this->error = null;
        } else {
            $this->error = $dataOrError;
            $this->data = null;
        }
    }
}

function getUser($connection, $email, $password) {
    if(!empty($email) && !empty($password)) {

        $sql = "SELECT * FROM klant WHERE email = :email AND password = :password";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0) {
            return new Response(true, $results);
        }

        return new Response(false, 'No Data');
    }

    return new Response(false, 'Missing data');;
}

$entityBody = json_decode(file_get_contents('php://input'), true);
$response = getUser($database->connection, $entityBody['email'], $entityBody['password']);
echo json_encode($response);