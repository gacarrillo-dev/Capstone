<?php

$heading = "Registration";

// Include the database connection and user model
require ('../../models/UserModel.php');

// Start or resume the sessions
session_start();

$error_message = "";

//Check if the form is submitted for user registration
if (isset($_POST[''])) {
    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    // Check if the username already exists
    $existingUser = findUserByUsername($username);

    if (!empty($existingUser)) {
        // Username already exists, set an error message
        $error_message = "Username already exists. Please try a different username.";
    }
    //check if username and password are empty
    if (empty($username) || empty($email) || empty($password)) {
        $error_message = 'Username, Email, and Password are required';
    }
} elseif (isset($_POST['Cancel'])) {
    // Redirect to the login page if the 'Cancel' button is pressed
    /**
     * TODO: Change location to correct path.
     */
    header('Location: login.php');
}

// If the for is sumbitted and no error exists, proceed to user creation
if (isset($_POST['Register']) && (empty($error_message))) {
    // Call the createUser() function to insert the user into the database
    createUser($username, $email, $password);
    // Redirect to the login page after successful user creation
    /**
     * TODO: Change location to correct path.
     */
    header('Location: login.php');
}
require ('../../views/auth/register.view.php');