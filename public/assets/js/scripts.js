
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

    // Get the button that opens the modal
    var btn = document.getElementById("createTaskBtn");

    // Get the button that opens the modal
    var btn2 = document.getElementById("createListBtn");

    // Get the button that deletes the task
    var deleteBtns = document.querySelectorAll(`#deleteBtn`);

    var confirmDeleteBtn = document.getElementById("confirmDelete");

    var deleteModal = document.getElementById("deleteTaskModal");

    var taskIdInput = document.getElementById("taskId");

    //function to handle delete modal display
    function showDeleteModal(taskId){
        deleteModal.style.display = "block";
        taskIdInput.value = taskId;
    }

    // When the user clicks the button, open the modal
    btn.onclick = function() {
    console.log("Plus icon clicked.");
    var modal = document.getElementById("createTaskModal");
    modal.style.display = "block";
}

    btn2.onclick = function() {
    console.log("Plus icon clicked.");
    var modal = document.getElementById("createListModal");
    modal.style.display = "block";
}

    deleteBtns.forEach(deleteBtn => {

        deleteBtn.onclick = function() {
            console.log("Trash icon clicked.");
            var taskId = this.parentElement.querySelector('input[name="taskId"]').value;
            console.log(taskId);
            showDeleteModal(taskId);
            document.getElementById('taskIdLabel').innerText = taskId;

        }
    });

    confirmDeleteBtn.onclick = function(){
        document.getElementById("deleteTaskForm").submit();
        console.log("Confirm Deletion");

    }

