<?php

function searchItems($connection, $name_query, $genre_query) {
    $sql = "SELECT serie.SerieTitel, GROUP_CONCAT(genre.GenreNaam SEPARATOR ', ') AS GenreNamen
            FROM serie
            LEFT JOIN serie_genre ON serie.SerieID = serie_genre.SerieID
            LEFT JOIN genre ON serie_genre.GenreID = genre.GenreID
            WHERE 1=1";

    if (!empty($name_query)) {
        $sql .= " AND serie.SerieTitel LIKE :name";
    }

    if (!empty($genre_query)) {
        $sql .= " AND genre.GenreNaam LIKE :genre";
    }

    $sql .= " GROUP BY serie.SerieTitel";

    $stmt = $connection->prepare($sql);

    if (!empty($name_query)) {
        $stmt->bindValue(':name', "%$name_query%", PDO::PARAM_STR);
    }

    if (!empty($genre_query)) {
        $stmt->bindValue(':genre', "%$genre_query%", PDO::PARAM_STR);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

?>
