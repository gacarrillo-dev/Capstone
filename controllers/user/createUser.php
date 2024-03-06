<?php
session_start();
require('../../views/partials/head.php');
require('../../models/UserModel.php'); // Include UserModel.php for createUser function

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST["submit"])) {
        // Extract form data
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user_level = $_POST["user_level"];

        // Call createUser function
        $result = createUser($username, $email, $password, $user_level);

        // Display success or error message
        if ($result === "User created successfully.") {
            $success_message = "User created successfully.";
        } else {
            $error_message = $result;
        }
    }
}
?>

<main class="">
    <!-- Include create task modal -->
    <?php require('../../views/partials/createTaskModal.php'); ?>
    <!-- Include create list modal -->
    <?php require('../../views/partials/createListModal.php'); ?>

    <!-- Page container -->
    <div class="flex flex-col h-screen bg-zinc-900">

        <!-- Top bar -->
        <?php require ('../../views/partials/topbar.php'); ?>

        <!-- Main page container -->
        <div class="flex-1 flex">

            <!-- Sidebar -->
            <!-- Sidebar container -->
            <div class="p-2 bg-zinc-950/85 w-60 flex flex-col hidden md:flex" id="sideNav">
                <nav>
                    <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="#">
                        <i class="fas fa-home mr-3 text-gray-500"></i>Home
                    </a>
                    <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="#">
                        <i class="fa-solid fa-inbox mr-3 text-gray-500"></i>Today
                    </a>
                    <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="#">
                        <i class="fa-regular fa-circle-right mr-3 text-gray-500"></i>Up Coming
                    </a>
                    <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="#">
                        <i class="fas fa-users mr-3 text-gray-500"></i>Shared
                    </a>

                    <!-- separation border -->


                </nav>

                <!-- Log out Section -->
                <a class="block text-gray-200 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white mt-auto" href="logout.php">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log out
                </a>

                <!-- bottom border -->
                <!--                    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>-->

                <!-- Footer? -->
                <!--                    <p class="mb-1 px-5 py-3 text-left text-xs text-gray-400">Copyright do it. @ 2024</p>-->

            </div>

            <!-- Main content -->
            <div class="flex-1 p-4">

                <div class="block text-gray-300 font-medium text-lg"><?= $_SESSION['username'] . "'s Homepage" ?></div>
                <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

                <!-- Container for the create user form -->
                <div class="mt-4">
                    <!-- Create user form -->
                    <form action="createUser.php" method="POST">
                        <label for="username" class="block text-gray-300 font-medium">Username:</label>
                        <input type="text" id="username" name="username" class="form-input">

                        <label for="email" class="block text-gray-300 font-medium mt-2">Email:</label>
                        <input type="email" id="email" name="email" class="form-input">

                        <label for="password" class="block text-gray-300 font-medium mt-2">Password:</label>
                        <input type="password" id="password" name="password" class="form-input">

                        <label for="user_level" class="block text-gray-300 font-medium mt-2">User Level:</label>
                        <input type="user_level" id="user_level" name="user_level" class="user_level">

                        <br>

                        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Create User</button>
                    </form>

                    <!-- Back button -->
                    <a href="../../views/adminHomePage.view.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back</a>
                    
                    <!-- Display success message if user creation was successful -->
                    <?php if (isset($success_message)) : ?>
                        <div class="mt-4 text-green-500"><?= $success_message ?></div>
                    <?php endif; ?>

                    <!-- Display error message if user creation failed -->
                    <?php if (isset($error_message)) : ?>
                        <div class="mt-4 text-red-500"><?= $error_message ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../../public/assets/js/scripts.js"></script>

<?php require('../../views/partials/footer.php'); ?>