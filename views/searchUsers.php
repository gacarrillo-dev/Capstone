<?php
session_start();
require('../views/partials/head.php');
require('../models/UserModel.php');

// Initialize variables
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST["submit"])) {
        // Extract form data
        $username = $_POST["search_username"];
        $email = $_POST["search_email"];

        // Call searchUsers function
        $search_results = searchUsers($username, $email);
    }
}
?>

<main class="">
    <!-- Include create task modal -->
    <?php require('../views/partials/createTaskModal.php'); ?>
    <!-- Include create list modal -->
    <?php require('../views/partials/createListModal.php'); ?>

    <!-- Page container -->
    <div class="flex flex-col h-screen bg-zinc-900">

        <!-- Top bar -->
        <?php require ('../views/partials/topbar.php'); ?>

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

                <!-- Container for the search form -->
                <div class="mt-4">
                    <!-- Search form -->
                    <form action="searchUsers.php" method="POST">

                        <label for="search_username" class="block text-gray-300 font-medium">Search by Username:</label>
                        <input type="text" id="search_username" name="search_username" class="form-input">

                        <label for="search_email" class="block text-gray-300 font-medium mt-2">Search by Email:</label>
                        <input type="email" id="search_email" name="search_email" class="form-input">

                        <br>

                        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Search</button>
                    </form>

                    <!-- Back button -->
                    <a href="../views/adminHomePage.view.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back</a>

                    <!-- Display search results -->
                    <?php if (!empty($search_results)) : ?>
                        <div class="mt-4">
                            <h2 class="text-lg font-medium text-gray-300">Search Results:</h2>
                            <ul class="text-gray-300 mt-2">
                                <?php foreach ($search_results as $user) : ?>
                                    <li>
                                        <?= $user['username'] ?> - <?= $user['email'] ?>
                                        <!-- Edit button -->
                                        <a href="../views/editUsers.php?id=<?= $user['id'] ?>" class="text-blue-500 ml-2">Edit</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</main>

<script src="../public/assets/js/scripts.js"></script>

<?php require('../views/partials/footer.php'); ?>