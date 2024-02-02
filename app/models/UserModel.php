<?php

// global $db originate from /db.php
include(__DIR__ . '/../config/db.php');

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

    $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->bindParam(':id', $id);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}


/**
 * Creates a new user in the database.
 *
 * @param string $username - The username of the new user.
 * @param string $password - The password of the new user.
 * @param string $email - The email of the new users.
 * @param string $firstName - The first name of the user.
 * @param string $lastName - The last name of the user.
 * @param string $phoneNumber - The phone number of the user.
 * @param string $profilePicture - The profile picture of the user.
 * @param DateTime $createdAt - The timestamp of the user creation.
 * @return void $error_message - A message indicating the status of the user creation process.
 */
function createUser($username, $password, $email, $firstName, $lastName, $phoneNumber, $profilePicture, $createdAt)
{
    global $db;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare and execute the SQL query to insert the user into the database
        $stmt = $db->prepare('INSERT INTO users (username, password, email, first_name, last_name, phone_number, profile_picture, create_at) VALUES (:username, :password, :email, :firstName, :lastName, :phoneNumber, :profilePicture, :createdAt)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':profilePicture', $profilePicture);
        $stmt->bindParam(':createdAt', $createdAt);

        if ($stmt->execute()) {
            // Registration successful, you can redirect to the login page or display a success message
            header('Location: /se266/final_project/views/auth/login.php');
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
            header('Location: /se266/final_project/views/auth/login.php');
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
