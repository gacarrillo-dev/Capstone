<?php

// global $db originate from /db.php
include(__DIR__ . '/../database/db.php');

/**
 * Retrieves user data from the database based on the provided username.
 *
 * @param string $username - The username used to search for the user.
 * @return array - An array containing user details associated with the provided username.
 */
function findUserByUsername($username)
{
    global $db;

    $results = [];

    try {
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        error_log("Database query error: " . $e->getMessage());
    }

    return $results;
}


/**
 * Retrieves user data from the database based on the provided user ID.
 *
 * @param int $id - The ID used to search for the user.
 * @return array - An array containing user details associated with the provided user ID.
 */
function findUserById($id)
{
    global $db;

    $results = [];

    $stmt = $db->prepare('SELECT * FROM users WHERE user_id = :id');
    $stmt->bindParam(':id', $id);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

/**
 * Grabs the users information given the user id.
 *
 * @param $list_id
 * @return array|false
 */
function findUsersByListId($list_id)
{
    global $db;

    $results = [];

    // Prepare the SQL statement to fetch user details based on list ID
    $stmt = $db->prepare('SELECT u.* FROM users_lists ul JOIN users u ON ul.user_id = u.user_id WHERE ul.list_id = :list_id');
    $stmt->bindParam(':list_id', $list_id);

    // Execute the statement
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}


/**
 * Creates a new user in the database.
 *
 * @param string $username - The username of the new user.
 * @param string $password - The password of the new user.
 * @param string $email - The email of the new users.
 * @return void $error_message - A message indicating the status of the user creation process.
 */
function createUser($username, $email, $password)
{
    global $db;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        if ($stmt->execute()) {
            // Registration successful, you can redirect to the login page or display a success message
            header('Location: login.php');
            exit();
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
 * Updates a user's password in the database based on the provided user ID.
 *
 * @param string $username - The username of the user whose password is to be updated.
 * @param string $password - The new password for the user.
 * @return void - A message indicating the status of the password update process.
 */
function updateUserPassword($username, $password)
{
    global $db;
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    try {
        // Prepare and execute the SQL query to update the user's password in the database
        $stmt = $db->prepare('UPDATE users SET password = :password WHERE username = :username');
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':username', $username);
        if ($stmt->execute()) {
            // Password update successful, you can redirect to the login page or display a success message
            header('Location: resetPasswordForm.php');
            exit();
        } else {
            // Password update failed for some other reason, show an error message
            $error_message = "Password update failed. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}

/**
 * Retrieves user data from the database based on the provided email.
 *
 * @param string $email - The email used to search for the user.
 * @return array - An array containing user details associated with the provided email.
 */
function findUserByEmail($email){
    global $db;
    $results = [];

    try {
        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        error_log("Database query error: " . $e->getMessage());
    }

    return $results;
}

/** Function to search users in the database.
 *
 * @param string $keyword - The search query to find user.
 * @return array - Return the array of users matching the keyword.
 */
function searchUsers($keyword, $keyword2, $keyword3)
{
    global $db;

    $results = [];

    //prepare the SQL statement to search for users
    $stmt = $db->prepare('SELECT *
                         FROM users
                         WHERE (username LIKE :keyword OR email LIKE :keyword2 OR name LIKE :keyword3)');
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
 * Function to update the user information.
 *
 * @param $user_id - The id of the user that needs to be updated
 * @param $name - The user's name.
 * @param $email - The user's email.
 * @param $phone_number - The user's phone number.
 * @return void
 */
function updateUser($user_id, $name, $email, $phone_number)
{
    global $db;

    $error_message = "";

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('UPDATE users SET name = :name, email = :email, phone_number = :phone_number WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        if ($stmt->execute()) {
            $error_message = "Information Saved.";
        } else {
            // Registration failed for some other reason, show an error message
            $error_message = "Information Save Failed.";
        }
    } catch (PDOException $e) {
        // Handle any database-related exceptions
        $error_message = "Database error: " . $e->getMessage();
    }
}