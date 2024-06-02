<?php


function searchItems($connection,$name_query, $genre_query) {
    $sql = "SELECT * FROM serie
    LEFT JOIN serie_genre ON serie.SerieID = serie_genre.SerieID
    LEFT JOIN genre ON serie_genre.GenreID = genre.GenreID
    WHERE 1=1";

    if (!empty($name_query)) {
        $sql .= " AND serie.SerieTitel LIKE :name";
    }

    if(!empty($genre_query)){
        $sql .=" AND genre.GenreID = :genre";
    }

    $stmt = $connection->prepare($sql);

    if (!empty($name_query)) {
        $stmt->bindValue(':name', "%$name_query%", PDO::PARAM_STR);
    }

    if (!empty($genre_query)) {
        $stmt->bindValue(':genre', $genre_query, PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

?>