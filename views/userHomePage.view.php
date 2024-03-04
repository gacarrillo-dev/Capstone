<?php require('partials/head.php'); ?>

<main class="">
<!-- import create task modal -->
<?php require('partials/createTaskModal.php'); ?>
<!-- import create list modal -->
<?php require('partials/createListModal.php'); ?>

        <!-- page container -->
        <div class="flex flex-col h-screen bg-zinc-900">

            <!-- import top bar -->
            <?php require ('partials/topbar.php'); ?>

            <!-- main page container -->
            <div class="flex-1 flex">

                <!-- import sidebar -->
                <?php require ('partials/sidebar.php'); ?>
                <!-- import main page content -->
                <?php require('partials/userDashboard.php'); ?>
            </div>
        </div>
</main>

    <script src="../../public/assets/js/scripts.js"></script>

<?php require('partials/footer.php') ?>