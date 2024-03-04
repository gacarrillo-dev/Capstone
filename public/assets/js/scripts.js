
    // Function to close the modal
    function closeTaskModal() {
    var modal = document.getElementById("createTaskModal");
    modal.style.display = "none";
}

    // Function to close the modal
    function closeListModal() {
    var modal = document.getElementById("createListModal");
    modal.style.display = "none";
}

    // Function to close the modal
    function closeDeleteModal() {
        var modal = document.getElementById("deleteTaskModal");
        modal.style.display = "none";
}

    function closeEditModal() {
        var modal = document.getElementById("editTaskModal");
        modal.style.display = "none";
    }

    function closeSearchModal() {
        var modal = document.getElementById("searchUserModal");
        modal.style.display = "none";
    }

    // Get the button that opens the modal
    var btn = document.getElementById("createTaskBtn");

    // Get the button that opens the modal
    var btn2 = document.getElementById("createListBtn");

    // Get the buttons that opens the edit modal
    var editBtns = document.querySelectorAll(`#taskTitle`)

    // Get the button that opens search user modal
    var shareBtn = document.getElementById("shareBtn")

    // Get the button that deletes the task
    var deleteBtns = document.querySelectorAll(`#deleteBtn`);

    var confirmDeleteBtn = document.getElementById("confirmDelete");

    var deleteModal = document.getElementById("deleteTaskModal");

    var editModal = document.getElementById("editTaskModal");

    var taskIdInput = document.getElementById("taskId");

    //function to handle delete modal display
    function showDeleteModal(taskId){
        deleteModal.style.display = "block";
        taskIdInput.value = taskId;
    }

    //function to handle delete modal display
    function showEditModal(taskId){
        editModal.style.display = "block";
        taskIdInput.value = taskId;
    }

    // When the user clicks plus icon button, open the create a task modal
    btn.onclick = function() {
    console.log("Plus icon clicked.");
    var modal = document.getElementById("createTaskModal");
    modal.style.display = "block";
}

    // When the user clicks new list icon, open the create a list modal
    btn2.onclick = function() {
    console.log("Create list icon clicked.");
    var modal = document.getElementById("createListModal");
    modal.style.display = "block";
}

    // When the user clicks on the share button, open the search user modal
    shareBtn.onclick = function() {
        console.log("Share button clicked.");
        var modal = document.getElementById("searchUserModal");
        modal.style.display = "block";
    }

    deleteBtns.forEach(deleteBtn => {

        deleteBtn.onclick = function() {
            console.log("Delete icon clicked.");
            var taskId = this.parentElement.querySelector('input[name="taskId"]').value;
            console.log(taskId);
            document.getElementById('taskIdLabel').innerHTML = taskId;
            document.getElementById('taskIdHidden').value = taskId;
            showDeleteModal(taskId);
        }
    });

    editBtns.forEach(editBtn => {

        editBtn.onclick = function() {
            console.log("Edit icon clicked.");
            var taskId = this.parentElement.querySelector('input[name="taskId"]').value;
            var title = this.parentElement.querySelector(`#taskTitle`).innerText;
            var description = this.parentElement.querySelector(`#taskDescription`).innerText;
            var dueDate = this.parentElement.querySelector(`#taskDueDate`).innerText;
            var favorite = this.parentElement.querySelector('input[name="taskFavorite"]').value;
            var updatedAt = this.parentElement.querySelector('input[name="taskUpdateAt"]').value;

            console.log(taskId);
            console.log(title);
            document.getElementById('taskIdEditHidden').value = taskId;
            document.getElementById('lastUpdated').innerHTML = updatedAt;
            document.getElementById('taskIdEditLabel').innerHTML = taskId;
            document.getElementById('updateTitle').value = title;
            document.getElementById('updateDescription').value = description;
            document.getElementById('updateDueDate').value = dueDate;
            // Get the checkbox element
            var updateIsFavoriteCheckbox = document.querySelector('input[name="updateIsFavorite"]');
            // Check if the favorite value is 1, then set the checkbox to be checked
            if (favorite === '1') {
                updateIsFavoriteCheckbox.checked = true;
            } else {
                updateIsFavoriteCheckbox.checked = false;
            }

            showEditModal(taskId);
        }
    });

    // Get the search input element
    const searchInput = document.getElementById('searchInput');
    const searchUserInput = document.getElementById('userSearch')

    // Add an event listener to detect 'enter' key press
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            // Submit the search form when 'enter' is pressed
            document.getElementById('searchForm').submit();
        }
    });

    // Add an event listener to detect 'enter' key press
    searchUserInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            // Submit the search form when 'enter' is pressed
            document.getElementById('searchUserForm').submit();
        }
    });




