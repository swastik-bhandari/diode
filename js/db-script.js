// Select the button and dropdown menu
const profileButton = document.querySelector("#profile-btn");
const profileMenu = document.querySelector("#dropdown");

// Add an event listener to toggle the dropdown
profileButton.addEventListener("click", (event) => {
    event.stopPropagation(); // prevents the event from propagating up to the parent elements in DOM structure
    profileMenu.style.display = profileMenu.style.display === "flex" ? "none" : "flex";
});

// Add an event listener to the window to close the dropdown when clicking outside
window.addEventListener("click", () => {
    profileMenu.style.display = "none";
});

const logOutModal = document.querySelector("#logout-modal");
const logOutLink = document.querySelector("#d");
const confirmLogout = document.querySelector("#confirm-logout");
const cancelLogout = document.querySelector("#cancel-logout");
const statusLink = document.querySelector("#a");

// Open the modal when "Log Out" is clicked
logOutLink.addEventListener("click", () => {
    logOutModal.style.display = "flex";
});

// Close the modal and log out if "Yes" is clicked
confirmLogout.addEventListener("click", () => {
    logOutModal.style.display = "none";
    console.log("User logged out"); // Replace with actual log-out logic
});

// Close the modal if "No" is clicked
cancelLogout.addEventListener("click", () => {
    logOutModal.style.display = "none";
});

// Close the modal if clicking outside the modal content
window.addEventListener("click", (event) => {
    if (event.target === logOutModal) {
        logOutModal.style.display = "none";
    }
});

// Note: Clicking on the modal content will not trigger this event because the target of the event(event.target) 
// will be the content inside the modal(.modal-content), not the modal background.(logOutModal) 

statusLink.addEventListener("click", () => {
    window.location.href = "status.php"; 
});

const inputField = document.getElementById('search-bar');


inputField.addEventListener('focus', function() {
    myFunction(); 
});

function myFunction() {
  window.location.href = "../php/search.php";  
}