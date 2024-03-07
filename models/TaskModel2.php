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
    $stmt = $db->prepare("SELECT * 
                                from tasks 
                                WHERE (list_id = :list_id AND is_completed = 0)");
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
            $error_message = "Task updated successfully.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "Update failed failed. Please try again.";
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

/**
 * Function to get user's favorite tasks
 *
 * @param int $user_id - The ID of the user.
 * @return array - Return the task info.
 */
function findFavoriteTasksByUserId($user_id)
{
    global $db;

    $results = [];

    // Prepare the SQL statement to fetch favorite tasks based on user ID
    $stmt = $db->prepare('SELECT t.*, l.list_name
                                FROM tasks t JOIN users_lists ul ON t.list_id = ul.list_id
                                JOIN lists l ON t.list_id = l.list_id
                                WHERE ul.user_id = :user_id AND t.is_favorite = 1 AND t.is_completed = 0');
    $stmt->bindParam(':user_id', $user_id);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}


/**
 * Function to get user's completed tasks
 *
 * @param int $user_id - The ID of the user.
 * @return array - Return the task info.
 */
function findCompletedTasksByUserId($user_id)
{
    global $db;

    $results = [];

    // Prepare the SQL statement to fetch favorite tasks based on user ID
    $stmt = $db->prepare('SELECT t.*, l.list_name
                                FROM tasks t JOIN users_lists ul ON t.list_id = ul.list_id
                                JOIN lists l ON t.list_id = l.list_id
                                WHERE ul.user_id = :user_id AND t.is_completed = 1
                                ORDER BY t.updated_at DESC ');
    $stmt->bindParam(':user_id', $user_id);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}


/**
 * Function to get user's past due tasks.
 *
 * @param int $user_id - The ID of the user.
 * @return array - Return the task info.
 */
function findPastDueTasksForUser($user_id)
{
    global $db;

    $results = [];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Prepare the SQL statement to fetch past due tasks
    $stmt = $db->prepare('SELECT t.*, l.list_name
                          FROM tasks t
                          INNER JOIN lists l ON t.list_id = l.list_id
                          INNER JOIN users_lists ul ON l.list_id = ul.list_id
                          WHERE (ul.user_id = :user_id AND ul.permission_type = 1 AND t.is_completed = 0)
                          AND DATE(t.due_date) < :current_date 
                          ORDER BY  t.due_date');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':current_date', $currentDate);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}


/**
 * Function to get user's tasks that are due today.
 *
 * @param int $user_id - The ID of the user.
 * @return array - Return the task info.
 */
function findTasksDueTodayForUser($user_id)
{
    global $db;

    $results = [];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Prepare the SQL statement to fetch tasks due today
    $stmt = $db->prepare('SELECT t.*, l.list_name
                          FROM tasks t
                          INNER JOIN lists l ON t.list_id = l.list_id
                          INNER JOIN users_lists ul ON l.list_id = ul.list_id
                          WHERE (ul.user_id = :user_id AND ul.permission_type = 1 AND t.is_completed = 0)
                          AND DATE(t.due_date) = :current_date');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':current_date', $currentDate);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

/**
 * Function to get user's tasks due in the next 7 days
 *
 * @param int $user_id - The ID of the user.
 * @return array - Return the task info.
 */
function findTasksDueNextSevenDaysForUser($user_id)
{
    global $db;

    $results = [];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the date 7 days from now
    $sevenDaysLater = date('Y-m-d', strtotime('+7 days', strtotime($currentDate)));

    // Prepare the SQL statement to fetch tasks due in the next 7 days
    $stmt = $db->prepare('SELECT t.*, l.list_name
                          FROM tasks t
                          INNER JOIN lists l ON t.list_id = l.list_id
                          INNER JOIN users_lists ul ON l.list_id = ul.list_id
                          WHERE (ul.user_id = :user_id AND ul.permission_type = 1)
                          AND (DATE(t.due_date) > :current_date AND DATE(t.due_date) <= :seven_days_later AND t.is_completed = 0)
                          ORDER BY  t.due_date');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':current_date', $currentDate);
    $stmt->bindParam(':seven_days_later', $sevenDaysLater);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

/**
 * Function to get user's results for a search
 *
 * @param int $user_id - The ID of the user.
 * @param string $keyword - The search query from user.
 * @return array - Return the task info.
 */
function searchTasks($user_id, $keyword, $keyword2, $keyword3)
{
    global $db;

    $results = [];

    // Prepare the SQL statement to search for tasks
    $stmt = $db->prepare('SELECT t.*, l.list_name
                          FROM tasks t
                          INNER JOIN lists l ON t.list_id = l.list_id
                          INNER JOIN users_lists ul ON l.list_id = ul.list_id
                          WHERE (ul.user_id = :user_id AND ul.permission_type = 1)
                          AND (t.title LIKE :keyword  OR t.description LIKE :keyword2 OR l.list_name LIKE :keyword3)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->bindValue(':keyword2', '%' . $keyword2 . '%');
    $stmt->bindValue(':keyword3', '%' . $keyword3 . '%');

    // Execute the statement
    if ($stmt->execute()) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

/**
 * Completes a task in the database.
 *
 *  @param string $task_id - The is for the list the task is being created for.
 *  @return void $error_message - A message indicating the status of the user creation process
 */
function completeTask($task_id)
{
    global $db;

    $is_completed = 1;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('UPDATE tasks SET is_completed = :is_completed WHERE task_id = :task_id');
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':is_completed', $is_completed);

        if ($stmt->execute()) {
            $error_message = "Task updated successfully.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "Update failed failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}





