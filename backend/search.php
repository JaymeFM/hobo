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
function getData($connection, $search, $genre) {
    $sql = "SELECT serie.SerieID, serie.SerieTitel, GROUP_CONCAT(genre.GenreNaam SEPARATOR ', ') AS GenreNamen
            FROM serie
            LEFT JOIN serie_genre ON serie.SerieID = serie_genre.SerieID
            LEFT JOIN genre ON serie_genre.GenreID = genre.GenreID
            WHERE Actief=1";

    if (!empty($search)) {
        $sql .= " AND serie.SerieTitel LIKE :name";
    }

    if (!empty($genre)) {
        $sql .= " AND genre.GenreNaam LIKE :genre";
    }

    $sql .= " GROUP BY serie.SerieTitel";

    $stmt = $connection->prepare($sql);

    if (!empty($search)) {
        $stmt->bindValue(':name', "%$search%", PDO::PARAM_STR);
    }

    if (!empty($genre)) {
        $stmt->bindValue(':genre', "%$genre%", PDO::PARAM_STR);
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $results;
}

// RETURN RESULTS
$entityBody = json_decode(file_get_contents('php://input'), true);
$results = getData($database->connection, $entityBody['search'], $entityBody['genre']);
echo json_encode($results);


// function searchItems($connection, $name_query, $genre_query) {
//     $sql = "SELECT serie.SerieTitel, GROUP_CONCAT(genre.GenreNaam SEPARATOR ', ') AS GenreNamen
//             FROM serie
//             LEFT JOIN serie_genre ON serie.SerieID = serie_genre.SerieID
//             LEFT JOIN genre ON serie_genre.GenreID = genre.GenreID
//             WHERE 1=1";

//     if (!empty($name_query)) {
//         $sql .= " AND serie.SerieTitel LIKE :name";
//     }

//     if (!empty($genre_query)) {
//         $sql .= " AND genre.GenreNaam LIKE :genre";
//     }

//     $sql .= " GROUP BY serie.SerieTitel";

//     $stmt = $connection->prepare($sql);

//     if (!empty($name_query)) {
//         $stmt->bindValue(':name', "%$name_query%", PDO::PARAM_STR);
//     }

//     if (!empty($genre_query)) {
//         $stmt->bindValue(':genre', "%$genre_query%", PDO::PARAM_STR);
//     }

//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     return $results;
// }

// echo searchItems($database->connection, $_GET['search'], null)

?>
