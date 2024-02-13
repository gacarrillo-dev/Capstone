<!-- Modal backdrop -->
<div id="createListModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Create a List</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form method="post" id="listForm" class="space-y-4">

            <div>
                <label for="listName" class="block text-gray-300 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="listName" name="listName" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="isFavoriteList" name="isFavoriteList" class="mr-2" value="1">
                <label for="isFavorite" class="text-gray-300 text-sm font-bold">Add to Favorites</label>
            </div>
            <div class="text-left">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeListModal()">Cancel</button>
                <button type="submit" name="createList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create List</button>
            </div>
        </form>
    </div>
</div>