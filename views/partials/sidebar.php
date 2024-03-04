<!-- Sidebar container -->
<div class="p-2 bg-zinc-950/85 w-60 flex flex-col hidden md:flex" id="sideNav">
    <nav>
        <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="userHomePage.php">
            <i class="fas fa-home mr-3 text-gray-500"></i>Home
        </a>
        <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="pastDue.php">
            <i class="fa-regular fa-clock mr-3 text-gray-500"></i>Past Due
        </a>
        <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="today.php">
            <i class="fa-solid fa-inbox mr-3 text-gray-500"></i>Today
        </a>
        <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="upcoming.php">
            <i class="fa-regular fa-circle-right mr-3 text-gray-500"></i>Up Coming
        </a>
        <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="favorites.php">
            <i class="fa-solid fa-star mr-3 text-gray-500"></i>Favorites
        </a>

        <!-- separation border -->

        <p class="block text-zinc-500 py-2.5 px-2 ml-1 my-2 mt-10 text-sm font-semibold" >
            My lists
        </p>
        <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2 mx-2 mb-6"></div>

        <p class="block text-gray-200 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-zinc-900/80 hover:cursor-pointer font-medium" id="createListBtn">
            <i class="fa-solid fa-plus mr-4"></i>New List
        </p>

        <!-- List of user's lists -->
        <?php foreach ($users_lists as $user_list) : ?>
            <?php
            // Get the task count for the current list
            $task_count = get_task_count_for_list($user_list['list_id']);
            ?>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-zinc-900/85 hover:text-white flex justify-between items-center" href="list.php?listID=<?= htmlspecialchars($user_list['list_id']) ?>">
                <span><i class="fa-solid fa-list-ul mr-2 text-gray-500 text-sm"></i><?= htmlspecialchars($user_list['list_name']) ?></span>
                <?php if ($task_count > 0) : ?>
                    <span class="text-red-800 font-semibold ml-auto"><?= $task_count ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>


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