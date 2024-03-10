<?php
require('../../models/TaskModel.php');
require('../../models/ListModel.php');
require ('../../models/UserModel.php');

$heading = "User Homepage";

session_start();

$user_id = $_SESSION['user_id'];
$user_info = findUserById($user_id);
$users_lists = get_users_lists($user_id);


//Create a task
if (isset($_POST['createTask'])) {
    $list_id = intval(filter_input(INPUT_POST, 'list_id'));
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $dueDate = filter_input(INPUT_POST, 'dueDate');

    if (filter_input(INPUT_POST, 'isFavorite') == null){
        $isFavorite = 0;
    }
    else{
        $isFavorite = filter_input(INPUT_POST, 'isFavorite');
    }


    // call create a task function from task model
    createTask($list_id, $title, $description, $dueDate, $isFavorite);

    // reload the page data
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


//create a List
if (isset($_POST['createList'])){

    $listName = filter_input(INPUT_POST, 'listName');
    if (filter_input(INPUT_POST, 'isFavoriteList') == null){
        $isFavoriteList = 0;
    }
    else{
        $isFavoriteList = filter_input(INPUT_POST, 'isFavoriteList');
    }

    // call the create a list function from list model
    createList($listName, $isFavoriteList, $user_id);

    // reload the page data
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


require ('../../views/userHomePage.view.php');

