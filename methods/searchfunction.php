<?php


function searchItems($connection,$name_query) {
    $sql = "SELECT * FROM serie WHERE 1=1";

    if (!empty($name_query)) {
        $sql .= " AND SerieTitel LIKE :name";
    }

    $stmt = $connection->prepare($sql);

    if (!empty($name_query)) {
        $stmt->bindValue(':name', "%$name_query%", PDO::PARAM_STR);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


?>