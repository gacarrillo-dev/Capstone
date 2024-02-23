<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-medium text-lg"><?= $listInfo['list_name'] . " List" ?></div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-2"></div>

    <!-- Container for the 4 sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">


        <div class="container mx-auto mt-6 px-3">
            <?php if (is_array($tasks)&& count($tasks)> 0): ?>
            <ul class="divide-y divide-stone-300">
                <?php foreach ($tasks as $task) : ?>
                <a href="editTask.php?action=Update&taskID=<?= htmlspecialchars($task['task_id']) ?>">
                    <li class="p-4 rounded-lg bg-zinc-950 my-4">
                        <h3 class="text-lg font-semibold text-white"><?= htmlspecialchars($task['title']) ?></h3>
                    </li>
                </a>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <h2 class="mt-4 text-white">No Task Found</h2>  
            <?php endif; ?>
        </div>

    </div>
</div>