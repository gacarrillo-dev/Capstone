<?php
require('partials/head.php');

?>
    <style>
        .about{
            margin-bottom:430px;
        }
    </style>

    <main class="flex flex-wrap place-items-center h-screen">
        <section class="relative mx-auto">

            <?php require('partials/navbar.php'); ?>
            <div class="container mx-auto px-6 py-16 text-center">
                <div class="mx-auto max-w-lg">
                    <h1 class="text-3xl font-bold text-gray-200 lg:text-4xl">Contact Page</h1>
                    <br>
                    <br>
                    <h2 class="text-2xl text-center text-gray-300"><b>Alex's Email</b></h2>
                    <h3 class="text-center text-gray-400">amrea@email.neit.edu</h3>
                    <br>
                    <h2 class="text-2xl text-center text-gray-300"><b>Gabe's Email</b></h2>
                    <h3 class="text-center text-gray-400">gacarillo@email.neit.edu</h3>
                    <br>
                    <h2 class="text-2xl text-center text-gray-300"><b>Emma's Email</b></h2>
                    <h3 class="text-center text-gray-400">ercapirchio@email.neit.edu</h3>
                    <br>

                </div>
                <div class="about"></div>
            </div>


        </section>

    </main>

<?php require('partials/footer.php') ?>