<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl">Search Results</div>
    <div class="block text-gray-300 font-semibold text-sm mt-3 ml-6">Searching for: <?= $keyword ?></div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <div class="container overflow-auto mt-6 px-3">
            <?php if (is_array($results) && count($results)> 0): ?>
                <ul class="">
                    <?php foreach ($results as $result) : ?>

                        <li class="p-4 rounded-lg bg-zinc-950 my-4 flex flex-row justify-between">

                            <div class="flex flex-col">

                                <!-- Hidden Task ID -->
                                <input type="hidden" name="taskId" value="<?= htmlspecialchars($result['task_id']) ?>">

                                <!-- Hidden favorite -->
                                <input type="hidden" name="taskFavorite" value="<?= htmlspecialchars($result['is_favorite']) ?>">

                                <!-- Hidden last updated -->
                                <input type="hidden" name="taskUpdateAt" value="<?= htmlspecialchars($result['updated_at']) ?>">

                                <!-- Title -->
                                <?php if ($result['is_favorite'] == 1): ?>
                                    <i class="fa-solid fa-star text-yellow-300 mr-1 text-sm"></i>
                                <?php endif; ?>
                                <span class="text-lg font-semibold text-stone-200 hover:underline hover:cursor-pointer hover:text-red-800" id="taskTitle"><?= htmlspecialchars($result['title']) ?></span>

                                <!-- Description -->
                                <p class="mt-2 ml-5 font-medium text-gray-500" id="taskDescription"><?= htmlspecialchars($result['description']) ?></p>

                                <!-- Due Date -->
                                <div>
                                    <i class="text-white fa-solid fa-calendar-day ml-5 mt-3 mr-2"></i>
                                    <span class="text-white " id="taskDueDate"><?= htmlspecialchars($result['due_date']) ?></span>
                                </div>

                            </div>

                            <div class="flex items-center ml-10">
                                <p class="text-amber-50 mr-6"><?= htmlspecialchars($result['list_name']) ?></p>
                                <form action="" method="post" id="deleteTaskForm">
                                    <input type="hidden" name="taskId" value="<?= htmlspecialchars($result['task_id']) ?>">
                                    <i class="fa-regular fa-trash-can mr-6 text-xl text-red-800 hover:cursor-pointer hover:text-2xl hover:text-red-900" id="deleteBtn"></i>
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