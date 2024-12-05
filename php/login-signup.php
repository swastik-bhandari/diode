<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Mentor</title>
    <link rel="stylesheet" href="login-login-styles.css">
</head>
<body>
    <form action="" method="POST"></form>
    <div id="login-container">
        <div><h2>Login</h2></div>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter your username" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter your password" required>
        </div>

        <div class="input-group" id = "showpassword">
            <div><label for="show-password">Show Password</label></div>
            <div><input type="checkbox" id="show-password"> </div>
        </div>


        <div class="input-group">
            <button class="button" id="register-btn">Register</button>
        </div>
    </div>

    <script src="login-login-script.js"></script>
</body>
</html>
