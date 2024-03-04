
<?php
require('partials/head.php');

?>
<style>
    .about{
        margin-bottom: 600px;
    }
</style>

<main class="flex flex-wrap place-items-center h-screen">
    <section class="relative mx-auto">

        <?php require('partials/navbar.php'); ?>
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="mx-auto max-w-lg">
                <h1 class="text-3xl font-bold text-gray-200 lg:text-4xl">About Us.
                </h1>
                <p class="mt-6 text-zinc-400 font-semibold">We are 3 college students enrolled at New England Institute of Technology. This website is our Associate's degree final project. Our goal is to make an event planner for students like us, to use to plan out their week.</p>

            </div>
            <div class="about"></div>
        </div>


    </section>

</main>

<?php require('partials/footer.php') ?>