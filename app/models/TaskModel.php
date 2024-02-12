<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

function getTasks () { //CRUD operation to obtain task data from database
    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT task_id, list_id, title, description, due_date, is_favorite, created_at, updated_at From tasks ORDER BY due_date")

    if ($stmt->execute() && $stmt->rowcount() > 0 ) {
        $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    return($results);
}

function addTask ($t, $d, $dd, $isf){ //CRUD operation to add new task to database
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

function deleteTask ($task_id){ //CRUD operation to delete task from database
    global $db;
    $results = [];
    $sql = "DELETE FROM tasks WHERE task_id = :task_id";
    $stmt = $db->prepare("DELETE FROM tasks WHERE task_id = :task_id")
    $binds = array(
        ":task_id" => $task_id
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Deleted';
    }
    return ($results);
}

function updateTask ($task_id, $title, $description, $due_date, $is_favorite, $created_at, $updated_at){ //CRUD operation to update task from database
    $results = [];
    $sql = "UPDATE tasks SET title = :t, description = :d, due_date = :dd, is_favorite = :isf WHERE task_id = task_id";
    $stmt = $db->prepare("UPDATE tasks SET title = :t, description = :d, due_date = :dd, is_favorite = :isf WHERE task_id = :task_id");
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


function searchTasks($user_id, $title, $due_date, $is_favorite) //Search function to search tasks in the database
    global $db;
    $results = [];
    $binds = array();
    
    $sql =  "SELECT * FROM  tasks WHERE user_id=user_id";

    if ($title != "") {
        $sql .= " AND title LIKE :title";
        $binds['title'] = '%'.$title.'%';
    }

    if ($due_date != "") {
        $sql .= " AND due_date LIKE :due_date";
        $binds['due_date'] = '%'.$due_date.'%';
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
/**
 * TODO: Create model representing capstone project.
 */
