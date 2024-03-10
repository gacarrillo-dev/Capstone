<!-- Page Content Area -->
<div class="flex-1 p-4 items-center">
    <div class="block text-gray-300 font-semibold text-3xl"><?= $listInfo['list_name'] ?> <i class="fa-solid fa-pen-to-square text-white text-sm text-red-700 ml-1 hover:cursor-pointer hover:text-gray-500" id="editListBtn"></i></div>
    <?php $date = new DateTime($listInfo['created_at']);
    $formatted_date = $date->format("M j, Y");
    ?>
    <div class="block text-gray-300 font-semibold text-sm mt-3 ml-6">Created on: <?= $formatted_date ?> </div>
    <div class="block text-gray-300 font-semibold text-sm mt-3 ml-6 mb-3">Users: <?= $sharedUsersList ?></div>
    <a href="share.php" class="ml-6 mt-3 text-blue-500 hover:underline hover:text-blue-700"><i class="fa-solid fa-share-nodes mr-2"></i>Share</a>

    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <div class="container overflow-y-auto max-h-70 mt-6 px-3">
            <?php if (is_array($tasks) && count($tasks)> 0): ?>
            <ul class="">
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
                            <h3 class="text-lg font-semibold text-stone-200 hover:underline hover:cursor-pointer hover:text-red-800 whitespace-nowrap" id="taskTitle"><?= htmlspecialchars($task['title']) ?></h3>


                            <!-- Description -->
                            <p class="mt-2 ml-5 font-medium text-gray-500" id="taskDescription"><?= htmlspecialchars($task['description']) ?></p>

                            <!-- Due Date -->
                            <div>
                                <?php $due_date = new DateTime($task['due_date']);
                                $formatted_due_date = $due_date->format("M j, Y");
                                ?>
                                <!-- Hidden due date -->
                                <input type="hidden" id="taskDueDate" name="taskDueDate" value="<?= htmlspecialchars($task['due_date']) ?>">
                                <i class="text-red-800 fa-solid fa-calendar-day ml-5 mt-3 mr-2"></i>
                                <span class="text-white"><?= $formatted_due_date?></span>
                            </div>

                        </div>

                        <div class="flex items-center ml-10 align-center">
                            <form action="" method="post" id="deleteTaskForm">
                                <input type="hidden" name="taskId" value="<?= htmlspecialchars($task['task_id']) ?>">
                                <?php if ($task['is_favorite'] == 1): ?>
                                    <i class="fa-solid fa-star text-yellow-300 mr-6 text-md"></i>
                                <?php else: ?>
                                    <i class="fa-regular fa-star text-white text-md mr-6"></i>
                                <?php endif; ?>
                                <button name="completeTask" type="submit">
                                    <i class="fa-regular fa-square-check mr-6 text-xl text-stone-100 hover:cursor-pointer hover:text-green-700" id="completeBtn"></i>
                                </button>

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

<script>

    function closeShareModal() {
        var modal = document.getElementById("editTaskModal");
        modal.style.display = "none";
    }

    // get the button to edit list modal
    var editListBtn = document.getElementById("editListBtn");

    //When the user clicks edit list icon, open the edit a list modal
    editListBtn.onclick = function() {
        console.log("Edit list icon clicked.");
        var modal = document.getElementById("editListModal");
        modal.style.display = "block";
    }
</script>