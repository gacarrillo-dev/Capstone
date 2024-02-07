<?php require ('../partials/head.php'); ?>
<main>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 space-y-6 bg-zinc-950 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center text-gray-300">Registration</h1>
            <form method="post" action="#" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-red-800">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-red-800">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <input type="submit" name="Register" value="Register" class="w-full px-4 py-2 text-white bg-red-900 rounded-md hover:bg-red-950 focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <input type="submit" name="Cancel" value="Cancel" class="w-full px-4 py-2 text-gray-600 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-500">
                </div>
            </form>
            <?php if (isset($_POST['Register']) && (!empty($error_message))) : ?>
                <p style="color: red;" class="text-red-500"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php require ('../partials/footer.php'); ?>