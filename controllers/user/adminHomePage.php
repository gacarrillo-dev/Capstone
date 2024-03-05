<?php
require ('../../models/TaskModel2.php');
require ('../../models/ListModel2.php');

$heading = "Admin Homepage";

session_start();

$user_id = $_SESSION['user_id'];

$users_lists = get_users_lists($user_id);

require ('../../views/adminHomePage.view.php');

