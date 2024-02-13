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