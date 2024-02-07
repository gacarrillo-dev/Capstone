<?php require ('../partials/head.php'); ?>
<main>
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(https://www.onecalendar.nl/images/onecalendar.jpg);">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            <div class="w-full px-24 z-10">
                <h1 class="text-5xl font-bold text-left tracking-wide">Welcome Back!</h1>
                <p class="text-3xl my-4">Please log in to continue to site.</p>
            </div>
            <div class="bottom-0 absolute p-4 text-center right-0 left-0 flex justify-center space-x-4">

            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #161616;">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url(https://www.onecalendar.nl/images/onecalendar.jpg);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">

                <h1 class="my-6 text-5xl font-semibold">
                    <i class="fa-solid fa-calendar-days mr-2 text-red-900"></i>do it.
                </h1>
                <form action="" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                    <div class="pb-2 pt-4">
                        <input type="text" name="username" id="username" placeholder="Username" class="block w-full p-4 text-lg rounded-md bg-zinc-950">
                    </div>
                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-lg bg-zinc-950" type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="text-right text-gray-400 hover:underline hover:text-gray-100">
                        <a href="#">Forgot your password?</a>
                    </div>
                    <div class="px-4 pb-2 pt-4">
                        <button class="uppercase block w-full p-4 text-lg rounded-full bg-red-900 hover:bg-red-950 focus:outline-none">sign in</button>
                    </div>

                    <div class="p-4 text-center right-0 left-0 flex justify-center space-x-4 mt-16 lg:hidden ">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php require ('../partials/footer.php'); ?>