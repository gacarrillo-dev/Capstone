<?php 
require('../../views/partials/head.php');
require('../../models/UserModel.php');

// Initialize $username
$username = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and process form data here
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $username = $_POST['username'];

    // Check if passwords match
    if ($new_password === $confirm_password) {
        // Update password in the database using the UserModel function
        updateUserPassword($username, $new_password); // Assuming this function is defined in UserModel.php
        // Password updated successfully
        // Redirect to login page
        header('Location: ../../controllers/users/login.php');
        exit(); // Make sure to exit after redirection
    } else{
        echo "Passwords do not match!";
    }
    
}
?>

<main>
    <section class="min-h-screen flex items-center justify-center text-white">
        <!-- Reset Password Container -->
        <div class="w-full px-16 text-center">
            
            <h1 class="text-5xl font-bold tracking-wide mb-8">Reset Your Password</h1>
            <!-- Password Reset Form -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mx-auto max-w-lg">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <div class="pb-4">
                    <input type="password" name="new_password" id="new_password" placeholder="New Password" class="block w-full p-4 text-lg rounded-md bg-zinc-950/85">
                </div>
                <div class="pb-4">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" class="block w-full p-4 text-lg rounded-md bg-zinc-950/85">
                </div>
                <div class="px-4 pb-2">
                    <button type="submit" name="submit" class="uppercase block w-full p-4 text-lg rounded-full bg-red-900/85 hover:bg-red-950 focus:outline-none">Reset Password</button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php require('../../views/partials/footer.php'); ?>