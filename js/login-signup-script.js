function togglePassword() {
    const passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

const loginLink = document.querySelector("#login");
loginLink.addEventListener("click", () => {
    // Redirect to another page when the status button is clicked
    window.location.href = "login-login.php"; // Redirects to a new page, you can change the URL here
});