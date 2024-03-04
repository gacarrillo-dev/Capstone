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