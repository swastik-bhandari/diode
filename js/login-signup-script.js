
function togglePasswordVisibility() {
    const passwordField = document.getElementById("password");
    const showPassword = document.getElementById("show-password");
    passwordField.type = showPassword.checked ? "text" : "password";
}