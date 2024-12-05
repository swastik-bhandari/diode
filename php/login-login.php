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
    $username='';
    $password='';
    if($_SERVER['REQUEST_METHOD']==='POST') {
        function test_input($data) {
            $data=stripslashes($data);
            $data=trim($data);
            $data=htmlspecialchars($data);
            return $data;
        }

    $username=test_input($_POST['username']);
    $password=test_input($_POST['password']);
}
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div id="login-container">
        <div><h2>Login</h2></div>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name ="username" placeholder="Enter your username" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name ="password" placeholder="Enter your password" required> <span class ="error"> <?php 
    if(!preg_match('/[A-Z]/',$password) || !preg_match('/[\W_]/' ,$password)) {
        echo"*atleast one capital letter and one special character";
    }
    ?></span>
        </div>

        <div class="input-group" id = "showpassword">
            <div><label for="show-password">Show Password</label></div>
            <div><input type="checkbox" id="show-password"> </div>
        </div>

        <div class="input-group">
            <button class="button" id="login-btn">Log In</button>
        </div>

    </div>
    </form>
    <script src="../js/login-script.js"></script>
</body>
</html>