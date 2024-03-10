<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');


/**
 * Function to grab the recently created users
 *
 * @return array
 */
function getRecentUsersCreated (): array
{
    global $db;

    $stmt = $db->prepare('SELECT *
                                FROM users
                                ORDER BY created_at DESC
                                LIMIT 5;');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}