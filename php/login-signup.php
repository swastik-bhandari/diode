<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Mentor</title>
    <link rel="stylesheet" href="../css/login-login-styles.css">
</head>
<body>
<?php 
$usernameerr = $passworderr = ""; // Initialize error variables
$username = $password = "";       // Initialize input variables

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Function to validate the password
    function check_password($password1) {
        global $passworderr;
        $pattern = '/^(?=.*[a-zA-Z])(?=.*[\W]).+$/';
        
        if (strlen($password1) < 8) {
            $passworderr = "Password must have at least 8 characters.";
            return false;
        }
        if (!preg_match($pattern, $password1)) {
            $passworderr = "Password must contain at least one letter and one special character.";
            return false;
        }
        return true;
    }

    // Function to validate the username
    function check_username($username1) {
        global $usernameerr;
        
        if (strlen($username1) < 8) {
            $usernameerr = "Username must have at least 8 characters.";
            return false;
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username1)) { // Only letters and numbers allowed
            $usernameerr = "Username can only contain letters and numbers.";
            return false;
        }
        return true;
    }

    // Perform validation
    $isPasswordValid = check_password($password);
    $isUsernameValid = check_username($username);

    if ($isPasswordValid && $isUsernameValid) {
        
    }
}
?>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div id="login-container">
            <h2>Login</h2>

            <!-- Username Input -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required 
                    value="<?php echo htmlspecialchars($username); ?>">
                <span id="usernameerr" style="color:red;"><?php echo $usernameerr; ?></span>
            </div>

            <!-- Password Input -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span id="passworderr" style="color:red;"><?php echo $passworderr; ?></span>
            </div>

            <!-- Show Password -->
            <div class="input-group" id="showpassword">
                <label for="show-password">Show Password</label>
                <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
            </div>

            <!-- Submit Button -->
            <div class="input-group">
                <button class="button" id="login-btn">Login</button>
            </div>
        </div>
    </form>

    <!-- JavaScript to Toggle Password Visibility -->
    <script src="../js/login-signup-script.js">
    </script>
     
</body>
</html>
