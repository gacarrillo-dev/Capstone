<?php

$heading = "Login Page";

// Include the file for database connection and user model
require ('../../models/UserModel.php');

session_start();

// Check if the user is already logged in, if so, redirect to userHomePage.php
if (isset($_SESSION['user_id'])) {
    $user_level = $_SESSION['user_level'];
    /**
     * TODO: Change location to correct path.
     */
    if ($user_level == 2){
        header('Location: userHomePage.php');
        exit();
    }
    elseif ($user_level == 1) {
        header('Location: adminHomePage.php');
        exit();
    }
    else{
        $error_message = "Invalid user level. Please try again.";
    }
}

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
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_level'] = $user['user_level'];

            /**
             * TODO: Change location to correct path.
             */

             if ($_SESSION['user_level'] == 2){
                header('Location: userHomePage.php');
                exit();
            }
            elseif ($_SESSION['user_level'] == 1){
                header('Location: adminHomePage.php');
                exit();
            }
            else{
                $error_message = "Invalid user level. Please try again.";
            }
        } else {
            $error_message = "Invalid username or password. Please try again.";
        }
    }
} elseif (isset($_POST['cancel'])) {

    /**
     * TODO: Change location to correct path.
     */
    header('Location: index.php');
}

require ('../../views/auth/login.view.php');