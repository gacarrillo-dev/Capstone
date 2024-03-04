<!-- main page container -->
<div class="flex-1 flex">
    <!-- Page Content Area -->
    <div class="flex-1 p-4">
        <div class="block text-gray-300 font-semibold text-3xl text-center">Profile Settings</div>
        <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>
        <br>
        <!-- Container for the 4 sections -->
        <form action="Profile.php" method="post">
            <div class="gap-4 mt-2 p-2 w-full mx-auto ">
                <div class="flex flex-col items-center">
                    <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" style="width: 400px;" class="w-300 border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <br>
                <div class="flex flex-col items-center">
                    <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email Address</label>
                    <input type="text" id="email" name="email" style="width: 400px;" class="w-150 border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <br>
                <div class="flex flex-col items-center">
                    <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone" style="width: 400px;" class="w-150 border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <br>
                <div class="flex flex-col items-center">
                    <label for="username" class="block text-gray-300 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username" style="width: 400px;" class="w-150 border-gray-400 bg-zinc-950/80 text-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <div class="container overflow-y-auto max-h-70 mt-6 px-3">
                </div>
                <div class="text-center">
                    <button name="cancel" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded" onclick="window.location.href = 'userHomePage.php';">Cancel</button>
                    <button type="submit" name="profile" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>