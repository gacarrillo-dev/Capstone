<!-- Modal backdrop -->
<div id="createTaskModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Create a Task</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form method="post" id="taskForm" class="space-y-4">
            <div>
                <label for="lists" class="block text-gray-300 text-sm font-bold mb-2">List:</label>
                <select id="lists" name="list_id" class="bg-zinc-950/80 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Chose a list</option>
                    <?php foreach ($users_lists as $user_list) : ?>
                        <option value="<?= htmlspecialchars($user_list['list_id']) ?>"><?= htmlspecialchars($user_list['list_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div>
                <label for="description" class="block text-gray-300 text-sm font-bold mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" rows="4"></textarea>
            </div>
            <div>
                <label for="dueDate" class="block text-gray-300 text-sm font-bold mb-2">Due Date:</label>
                <input type="date" id="dueDate" name="dueDate" class="border bg-zinc-950/80 border-gray-400 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="flex items-center">
                <input type="checkbox" id="isFavorite" name="isFavorite" class="mr-2" value="1">
                <label for="isFavorite" class="text-gray-300 text-sm font-bold">Add to Favorites</label>
            </div>
            <div class="text-left">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeTaskModal()">Cancel</button>
                <button type="submit" name="createTask" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
            </div>
        </form>
    </div>
</div>