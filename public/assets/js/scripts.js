
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

    function closeEditListModal() {
        var modal = document.getElementById("editListModal");
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


    // Get the button that opens the modal
    var btn = document.getElementById("createTaskBtn");

    // Get the button that opens the modal
    var btn2 = document.getElementById("createListBtn");

    // Get the buttons that opens the edit modal
    var editBtns = document.querySelectorAll(`#taskTitle`)

    // Get the button that deletes the task
    var deleteBtns = document.querySelectorAll(`#deleteBtn`);

    var shareBtns = document.querySelectorAll(`#shareBtn`)

    var confirmDeleteBtn = document.getElementById("confirmDelete");

    var deleteModal = document.getElementById("deleteTaskModal");

    var shareModal = document.getElementById("shareListModal");

    var editModal = document.getElementById("editTaskModal");

    var taskIdInput = document.getElementById("taskId");

    var userIdInput = document.getElementById("userId");

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

    //function to handle share modal display
    function showShareModal(userId){
        shareModal.style.display = "block";
        userIdInput.value = userId;
    }

    // When the user clicks plus icon button, open the create a task modal
    btn.onclick = function() {
    console.log("Create task icon clicked.");
    var modal = document.getElementById("createTaskModal");
    modal.style.display = "block";
}

    // When the user clicks new list icon, open the create a list modal
    btn2.onclick = function() {
    console.log("Create list icon clicked.");
    var modal = document.getElementById("createListModal");
    modal.style.display = "block";
}



    deleteBtns.forEach(deleteBtn => {

        deleteBtn.onclick = function() {
            console.log("Delete icon clicked.");
            var taskId = this.parentElement.querySelector('input[name="taskId"]').value;
            console.log(taskId);
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
            var dueDate = this.parentElement.querySelector(`input[name="taskDueDate"]`).value;
            var favorite = this.parentElement.querySelector('input[name="taskFavorite"]').value;
            var updatedAt = this.parentElement.querySelector('input[name="taskUpdateAt"]').value;

            console.log(taskId);
            console.log(title);
            document.getElementById('taskIdEditHidden').value = taskId;
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

    shareBtns.forEach(shareBtn => {

        shareBtn.onclick = function() {
            console.log("Edit icon clicked.");
            var userId = this.parentElement.querySelector('input[name="userId"]').value;
            var username = this.parentElement.querySelector('input[name="username"]').value;
            var email = this.parentElement.querySelector('input[name="email"]').value;
            var name = this.parentElement.querySelector('input[name="name"]').value;

            console.log(userId);
            console.log(username);
            console.log(email);
            console.log(name);

            document.getElementById('sharingUsername').innerHTML = username;
            document.getElementById('sharingName').innerHTML = name;
            document.getElementById('sharingEmail').innerHTML = email;
            document.getElementById('sharingUserID').value = userId;

            showShareModal(userId);
        }
    });

    // Get the search input element
    const searchInput = document.getElementById('searchInput');

    // Add an event listener to detect 'enter' key press in the top bar search
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            // Submit the search form when 'enter' is pressed
            document.getElementById('searchUserForm').submit();
        }
    });

    // Get the search user input
    const searchUserInput = document.getElementById('searchUserInput');

    // Add an event listener to detect 'enter' key press in the top bar search
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            // Submit the search form when 'enter' is pressed
            document.getElementById('searchUserForm').submit();
        }
    });

    console.log(editBtns);





