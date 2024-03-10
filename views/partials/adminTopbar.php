<!-- Top bar -->
<div class="bg-zinc-950/85 text-white shadow w-full p-2 flex items-center justify-between">
    <div class="flex items-center">
        <div class="hidden md:flex items-center"> <!-- only visible in smaller view -->
            <!-- <img src="" alt="Logo" class="w-28 h-18 mr-2"> -->

            <!-- Logo -->
            <i class="fa-solid fa-calendar-days mr-2 ml-4 text-2xl text-red-900"></i>
            <h2 class="font-bold text-2xl">do it.</h2>
        </div>
        <div class="md:hidden flex items-center"> <!-- only visible in smaller view -->
            <button id="menuBtn">
                <i class="fas fa-bars text-gray-400 text-lg"></i> <!-- Burger menu icon -->
            </button>
        </div>
    </div>

    <!-- Right side topbar -->
    <div class="space-x-5 flex flex-row items-center">

        <!-- Search Bar -->
        <div class="relative max-w-md w-full">
            <form id="searchForm" action="search.php" method="get">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input id="searchInput" class="w-full h-10 pl-10 pr-4 py-1 text-zinc-950 text-base placeholder-gray-500 border rounded-full focus:ring focus:ring-red-800 focus:ring-opacity-80" type="search" name="query" placeholder="Search tasks...">
            </form>
        </div>

        <!-- plus icon -->
        <button id="createTaskBtn">
            <i class="fa-solid fa-circle-plus text-gray-300 text-2xl"></i>
        </button>
        <!-- notification icon -->
        <button>
            <i class="fas fa-bell text-gray-300 text-2xl"></i>
        </button>
        <!-- Profile icon -->
        <div class="flex item-center">
                <div id="dropdown-button" class="hover:cursor-pointer flex flex-row items-center">
                        <i class="fa-solid fa-circle-user text-gray-300 text-2xl mr-3"></i>
                        <div class="mr-3">
                            <p class="whitespace-nowrap text-sm"><?= $user_info['name'] ?></p>
                            <?php if ($user_info['user_level'] == 1): ?>
                                <p class="text-blue-500 text-sm font-medium" id="">Admin</p>
                            <?php endif; ?>

                        </div>
                </div>
            <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-8 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    <?php if($_SESSION['user_level'] == 1): ?>
                        <a class="flex items-center block rounded-md px-4 py-2 text-md text-black hover:bg-gray-200 active:bg-blue-100 cursor-pointer" role="menuitem" href="today.php">
                            <i class="fa-solid fa-desktop mr-3"></i>User Mode
                        </a>
                    <?php endif; ?>
                    <a class="flex items-center block rounded-md px-4 py-2 text-md text-black hover:bg-gray-200 active:bg-blue-100 cursor-pointer" role="menuitem" href="logout.php">
                        <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        <script>
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            let isDropdownOpen = true;

            // Function to toggle the dropdown
            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            }

            // Initialize the dropdown state
            toggleDropdown();

            // Toggle the dropdown when the button is clicked
            dropdownButton.addEventListener('click', toggleDropdown);

            // Close the dropdown when clicking outside of it
            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });
        </script>


    </div>
</div>