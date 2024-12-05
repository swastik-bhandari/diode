<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Mentor</title>
    <link rel="stylesheet" href="../css/login-signup-styles.css">
</head>
<body>
<?php 
session_start();
$usernameerr = $passworderr = ""; // Initialize error variables
$username = $password = "";       // Initialize input variables

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Function to validate the password
    function check_password($password) {
        global $passworderr;
        $pattern = '/^(?=.*[a-zA-Z])(?=.*[\W]).+$/';
        
        if (strlen($password) < 8) {
            $passworderr = "Password must have at least 8 characters.";
            return false;
        }
        if (!preg_match($pattern, $password)) {
            $passworderr = "Password must contain at least one letter and one special character.";
            return false;
        }
        return true;
    }

    // Function to validate the username
    function check_username($username) {
        global $usernameerr;

        if (strlen($username) < 8) {
            $usernameerr = "Username must have at least 8 characters.";
            return false;
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { // Only letters and numbers allowed
            $usernameerr = "Username can only contain letters and numbers.";
            return false;
        }
        $conn = new mysqli("localhost", "root", "", "diode");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT username FROM user_info WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $usernameerr = "Username already exists.";
            $stmt->close();
            $conn->close();
            return false;
        }

        $stmt->close();
        $conn->close();
        return true;
    }

    // Perform validation
    $isPasswordValid = check_password($password);
    $isUsernameValid = check_username($username);

    if ($isPasswordValid && $isUsernameValid) {
        $conn = new mysqli("localhost", "root", "", "diode");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "INSERT INTO user_info (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Secure password hashing
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION["username"] = $username;
            header("Location:login-login.php");
            exit();
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
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
            <input type="password" id="password" name="password" placeholder="Enter your password" required
                value="<?php echo htmlspecialchars($password); ?>">
            <span id="passworderr" style="color:red;"><?php echo $passworderr; ?></span>
        </div>

        <!-- Show Password -->
        <div class="input-group" id="showpassword">
            <label for="show-password">Show Password</label>
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
        </div>

        <!-- Submit Button -->
        <div class="input-group">
            <button type="submit" class="button" id="login-btn">Login</button>
        </div>
    </div>
</form>

<script src="../login-signup-script.js"></script>

</body>
</html>
