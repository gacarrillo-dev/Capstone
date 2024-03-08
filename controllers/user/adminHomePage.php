<?php
require ('../../models/TaskModel2.php');
require ('../../models/ListModel2.php');
require ('../../models/AdminModel.php');
require ('../../models/UserModel.php');

$heading = "Admin Homepage";

session_start();

$user_id = $_SESSION['user_id'];
$user_info = findUserById($user_id);
$recentUsers = getRecentUsersCreated();

// Check if the user has admin privileges
if ($_SESSION['user_level'] !== 1) {
    // Display an error message
    $error_message = "You do not have access to view page.";
    require('../../views/error.view.php');
    exit();
}

require ('../../views/adminHomePage.view.php');

