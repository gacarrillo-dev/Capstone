<?php

$heading = "Login Page";

session_start();

// Check if the user is already logged in, if so, redirect to search.php
if (isset($_SESSION['user_id'])) {
    /**
     * TODO: Change location to correct path.
     */
    header('Location: login.php');
    exit();
}

// Include the file for database connection and user model
require ('../../database/Database.php');
require ('../../models/UserModel.php');

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Retrieve and validate user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Verify the user's credentials
        $user = findUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            /**
             * TODO: Change location to correct path.
             */
            header('Location: /se266/final_project/views/tasks/view_tasks.php');
            exit();
        } else {
            $error_message = "Invalid username or password. Please try again.";
        }
    }
} elseif (isset($_POST['cancel'])) {

    /**
     * TODO: Change location to correct path.
     */
    header('Location: /se266/final_project/public/index.php');
}

require ('../../views/auth/login.view.php');