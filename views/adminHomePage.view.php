<?php 
session_start();
require('partials/head.php'); ?>
<main class="">

<!-- import create task modal -->
<?php require('partials/createTaskModal.php'); ?>
<!-- import create list modal -->
<?php require('partials/createListModal.php'); ?>

        <!-- page container -->
        <div class="flex flex-col h-screen bg-zinc-900">

            <!-- import top bar -->
            <?php require ('partials/topbar.php'); ?>

            <!-- main page container -->
            <div class="flex-1 flex">

                <!-- import sidebar -->
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
                <!-- import main page content -->
                <?php require ('partials/adminMainContent.php'); ?>
            </div>
        </div>
</main>

    <script src="../../public/assets/js/scripts.js"></script>

<?php require('partials/footer.php') ?>