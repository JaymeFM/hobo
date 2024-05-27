<?php
require_once "methods/database.php";
include_once "methods/searchfunction.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name_query = $_POST["name_query"];
    
    $database = new Database($hostname, $username, $password, $database_name);
    $results = searchItems($database->connection, $name_query);
    
    foreach ($results as $result) {
        echo "<p>{$result['SerieTitel']}</p>"; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
