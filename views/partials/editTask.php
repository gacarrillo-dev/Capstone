<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl"><?= $listInfo['list_name'] . " List" ?></div>
    <div class="block text-gray-300 font-semibold text-3xl"><?= $listInfo['list_name'] . " List" ?></div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto">


        <div class="container mt-6 px-3">
            <?php if (is_array($tasks)&& count($tasks)> 0): ?>
                <ul class="divide-y">
                    <?php foreach ($tasks as $task) : ?>

                        <li class="p-4 rounded-lg bg-zinc-950 my-4 flex flex-row justify-between">
                            <div class="flex flex-col">
                                <a href="editTask.php?action=Update&taskID=<?= htmlspecialchars($task['task_id']) ?>"><h3 class="text-lg font-semibold text-white"'><?= htmlspecialchars($task['title']) ?></h3></a>
                                <p class="text-white"><?= htmlspecialchars($task['description']) ?></p>
                                <p class="text-white ml-3"><i class="fa-solid fa-calendar-day mr-2"></i> <?= htmlspecialchars($task['due_date']) ?></p>
                            </div>

                            <div class="flex items-center ml-10">
                                <i class="fa-regular fa-trash-can text-red-800"></i>
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