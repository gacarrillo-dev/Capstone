<?php 
    require('partials/head.php');
?>

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

</div>

</body>

</html>