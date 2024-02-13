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