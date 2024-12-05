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
const logOutLink = document.querySelector("#dropdown a:nth-child(3)");
const confirmLogout = document.querySelector("#confirm-logout");
const cancelLogout = document.querySelector("#cancel-logout");

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

document.getElementById("search-bar").addEventListener("click", function() {
    // Redirect to another page when the search button is clicked
    window.location.href = "search.html"; // Redirects to a new page, you can change the URL here
});
