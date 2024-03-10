<?php
require('../../models/TaskModel.php');
require('../../models/ListModel.php');
require ('../../models/UserModel.php');

$heading = "Completed";

session_start();

$user_id = $_SESSION['user_id'];

$users_lists = get_users_lists($user_id);
$user_info = findUserById($user_id);
$viewListID = filter_input(INPUT_GET, "listID");
$tasks = get_tasks($viewListID);
$listInfo = get_list_info($viewListID);
$sharedUsers = findUsersByListId($viewListID);
$sharedUsersList = implode(', ', array_column($sharedUsers, 'username'));
$completed = findCompletedTasksByUserId($user_id);


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
    header("Refresh:0");
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
    header("Refresh:0");
    exit();
}

//delete task
if(isset($_POST['deleteTask'])){
    $id = filter_input(INPUT_POST, 'taskIdEditHidden');
    deleteTask($id);

    // reload the page data
    header("Refresh:0");
    exit();
}

//delete List
if(isset($_POST['deleteList'])){
    $listID = filter_input(INPUT_GET, "listID");
    $userID = $_SESSION['user_id'];
    deleteList($userID, $listID);

    // reload the page data
    header('Location: today.php');
    exit();
}

//Update a task
if (isset($_POST['updateTask'])) {
    $task_id = intval(filter_input(INPUT_POST, 'taskIdEditHidden'));
    $updateTitle = filter_input(INPUT_POST, 'updateTitle');
    $updateDescription = filter_input(INPUT_POST, 'updateDescription');
    $updateDueDate = filter_input(INPUT_POST, 'updateDueDate');

    if (filter_input(INPUT_POST, 'updateIsFavorite') == null){
        $updateIsFavorite = 0;
    }
    else{
        $updateIsFavorite = filter_input(INPUT_POST, 'updateIsFavorite');
    }

    // call update a task function from task model
    updateTask($task_id, $updateTitle, $updateDescription, $updateDueDate, $updateIsFavorite);

    // reload the page data
    header("Refresh:0");
    exit();
}


require ('../../views/completed.view.php');