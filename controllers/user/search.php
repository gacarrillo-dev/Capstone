<?php
require('../../models/TaskModel.php');
require('../../models/ListModel.php');
require ('../../models/UserModel.php');

$heading = "Searching";

session_start();

$user_id = $_SESSION['user_id'];
$user_info = findUserById($user_id);
$users_lists = get_users_lists($user_id);
$viewListID = filter_input(INPUT_GET, "listID");
//$keyword = filter_input(INPUT_GET, "query");
$tasks = get_tasks($viewListID);
$listInfo = get_list_info($viewListID);
$sharedUsers = findUsersByListId($viewListID);
$sharedUsersList = implode(', ', array_column($sharedUsers, 'username'));
//$results = searchTasks($user_id, $keyword, $keyword, $keyword);

$keyword = filter_input(INPUT_GET, "query");
$statusFilter = filter_input(INPUT_GET, "status", FILTER_SANITIZE_STRING);
$listIDFilter = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);

$results = searchTasks($user_id, $keyword, $keyword, $keyword);
// Ensure $lists is populated
$lists = get_users_lists($user_id);

// Apply filters
if ($statusFilter !== 'all') {
    $results = array_filter($results, function ($result) use ($statusFilter) {
        return ($statusFilter === 'completed' && $result['is_completed'] == 1) ||
            ($statusFilter === 'incomplete' && $result['is_completed'] == 0);
    });
}

if (!empty($listIDFilter)) {
    $results = array_filter($results, function ($result) use ($listIDFilter) {
        return $result['list_id'] == $listIDFilter;
    });
}




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
    $id = filter_input(INPUT_POST, 'taskIdHidden');
    deleteTask($id);

    // reload the page data
    header("Refresh:0");
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


require ('../../views/search.view.php');

