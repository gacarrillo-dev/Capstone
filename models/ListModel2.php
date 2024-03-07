<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

/**
 * Creates a new user in the database.
 *
 * @param string $list_name - The name of the list created.
 * @param boolean $is_favorite - Boolean if the list is favorite.
 * @param string $user_id - The ID of the user adding the list for access permission.
 * @return void $error_message - A message indicating the status of the user creation process.
 */
function createList($list_name, $is_favorite, $user_id)
{
    global $db;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('INSERT INTO lists (user_id, list_name, is_favorite) VALUES (:user_id, :list_name,:is_favorite)');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':list_name', $list_name);
        $stmt->bindParam(':is_favorite', $is_favorite);

        if ($stmt->execute()) {
            // Get the ID of the last inserted row
            $list_id = $db->lastInsertId();

            $permission_type = 1;
            $stmt = $db->prepare('INSERT INTO users_lists (user_id, list_id, permission_type) VALUES (:user_id,:list_id, :permission_type)');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':list_id', $list_id);
            $stmt->bindParam(':permission_type', $permission_type);
            $stmt->execute();

            $error_message = "List created successfully. " . $list_id;

        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "List Creation failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
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
function updateList($list_id, $list_name)
{
    global $db;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('UPDATE lists SET list_name = :list_name WHERE list_id = :list_id');
        $stmt->bindParam('list_id', $list_id);
        $stmt->bindParam('list_name', $list_name);
        if ($stmt->execute()) {
            $error_message = "List updated successfully.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "List update failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}

/**
 * Function to ge the count of tasks for a given list ID
 *
 * @param int $list_id - The ID of the list getting task count for.
 * @return int task_count - Return the task count.
 */
function get_task_count_for_list($list_id) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) 
                                AS task_count
                                FROM tasks WHERE (list_id = ? AND is_completed = 0)");
    $stmt->execute([$list_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['task_count'];
}

function shareList($user_id, $list_id){

    global $db;
    $permission_type = 1;

    $error_message = "";

    try{
        $stmt = $db->prepare('INSERT INTO users_lists (user_id, list_id, permission_type) VALUES (:user_id,:list_id, :permission_type)');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':list_id', $list_id);
        $stmt->bindParam(':permission_type', $permission_type);

        if($stmt->execute())
        {
            $error_message = "List shared successfully.";
        }
        else{
            $error_message = "List not shared." . $list_id;
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }

}

/**
 * Function to get the user's list of tasks
 *
 * @param int $user_id - The ID of the user to get the list for.
 * @return array - Return the user's lists.
 */
function get_users_lists($user_id) {
    global $db;

    $permission_type = 1;
    $stmt = $db->prepare("SELECT users_lists.*, lists.list_name FROM users_lists JOIN lists ON users_lists.list_id = lists.list_id WHERE users_lists.user_id = :user_id AND users_lists.permission_type = :permission_type");

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':permission_type', $permission_type);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Function to get the list of tasks.
 *
 * @param int $list_id - The ID of the list getting tasks for.
 * @return array - Return the list of tasks.
 */
function get_list_info($list_id) {
    global $db;
    $stmt = $db->prepare("SELECT * from lists WHERE list_id = :list_id");
    $stmt->bindParam(':list_id', $list_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
