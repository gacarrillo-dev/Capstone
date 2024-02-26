<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl">Favorites</div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <div class="container overflow-auto mt-6 px-3">
            <?php if (is_array($tasks) && count($tasks)> 0): ?>
                <ul class="divide-y">
                    <?php foreach ($tasks as $task) : ?>

                        <li class="p-4 rounded-lg bg-zinc-950 my-4 flex flex-row justify-between">

                            <div class="flex flex-col">

                                <!-- Hidden Task ID -->
                                <input type="hidden" name="taskId" value="<?= htmlspecialchars($task['task_id']) ?>">

                                <!-- Hidden favorite -->
                                <input type="hidden" name="taskFavorite" value="<?= htmlspecialchars($task['is_favorite']) ?>">

                                <!-- Hidden last updated -->
                                <input type="hidden" name="taskUpdateAt" value="<?= htmlspecialchars($task['updated_at']) ?>">

                                <!-- Title -->
                                <?php if ($task['is_favorite'] == 1): ?>
                                    <i class="fa-solid fa-star text-yellow-300 mr-1 text-sm"></i>
                                <?php endif; ?>
                                <span class="text-lg font-semibold text-stone-200 hover:underline hover:cursor-pointer hover:text-red-800" id="taskTitle"><?= htmlspecialchars($task['title']) ?></span>

                                <!-- Description -->
                                <p class="mt-2 ml-5 font-medium text-gray-500" id="taskDescription"><?= htmlspecialchars($task['description']) ?></p>

                                <!-- Due Date -->
                                <div>
                                    <i class="text-white fa-solid fa-calendar-day ml-5 mt-3 mr-2"></i>
                                    <span class="text-white " id="taskDueDate"><?= htmlspecialchars($task['due_date']) ?></span>
                                </div>

                            </div>

                            <div class="flex items-center ml-10">
                                <form action="" method="post" id="deleteTaskForm">
                                    <input type="hidden" name="taskId" value="<?= htmlspecialchars($task['task_id']) ?>">
                                    <i class="fa-regular fa-trash-can mr-6 text-xl text-red-800 hover:cursor-pointer hover:text-2xl hover:text-red-900" id="deleteBtn"></i>
                                </form>
                            </div>
                        </li>

                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <h2 class="mt-4 text-white">No Tasks Found</h2>
            <?php endif; ?>
        </div>

    </div>
</div>