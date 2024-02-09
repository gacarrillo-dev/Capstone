<?php
require('partials/head.php');
?>
    <main>
    <div class="flex flex-wrap place-items-center h-screen">
    <section class="relative mx-auto">

        <!-- navbar -->
        <nav class="container flex justify-between text-gray-200 w-screen rounded-lg">
            <div class="px-5 xl:px-12 py-3 flex w-full items-center rounded-lg bg-zinc-950/85 ring-1 ring-black/5 shadow-sm backdrop-blur-sm">

                <!-- Logo -->
                <a class="text-3xl font-bold font-heading hover:text-red-900" href="#">
                    <i class="fa-solid fa-calendar-days mr-1 text-red-900"></i>
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    do it.
                </a>
                <!-- Nav Links -->
                <ul class=" md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-red-900" href="#">Services</a></li>
                    <li><a class="hover:text-red-900" href="#">About</a></li>
                    <li><a class="hover:text-red-900" href="#">Contact</a></li>
                </ul>
                <!-- Header Icons -->
                <div class=" xl:flex items-center space-x-5 items-center">
                    <!-- login button -->
                    <button class="bg-red-900 hover:bg-red-950 text-white font-semibold py-2 px-4 rounded-full mr-1">
                        Log in
                    </button>
                </div>
            </div>
        </nav>


        <!-- site content -->
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="mx-auto max-w-lg">
                <h1 class="text-3xl font-bold text-gray-200 lg:text-4xl">Contact Page
                </h1>
            </div>

        <div>
            <br>
            <h2 class="text-2xl text-center text-gray-300"><b>Support Email</b></h2>
            <h3 class="text-center text-gray-400">doitsupport@gmail.com</h3>
            <br>
            <h2 class="text-2xl text-center text-gray-300"><b>Phone Number</b></h2>
            <h3 class="text-center text-gray-400">954-991-9521</h3>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </main>

<?php require('partials/footer.php') ?>