<!-- Page Content Area -->
<div class="flex-1 p-4">
    <div class="block text-gray-300 font-semibold text-3xl">Search Results</div>
    <div class="block text-gray-300 font-semibold text-md mt-3 ml-6">Searching for: "<?= $keyword ?>"</div>
    <div class="bg-gradient-to-r from-red-700 to-red-900 h-px mt-4"></div>

    <!-- Container for the 4 sections -->
    <div class="gap-4 mt-2 p-2 w-full mx-auto ">

        <!-- Filter Options -->
        <div class="flex items-center space-x-4 mb-4">
            <span class="text-gray-400">Filters:</span>
            <?php
            // Ensure $lists is defined before trying to access it
            if (isset($lists)) {
                $statusLabel = ucwords($statusFilter === 'all' ? 'All' : $statusFilter);
                $listLabel = ($listIDFilter === '') ? 'All Lists' : 'All Lists';
                if (!empty($listIDFilter)) {
                    // Fetch the list name based on the selected list ID
                    $listLabel = htmlspecialchars($lists[array_search($listIDFilter, array_column($lists, 'list_id'))]['list_name']);
                }
                echo "<span class='text-gray-200'>{$statusLabel} Tasks | List: {$listLabel}</span>";
            } else {
                echo "<span class='text-red-800'>Lists not available</span>";
            }
            ?>
        </div>



        <!-- Filter Form -->
        <form action="" method="get" class="flex items-center space-x-4 mb-4">
            <!-- Filter Options -->
            <input type="hidden" name="query" value="<?= htmlspecialchars($keyword) ?>">
            <select name="status" class="bg-gray-700 text-white px-3 py-1 rounded">
                <option value="all" <?= $statusFilter === 'all' ? 'selected' : '' ?>>All</option>
                <option value="completed" <?= $statusFilter === 'completed' ? 'selected' : '' ?>>Completed</option>
                <option value="incomplete" <?= $statusFilter === 'incomplete' ? 'selected' : '' ?>>Incomplete</option>
            </select>
            <select name="listID" class="bg-gray-700 text-white px-3 py-1 rounded">
                <option value="" <?= $listIDFilter === '' ? 'selected' : '' ?>>All Lists</option>
                <?php foreach ($users_lists as $list) : ?>
                    <option value="<?= htmlspecialchars($list['list_id']) ?>" <?= $list['list_id'] == $listIDFilter ? 'selected' : '' ?>>
                        <?= htmlspecialchars($list['list_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Filter</button>
        </form>


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
                                <h3 class="text-lg font-semibold text-stone-200 hover:underline hover:cursor-pointer hover:text-red-800" id="taskTitle"><?= htmlspecialchars($result['title']) ?></h3>

                                <!-- Description -->
                                <p class="mt-2 ml-5 font-medium text-gray-500" id="taskDescription"><?= htmlspecialchars($result['description']) ?></p>

                                <!-- Due Date -->
                                <div>
                                    <?php if ($result['is_completed'] == 0): ?>
                                        <?php $due_date = new DateTime($result['due_date']);
                                        $formatted_due_date = $due_date->format("M j, Y");
                                        ?>
                                        <!-- Hidden due date -->
                                        <input type="hidden" id="taskDueDate" name="taskDueDate" value="<?= htmlspecialchars($result['due_date']) ?>">
                                        <i class="text-red-800 fa-solid fa-calendar-day ml-5 mt-3 mr-2"></i>
                                        <span class="text-white"><?= $formatted_due_date?></span>
                                    <?php else: ?>
                                        <?php
                                        $date = new DateTime($result['updated_at']);
                                        $formatted_datetime = $date->format("M j, Y g:i A");
                                        ?>
                                        <p class="text-green-500">Completed <span class="text-white " id="taskDueDate">@ <?= htmlspecialchars($formatted_datetime) ?></span></p>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="flex items-center ml-10">
                                <p class="text-orange-400/85 font-medium mr-6"><?= htmlspecialchars($result['list_name']) ?></p>
                                <form action="" method="post" id="deleteTaskForm">
                                    <input type="hidden" name="taskId" value="<?= htmlspecialchars($result['task_id']) ?>">
                                    <?php if ($result['is_favorite'] == 1): ?>
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
                <h2 class="mt-4 text-white">No Results Found</h2>
            <?php endif; ?>
        </div>

    </div>
</div>