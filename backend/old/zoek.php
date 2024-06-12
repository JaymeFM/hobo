<?php

include "methods/database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h2>Search</h2>
    <form method="post" action="result.php">
    <input type="text" name="name_query" placeholder="Zoek op naam">
    <input type="text" name="genre_query" placeholder ="zoek op genre">
    <button type="submit">Zoek</button>
</form>


</body>
</html>