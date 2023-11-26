<?php
// Include the database connection and user model
include(__DIR__ . '/../../config/db.php');
include(__DIR__ . '/../../models/UserModel.php');

// Start or resume the session
session_start();

$error_message = "";

//Check if the form is submitted for user registration
if (isset($_POST['Register'])) {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    // Check if the username already exists
    $existingUser = findUserByUsername($username);

    if (!empty($existingUser)) {
        // Username already exists, set an error message
        $error_message = "Username already exists. Please try a different username.";
    }
    //check if username and password are empty
    if (empty($username) || empty($password)) {
        $error_message = 'Username and Password are required';
    }
} elseif (isset($_POST['Cancel'])) {
    // Redirect to the login page if the 'Cancel' button is pressed
    /**
     * TODO: Change location to correct path.
     */
    header('Location: /se266/final_project/views/auth/login.php');
}

// If the for is sumbitted and no error exists, proceed to user creation
if (isset($_POST['Register']) && (empty($error_message))) {
    // Call the createUser() function to insert the user into the database
    createUser($username, $password);
    // Redirect to the login page after successful user creation
    /**
     * TODO: Change location to correct path.
     */
    header('Location: /se266/final_project/views/auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Tailwindcss cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 space-y-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center">Registration Page</h1>
            <form method="post" action="#" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <input type="submit" name="Register" value="Register" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <input type="submit" name="Cancel" value="Cancel" class="w-full px-4 py-2 text-gray-600 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-500">
                </div>
            </form>
            <?php if (isset($_POST['Register']) && (!empty($error_message))) : ?>
                <p style="color: red;" class="text-red-500"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>