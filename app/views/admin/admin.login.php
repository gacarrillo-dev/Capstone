<?php
require('partials/head.php');
?>
    <main class="">

        <?php require('partials/createTaskModal.php'); ?>

        <div class="flex flex-col h-screen bg-zinc-900">

            <!-- Top bar -->
            <div class="bg-zinc-950/85 text-white shadow w-full p-2 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="hidden md:flex items-center"> <!-- only visible in smaller view -->
                        <!-- <img src="" alt="Logo" class="w-28 h-18 mr-2"> -->

                        <!-- Logo -->
                        <i class="fa-solid fa-calendar-days mr-2 ml-4 text-2xl text-red-900"></i>
                        <h2 class="font-bold text-2xl">Admin</h2>
                    </div>
                    <div class="md:hidden flex items-center"> <!-- only visible in smaller view -->
                        <button id="menuBtn">
                            <i class="fas fa-bars text-gray-400 text-lg"></i> <!-- Burger menu icon -->
                        </button>
                    </div>
                </div>

                <!-- Right side topbar -->
                <div class="space-x-5 flex flex-row">
                    <!-- Search Bar -->
                    <div class="relative max-w-md w-full">
                        <div class="absolute top-1 left-2 inline-flex items-center p-2">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input class="w-full h-10 pl-10 pr-4 py-1 text-zinc-950 text-base placeholder-gray-500 border rounded-full focus:ring focus:ring-red-800 focus:ring-opacity-80" type="search" placeholder="Searching...">
                    </div>

                    <!-- plus icon -->
                    <button id="createTaskBtn">
                        <i class="fa-solid fa-circle-plus text-gray-300 text-lg"></i>
                    </button>
                    <!-- notification icon -->
                    <button>
                        <i class="fas fa-bell text-gray-300 text-lg"></i>
                    </button>
                    <!-- Profile icon -->
                    <button>
                        <i class="fas fa-user text-gray-300 text-lg"></i>
                    </button>

                </div>
            </div>

            <!-- Main container -->
            <div class="flex-1 flex">

                <!-- Sidebar container -->
                <div class="p-2 bg-zinc-950/85 w-60 flex flex-col hidden md:flex" id="sideNav">
                    <nav>
                        <a class="block text-gray-300 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white" href="#">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                    </nav>

                    <!-- Log out Section -->
                    <a class="block text-gray-200 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-900 hover:to-red-800 hover:text-white mt-auto" href="logout.php">
                        <i class="fas fa-sign-out-alt mr-2"></i>Log out
                    </a>

                    <!-- bottom border -->
                    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

                    <!-- Footer? -->
                    <p class="mb-1 px-5 py-3 text-left text-xs text-gray-400">Copyright do it. @ 2024</p>

                </div>

                <!-- Page Content Area -->
                <div class="flex-1 p-4">
                    <div class="block text-gray-300 font-medium text-lg"><?= $_SESSION['username'] . "'s Homepage" ?></div>
                    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

                    <!-- Container for the 4 sections -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">

                        <!-- Section 1 -->
                        <div class="bg-zinc-950/85 p-4 rounded-md">
                            <h2 class="text-gray-300 text-lg font-semibold pb-1">My Tasks</h2>

                        </div>

                        <!-- Section 2 -->
                        <div class="bg-zinc-950/85 p-4 rounded-md">
                            <h2 class="text-gray-300 text-lg font-semibold pb-1">Info</h2>

                        </div>

                        <!-- Section 3 -->
                        <div class="bg-zinc-950/85 p-4 rounded-md">
                            <h2 class="text-gray-300 text-lg font-semibold pb-4">Favorites</h2>
                            <div class="my-1"></div> <!-- bottom border -->
                            <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-6"></div> <!-- border -->

                            <!-- View more button -->
                            <div class="text-right mt-4">
                                <button class="bg-red-900/80 hover:bg-red-950 text-white font-semibold py-1.5 px-3 rounded-full text-sm">
                                    View more
                                </button>
                            </div>
                        </div>

                        <!-- Section 4 -->
                        <div class="bg-zinc-950/85 p-4 rounded-md ">
                            <h2 class="text-gray-300 text-lg font-semibold pb-4">Lists</h2>
                            <div class="my-1"></div> <!-- bottom border -->
                            <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-6"></div> <!-- border gradient -->

                            <!-- View more button -->
                            <div class="text-right mt-4">
                                <button class="bg-red-900/80 hover:bg-red-950 text-white font-semibold py-1.5 px-3 rounded-full text-sm">
                                    View more
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById("createTaskModal");
            modal.style.display = "none";
        }

        // Get the button that opens the modal
        var btn = document.getElementById("createTaskBtn");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            console.log("Plus icon clicked.");
            var modal = document.getElementById("createTaskModal");
            modal.style.display = "block";
        }
    </script>

<?php require('partials/footer.php') ?>