<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-medium text-2xl">Admin Dashboard</div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 p-2">

        <!-- Section 1 -->
        <div class="bg-zinc-950/85 p-4 rounded-md">
            <h2 class="text-gray-300 text-lg font-semibold mb-3">New Users</h2>
            <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-2"></div>

            <?php if (is_array($recentUsers) && count($recentUsers)> 0): ?>
            <ul class="divide-y">
                <?php foreach ($recentUsers as $recentUser) : ?>
                <li class="rounded p-2 mx-8 flex flex-row justify-between">
                    <div class="flex flex-col">
                        <p class="text-gray-300 text-lg font-semibold" id=""><?= htmlspecialchars($recentUser['username']) ?></p>
                        <p class="text-gray-400 text-sm ml-5" id=""><?= htmlspecialchars($recentUser['name']) ?></p>
                        <p class="text-gray-400 text-sm ml-5" id=""><?= htmlspecialchars($recentUser['email']) ?></p>
                        <?php
                            $date = new DateTime($recentUser['created_at']);
                            $formatted_datetime = $date->format("M j, Y g:i A");
                        ?>
                        <p class="text-gray-400 text-sm ml-5" id=""><?= $formatted_datetime ?></p>
                    </div>
                    <div class="flex items-center mr-10 align-center">
                        <?php if ($recentUser['user_level'] == 1): ?>
                            <p class="text-blue-500 text-sm ml-5 font-medium" id="">Admin</p>
                        <?php else: ?>
                            <p class="text-gray-400 text-sm ml-5 font-medium" id="">Standard</p>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <h2 class="mt-4 text-white">No Users Found</h2>
            <?php endif; ?>
        </div>

        <!-- Section 2 -->
        <div class="bg-zinc-950/85 p-4 rounded-md">
            <h2 class="text-gray-300 text-lg font-semibold mb-3">My Info</h2>
            <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-2"></div>
            <div>
                <label for="username" class="block text-gray-500 text-lg font-bold mb-2 mt-3">Username: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['username']) ?></span></label>

                <label for="email" class="block text-gray-500 text-lg font-bold mb-2 mt-6">Email: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['email']) ?></span></label>

                <label for="name" class="block text-gray-500 text-lg font-bold mb-2 mt-6">Name: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['name']) ?></span></label>

                <label for="phoneNumber" class="block text-gray-500 text-lg font-bold mb-2 mt-6">Phone Number: <span class="text-gray-200 font-medium"><?= htmlspecialchars($user_info['phone_number']) ?></span></label>

                <?php if ($user_info['user_level'] == 1): ?>
                    <label for="userLevel" class="block text-gray-500 text-lg font-bold mb-2 mt-6">User Level: <span class="text-gray-200 font-medium">Admin</span></label>
                <?php else: ?>
                    <label for="userLevel" class="block text-gray-500 text-lg font-bold mb-2 mt-6">User Level: <span class="text-gray-200 font-medium">Standard</span></label>
                <?php endif; ?>

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