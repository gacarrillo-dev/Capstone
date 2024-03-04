<?php
require ('../../models/TaskModel2.php');
require ('../../models/ListModel2.php');
require ('../../models/UserModel.php');

$heading = "View List";

session_start();

$user_id = $_SESSION['user_id'];

$users_lists = get_users_lists($user_id);
$viewListID = filter_input(INPUT_GET, "listID");
$userSearch = filter_input(INPUT_POST, "userSearch");
$tasks = get_tasks($viewListID);
$listInfo = get_list_info($viewListID);
$sharedUsers = findUsersByListId($viewListID);
$sharedUsersList = implode(', ', array_column($sharedUsers, 'username'));
$users = searchUsers($userSearch, $userSearch, $userSearch);

//Update a task
if (isset($_POST['updateUser'])) {
    $user_id = intval(filter_input(INPUT_POST, 'userIdEditHidden'));
    $updateName = filter_input(INPUT_POST, 'name');
    $updateEmail = filter_input(INPUT_POST, 'email');
    $updatePhone = filter_input(INPUT_POST, 'phone');
    $updateUsername = filter_input(INPUT_POST, 'username');

    // call update a task function from task model
    updateUser($user_id, $updateName, $updateEmail, $updatePhone, $updateUsername);

    // reload the page data
    header("Refresh:0");
    exit();
}

require ('../../views/profile.view.php');
