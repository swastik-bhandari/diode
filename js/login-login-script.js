function togglePassword() {
    const passwordField = document.getElementById('password');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}

const signupLink = document.querySelector("#signup");
signupLink.addEventListener("click", () => {
    // Redirect to another page when the status button is clicked
    window.location.href = "login-signup.php"; // Redirects to a new page, you can change the URL here
});