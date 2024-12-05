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
$username = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function test_input($data) {
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (!preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $password)) {
        $error_message = "* Password must be at least 8 characters long, with one uppercase and one special character.";
    } else {
        $conn = new mysqli("localhost", "root", "", "diode");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT password FROM signin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = "* Incorrect password.";
            }
        } else {
            $error_message = "* Username not found.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div id="login-container">
        <div><h2>Login</h2></div>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required value="<?php echo $username; ?>">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <span class="error"><?php echo $error_message; ?></span>
        </div>

        <div class="input-group" id="showpassword">
            <div>
                <label for="show-password">Show Password</label>
            </div>
            <div>
                <input type="checkbox" id="show-password" onclick="togglePassword()">
            </div>
        </div>

        <div class="input-group">
            <button class="button" id="login-btn" type="submit">Log In</button>
        </div>
    </div>
    
</form>

<a href="#" id="signup">Sign up</a>
<script src="../js/login-login-script.js">

</script>
</body>
</html>