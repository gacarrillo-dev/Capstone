<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

/**
 * Creates a new user in the database.
 *
 * @param string $list_id - The is for the list the task is being created for.
 * @param string $title - The title of the task.
 * @param string $descripton - The description of the task.
 * @param string $due_date - The due date of the task.
 * @param boolean $is_favorite - Boolean if the task is favorited.
 * @return void $error_message - A message indicating the status of the user creation process.
 */
function createTask($list_id, $title, $description, $due_date, $is_favorite)
{
    global $db;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('INSERT INTO tasks (list_id, title, description, due_date, is_favorite) VALUES (:list_id, :title, :description, :due_date, :is_favorite)');
        $stmt->bindParam(':list_id', $list_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->bindParam(':is_favorite', $is_favorite);
        if ($stmt->execute()) {
            $error_message = "Task created successfully.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "Registration failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}

/**
 * Function to get the list of tasks.
 *
 * @param int $list_id - The ID of the list getting tasks for.
 * @return array - Return the list of tasks.
 */
function get_tasks($list_id) {
    global $db;
    $stmt = $db->prepare("SELECT * from tasks WHERE list_id = :list_id");
    $stmt->bindParam(':list_id', $list_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Function to delete the task.
 * @param int $task_id - The ID of the task getting deleted
 * @return array - return the result message
 */
function deleteTask ($task_id){ //CRUD operation to delete task from database
    global $db;
    $results = [];
    $sql = "DELETE FROM tasks WHERE task_id = :task_id";
    $stmt = $db->prepare("DELETE FROM tasks WHERE task_id = :task_id");
    $binds = array(
        ":task_id" => $task_id
    );
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Deleted';
    }
    return ($results);
}

/**
 * Updates a task in the database.
 *
 *  @param string $task_id - The is for the list the task is being created for.
 *  @param string $title - The title of the task.
 *  @param string $description - The description of the task.
 *  @param string $due_date - The due date of the task.
 *  @param boolean $is_favorite - Boolean if the task is favorited.
 *  @return void $error_message - A message indicating the status of the user creation process
 */
function updateTask($task_id, $title, $description, $due_date, $is_favorite)
{
    global $db;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('UPDATE tasks SET title = :title, description = :description, due_date = :due_date, is_favorite = :is_favorite WHERE task_id = :task_id');
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->bindParam(':is_favorite', $is_favorite);
        if ($stmt->execute()) {
            $error_message = "Task created successfully.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "Registration failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}

/**
 * Function to get task info.
 *
 * @param int $task_id - The ID of the task.
 * @return array - Return the task info.
 */
function get_task_info($task_id) {
    global $db;
    $stmt = $db->prepare("SELECT * from tasks WHERE task_id = :task_id");
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
