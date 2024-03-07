<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl">Share list</div>
    <div class="flex flex-row mt-4">
        <div class="block text-gray-300 font-semibold text-md mt-3 ml-6">Search user:  </div>
        <div class="relative max-w-md w-full ml-6">
            <form id="searchUserForm" action="share.php" method="get">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input id="searchUserInput" class="h-10 pl-10 pr-4 py-1 text-zinc-950 text-base placeholder-gray-500 border rounded-md focus:ring focus:ring-red-800 focus:ring-opacity-80" type="search" name="userSearchQuery" placeholder="username, name, email">
            </form>
        </div>
    </div>

    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <div class="container overflow-auto mt-6 px-3">
        <?php if (is_array($searchUsers) && count($searchUsers)> 0): ?>

            <ul>
            <?php foreach ($searchUsers as $searchUser) : ?>
            <li class="p-4 rounded-lg bg-zinc-950 my-4 flex flex-row justify-between">
                <div class="flex flex-col">
                    <!-- Hidden Task ID -->
                    <input type="hidden" name="userId" value="<?= htmlspecialchars($searchUser['user_id']) ?>">
                    <p class="text-gray-300 text-xl font-semibold" id=""><?= htmlspecialchars($searchUser['username']) ?></p>
                    <p class="text-gray-400 text-sm ml-5" id=""><?= htmlspecialchars($searchUser['name']) ?></p>
                    <p class="text-gray-400 text-sm ml-5" id=""><?= htmlspecialchars($searchUser['email']) ?></p>
                </div>
                <div class="flex items-center ml-10 align-center">
                    <!-- Hidden Task ID -->
                    <input type="hidden" name="userId" value="<?= htmlspecialchars($searchUser['user_id']) ?>">
                    <input type="hidden" name="username" value="<?= htmlspecialchars($searchUser['username']) ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($searchUser['name']) ?>">
                    <input type="hidden" name="email" value="<?= htmlspecialchars($searchUser['email']) ?>">
                    <button name="shareBtn" id="shareBtn" class="bg-red-900 hover:bg-red-950 text-white text-sm ml-6 font-semibold mt-3 py-2 px-4 rounded-full">Share
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <h2 class="mt-4 text-white">No Users Found</h2>
        <?php endif; ?>

    </div>
    </div>
</div>