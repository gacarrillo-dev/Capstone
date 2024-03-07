<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');


function findUsersByListId($list_id)
{
    global $db;

    $results = [];

    $stmt = $db->prepare('SELECT * FROM users_lists WHERE list_id = :list_id');
    $stmt->bindParam(':list_id', $list_id);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}