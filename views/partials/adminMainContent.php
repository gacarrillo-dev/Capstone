<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-medium text-lg"><?= $_SESSION['username'] . "'s Homepage" ?></div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
        <!-- Button to create user -->
        <button onclick="location.href='../controllers/user/createUser.php'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create User
        </button>

        <!-- Button to search users -->
        <button onclick="location.href='searchUsers.php'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Search Users
        </button>
    </div>
</div>
