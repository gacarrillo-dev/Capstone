<?php
require ('../../database/Database.php');
require ('../../models/ListModel.php');
require ('../../models/TaskModel.php');

$heading = "User Homepage";

session_start();

$user_id = $_SESSION['user_id'];

$db = new Database();

$permission_type = 1;

$users_lists = $db->query('SELECT users_lists.*, lists.list_name FROM users_lists JOIN lists ON users_lists.list_id = lists.list_id WHERE users_lists.user_id = :user_id AND users_lists.permission_type = :permission_type', [':user_id' => $_SESSION['user_id'], ':permission_type' => $permission_type])->fetchAll();

//Create a task
if (isset($_POST['createTask'])) {
    $list_id = intval(filter_input(INPUT_POST, 'list_id'));
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $dueDate = filter_input(INPUT_POST, 'dueDate');
    $isFavorite = filter_input(INPUT_POST, 'isFavorite');

    //
    var_dump($list_id);
    addTask ($title, $list_id, $description, $dueDate, $isFavorite);
}


require ('../../views/userHomePage.view.php');

