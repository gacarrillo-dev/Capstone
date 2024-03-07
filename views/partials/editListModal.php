<!-- Modal backdrop -->
<div id="editListModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md h-screen">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Edit List</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form method="post" id="editListForm" class="space-y-4">
            <div>
                <label for="updateListName" class="block text-gray-300 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="updateListName" name="updateListName" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" value="<?= $listInfo['list_name'] ?>" required>
            </div>

            <div class="text-left">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeEditListModal()">Cancel</button>
                <button type="submit" name="editList" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
</div>