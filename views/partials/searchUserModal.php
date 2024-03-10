<!-- Modal backdrop -->
<div id="searchUserModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md h-screen">
        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Search Users</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form method="post" id="listForm" class="space-y-4">
            <div>
                <form id="searchUsersForm" action="" method="post">
                    <label for="userSearch" class="block text-gray-300 text-sm font-bold mb-2">User Name:</label>
                    <input type="text" id="userSearch" name="userSearch" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
                </form>

            </div>
            <!-- Results Section -->
            <div class="mt-4 overflow-y-auto max-h-60">

                <?php if (is_array($users) && count($users)> 0): ?>

                <?php foreach ($users as $user) : ?>
                <div class="flex items-center mb-2">
                    <img src="user_avatar.jpg" alt="User Avatar" class="w-10 h-10 rounded-full mr-2">
                    <div>
                        <p class="text-gray-300 font-semibold"><?= htmlspecialchars($user['username']) ?></p>
                        <p class="text-gray-400 text-sm"><?= htmlspecialchars($user['email']) ?></p>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php else: ?>
                    <h2 class="mt-4 text-white">No Users Found</h2>
                <?php endif; ?>
            </div>
            <!-- Cancel Button -->
            <div class="flex justify-end">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeSearchModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>
