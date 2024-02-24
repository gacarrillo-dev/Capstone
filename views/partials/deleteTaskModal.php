<!-- Modal backdrop -->
<div id="deleteTaskModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">

    <!-- Modal Container -->
    <div class="bg-zinc-900 p-8 rounded-lg max-w-md">

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold text-gray-50">Are you sure you want to delete?</h2>
        <div class="bg-gradient-to-r from-red-600 to-red-800 h-px mb-5 mt-2">
            <label id="taskIdLabel" class="text-center text-3xl text-white"></label>
            <div class="text-left">
                <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="closeDeleteModal()">Cancel</button>
                <button type="submit" id="confirmDelete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </div>
    </div>
</div>