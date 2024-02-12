<?php
session_start();

// Check if the user is already logged in, if so, redirect to search.php
if (isset($_SESSION['user_id'])) {
    /**
     * TODO: Change location to correct path.
     */
    header('Location: /se266/final_project/views/tasks/view_tasks.php');
    exit();
}

// Include the file for database connection and user model
include(__DIR__ . '/../../config/db.php');
include(__DIR__ . '/../../models/UserModel.php');

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- cdn link for tailwindcss -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6 space-y-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center">Login Page</h1>
        <p class="text-center"><a href="register.php" class="text-blue-500">Register</a></p>
        <form method="post" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <input type="submit" name="login" value="Login" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
            </div>
            <div>
                <input type="submit" name="cancel" value="Cancel" class="w-full px-4 py-2 text-gray-600 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-500">
            </div>
        </form>
        <?php if (isset($error_message)) : ?>
            <p style="color: red;" class="text-red-500"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</div>
</body>

</html>