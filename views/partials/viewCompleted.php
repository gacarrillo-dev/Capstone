<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl">Completed</div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <div class="container overflow-auto mt-6 px-3">
            <?php if (is_array($completed) && count($completed)> 0): ?>
                <ul class="">
                    <?php foreach ($completed as $complete) : ?>

                        <li class="p-4 rounded-lg bg-zinc-950 my-4 flex flex-row justify-between">

                            <div class="flex flex-col">

                                <!-- Hidden Task ID -->
                                <input type="hidden" name="taskId" value="<?= htmlspecialchars($complete['task_id']) ?>">

                                <!-- Hidden favorite -->
                                <input type="hidden" name="taskFavorite" value="<?= htmlspecialchars($complete['is_favorite']) ?>">

                                <!-- Hidden last updated -->
                                <input type="hidden" name="taskUpdateAt" value="<?= htmlspecialchars($complete['updated_at']) ?>">

                                <!-- Title -->
                                <h3 class="text-lg font-semibold text-stone-200" id=""><?= htmlspecialchars($complete['title']) ?></h3>

                                <!-- Description -->
                                <p class="mt-2 ml-5 font-medium text-gray-500" id="taskDescription"><?= htmlspecialchars($complete['description']) ?></p>

                                <!-- Completed Date -->
                                <?php
                                $date = new DateTime($complete['updated_at']);
                                $formatted_datetime = $date->format("M j, Y g:i A");
                                ?>
                                <div>
                                    <p class="text-green-500">Completed <span class="text-white " id="taskDueDate">@ <?= htmlspecialchars($formatted_datetime) ?></span></p>

                                </div>

                            </div>

                            <div class="flex items-center ml-10">
                                <p class="text-amber-50 mr-6"><?= htmlspecialchars($complete['list_name']) ?></p>
                                <?php if ($complete['is_favorite'] == 1): ?>
                                    <i class="fa-solid fa-star text-yellow-300 mr-5 text-lg"></i>
                                <?php else: ?>
                                    <i class="fa-regular fa-star text-white text-md mr-6"></i>
                                <?php endif; ?>
                                <form action="" method="post" id="deleteTaskForm">
                                    <input type="hidden" name="taskId" value="<?= htmlspecialchars($complete['task_id']) ?>">
                                    <i class="fa-regular fa-trash-can mr-6 text-lg text-red-800 hover:cursor-pointer hover:text-2xl hover:text-red-900" id="deleteBtn"></i>
                                </form>
                            </div>
                        </li>

                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <h2 class="mt-4 text-white">No Task Found</h2>
            <?php endif; ?>
        </div>

    </div>
</div>