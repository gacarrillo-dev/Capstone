<!-- Modal backdrop -->
<div id="shareListModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md h-screen">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Share a List</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form method="post" id="shareListForm" class="space-y-4">
            <div>
                <label for="lists" class="block text-gray-300 text-sm font-bold mb-2">My Lists:</label>
                <select id="lists" name="list_id" class="bg-zinc-950/80 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php foreach ($users_lists as $user_list) : ?>
                        <option value="<?= htmlspecialchars($user_list['list_id']) ?>"><?= htmlspecialchars($user_list['list_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="">

                <p class="text-gray-300 mb-5">Sharing with:</p>
                <input type="hidden" name="sharingUserID" id="sharingUserID" value="">
                <p class="text-gray-300 text-xl font-semibold mt-3" id="sharingUsername"></p>
                <p class="text-gray-400 text-sm mt-3" id="sharingName"></p>
                <p class="text-gray-400 text-sm mt-3" id="sharingEmail"></p>

            </div>

            <div class="text-left">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mt-5" onclick="closeShareModal()">Cancel</button>
                <button type="submit" name="shareList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">Confirm</button>
            </div>
        </form>
    </div>
</div>