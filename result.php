<?php
require_once "methods/database.php";
include_once "methods/searchfunction.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name_query = $_POST["name_query"];
    $genre_query = $_POST["genre_query"];

    $database = new Database();
    $results = searchItems($database->connection, $name_query,$genre_query);
    
    foreach ($results as $result) {
        echo "<p>Title: {$result['SerieTitel']} | Genre: {$result['GenreNaam']}</p>"; 
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
