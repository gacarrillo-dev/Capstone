
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

    // Get the button that opens the modal
    var btn = document.getElementById("createTaskBtn");

    // Get the button that opens the modal
    var btn2 = document.getElementById("createListBtn");

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