<?php 
    require('partials/head.php');
?>

<main class="flex flex-wrap place-items-center h-screen">

    <section class="relative mx-auto">
        <?php require('partials/navbar.php'); ?>

        <!-- site content -->
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="mx-auto max-w-lg">
                <h1 class="text-3xl font-bold text-gray-200 lg:text-4xl">About Us.
                </h1>
                <p class="mt-6 text-zinc-400 font-semibold">We are 3 college students enrolled at New England Institute of Technology. This website is our Associate's degree final project. Our goal is to make an event planner for students like us, to use to plan out their week. </p>
            </div>
            <div class="mt-10 flex justify-center">
                <img alt="image 1" class="h-125 w-full rounded-xl object-cover lg:w-4/5"
                     src="" />
                <img alt="image 2" class="h-125 w-full rounded-xl object-cover lg:w-4/5"
                     src="" />
                <img alt="image 3" class="h-125 w-full rounded-xl object-cover lg:w-4/5"
                     src="" />
            </div>
        </div>

    </section>

</main>

<?php require('partials/footer.php') ?>