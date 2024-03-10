<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-medium text-lg"><?= $_SESSION['username'] . "'s Homepage" ?></div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">

        <!-- Section 1 -->
        <div class="bg-zinc-950/85 p-4 rounded-md">
            <h2 class="text-gray-300 text-lg font-semibold pb-1">My Tasks</h2>

            <div class="text-white"><?= var_dump($user_info) ?></div>
        </div>

        <!-- Section 2 -->
        <div class="bg-zinc-950/85 p-4 rounded-md">
            <h2 class="text-gray-300 text-lg font-semibold pb-1">Info</h2>
            <div><i class="fa-solid fa-pen-to-square text-white"></i></div>

            <div>
                <label for="username" class="block text-gray-500 text-lg font-bold mb-2 mt-3">Username: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['username']) ?></span></label>

                <label for="email" class="block text-gray-500 text-lg font-bold mb-2 mt-3">Email: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['email']) ?></span></label>

                <label for="name" class="block text-gray-500 text-lg font-bold mb-2 mt-3">Name: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['name']) ?></span></label>

                <label for="phoneNumber" class="block text-gray-500 text-lg font-bold mb-2 mt-3">Phone Number: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['phone_number']) ?></span></label>

                <?php if ($user_info['user_level'] == 1): ?>
                    <label for="userLevel" class="block text-gray-500 text-lg font-bold mb-2 mt-3">User Level: <span class="text-gray-200 font-medium">Admin</span></label>
                <?php else: ?>
                    <label for="userLevel" class="block text-gray-500 text-lg font-bold mb-2 mt-3">User Level: <span class="text-gray-200 font-medium">Standard</span></label>
                <?php endif; ?>

            </div>

            <!-- Edit info button -->
            <div class="text-right mt-4">
                <button class="bg-red-900/80 hover:bg-red-950 text-white font-semibold py-1.5 px-3 rounded-full text-sm">
                    Edit
                </button>
            </div>

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