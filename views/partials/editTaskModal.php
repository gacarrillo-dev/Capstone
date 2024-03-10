<!-- Modal backdrop -->
<div id="editTaskModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 h-screen rounded-lg max-w-md">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Edit Task</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2"></div>
        <form action="" id="updateTaskForm" method="post">
            <input type="hidden" name="taskIdEditHidden" id="taskIdEditHidden">
            <br/>
            <div>
                <label for="updateTitle" class="block text-gray-300 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="updateTitle" name="updateTitle" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mt-5">
                <label for="updateDescription" class="block text-gray-300 text-sm font-bold mb-2">Description:</label>
                <textarea id="updateDescription" name="updateDescription" class="w-full border border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" rows="4" required></textarea>
            </div>
            <div class="mt-5">
                <label for="updateDueDate" class="block text-gray-300 text-sm font-bold mb-2">Due Date:</label>
                <input type="date" id="updateDueDate" name="updateDueDate" class="border bg-zinc-950/80 border-gray-400 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="flex items-center mt-5">

                <input type="checkbox" name="updateIsFavorite" value="1" class="form-checkbox text-blue-500">
                <label for="updateIsFavorite" class="text-gray-300 text-sm font-bold ml-2">Add to Favorites</label>
            </div>
            <div class="text-left mt-5">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeEditModal()">Cancel</button>
                <button type="submit" name="updateTask" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
                <button type="submit" name="deleteTask" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-20">Delete</button>
            </div>
        </form>

    </div>

</div>