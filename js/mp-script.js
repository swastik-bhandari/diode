const dashboardLink = document.querySelector("#db-btn");
dashboardLink.addEventListener("click", () => {
    // Redirect to another page when the status button is clicked
    window.location.href = "dashboard.php"; // Redirects to a new page, you can change the URL here
});