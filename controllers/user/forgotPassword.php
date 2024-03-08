<?php require ('../../views/partials/head.php'); ?>

<main>

    <section class="min-h-screen flex items-center justify-center text-white">
        <!-- Forgot Password Container -->
        <div class="w-full px-16 text-center">
            <!-- Error Message -->
            <?php if (isset($error_message)) : ?>
                <div class="text-red-500"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <!-- Message -->
            <h1 class="text-5xl font-bold tracking-wide mb-8">Enter User Email</h1>
            <!-- Email Input -->
            <form method="post" action="../../views/auth/resetPasswordForm.php" class="mx-auto max-w-lg">
                <div class="pb-4">
                    <input type="email" name="email" id="email" placeholder="Email" class="block w-full p-4 text-lg rounded-md bg-zinc-950/85">
                </div>
                <div class="px-4 pb-2">
                    <button type="submit" name="reset_password" class="uppercase block w-full p-4 text-lg rounded-full bg-red-900/85 hover:bg-red-950 focus:outline-none">Reset Password</button>
                </div>
            </form>
        </div>
    </section>

</main>

<?php require ('../../views/partials/footer.php'); ?>
