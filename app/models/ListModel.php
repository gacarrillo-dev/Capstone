<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

function getLists () {
    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT list_id, user_id, list_name, is_favorite, created_at, updated_at From lists ORDER BY list_name")

    if ($stmt->execute() && $stmt->rowcount() > 0 ) {
        $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    return($results);
}

function addList ($ln, $isf){
    global $db;
    $stmt = $db->prepare("INSERT INTO lists SET list_name = :list_name, is_favorite = :is_favorite");
    $binds = array(
        ":list_name" => $ln,
        ":is_favorite" => $isf
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Added';
    }
    return ($results);
}
$lists = getLists();

function deleteList ($List_id){
    global $db;
    $results = [];
    $sql = "DELETE FROM lists WHERE list_id = :list_id";
    $stmt = $db->prepare("DELETE FROM lists WHERE list_id = :list_id")
    $binds = array(
        ":list_id" => $list_id
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Deleted';
    }
    return ($results);
}

function updateList ($list_id, $user_id, $list_name, $is_favorite, $created_at, $updated_at){
    $results = [];
    $sql = "UPDATE lists SET list_name = :ln, is_favorite = :isf WHERE list_id = list_id";
    $stmt = $db->prepare("UPDATE lists SET list_name = :ln, is_favorite = :isf WHERE list_id = :list_id");
    $binds = array(
        ":list_name" => $ln,
        ":is_favorite" => $isf
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Updated';
    }
    return ($results);
}

function searchLists($list_name, $is_favorite)
{
    global $db;
    $results = [];
    $binds = array();
    
    $sql =  "SELECT * FROM  lists WHERE 0=0";
    if ($list_name != "") {
        $sql .= " AND list_name LIKE :list_name";
        $binds['list_name'] = '%'.$list_name.'%';
    }
        
    if ($is_favorite != "") {
        $sql .= " AND is_favorite = :is_favorite";
        $binds['is_favorite'] = $is_favorite;
    }

    $stmt = $db->prepare($sql);
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $results = "No results";
    }

    return $results;
}