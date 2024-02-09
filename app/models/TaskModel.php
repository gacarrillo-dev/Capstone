<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

function getTasks () {
    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT task_id, list_id, title, description, due_date, is_favorite, created_at, updated_at From tasks ORDER BY due_date")

    if ($stmt->execute() && $stmt->rowcount() > 0 ) {
        $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    return($results);
}

function addTask ($t, $d, $dd, $if){
    global $db;
    $stmt = $db->prepare("INSERT INTO tasks SET title = :title, description = :description, due_date = :due_date, is_favorite = :is_favorite");
    $binds = array(
        ":title" => $t,
        ":description" => $d,
        ":due_date" => $dd,
        ":is_favorite" => $isf
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Added';
    }
    return ($results);
}
$tasks = getTasks();

function deleteTask ($task_id){
    global $db;
    $results = [];
    $sql = "DELETE FROM tasks WHERE task_id = ;task_id";
    $stmt = $db->prepare("DELETE FROM tasks WHERE task_id = :task_id")
    $binds = array(
        ":task_id" => $task_id
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Deleted';
    }
    return ($results);
}

function updateTask ($task_id, $title, $description, $due_date, $is_favorite, $created_at, $updated_at){
    $results = [];
    $sql = "UPDATE tasks SET title = :t, description = :d, due_date = :dd, is_favorite = :isf WHERE task_id = task_id";
    $stmt = $db->prepare("UPDATE tasks SET title = :t, description = :d, due_date = :dd, is_favorite = :isf WHERE task_id = ;task_id");
    $binds = array(
        ":title" => $t,
        ":description" => $d,
        ":due_date" => $dd,
        ":is_favorite" => $isf
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Updated';
    }
    return ($results);
}
/**
 * TODO: Create model representing capstone project.
 */
