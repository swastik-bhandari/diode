<?php
        session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Your Mentor</title>  
        <link rel="stylesheet" href="../css/db-styles.css">
    </head>
    <body>
        <?php
    
    
        if (!isset($_SESSION['username'])) {
            header("Location:login-signup.php");
            exit();
        }
        
        
        ?>
        <div id = "db-profile">
            <button id = "profile-btn">Profile</button>
            <div id="dropdown">
            <a href="#" id="a">Status</a>
            <a href="#" id="b">Points</a>
            <a href="#" id="c">Ranks</a>
            <a href="#" id="d">Log Out</a>
            </div>
        </div>

        <div id = "db-greet">
            <h1>
                <?php echo "Welcome back".$_SESSION['username']?>
            </h1>
        </div>

        <div id = "db-user-info">
            <div id = "user-name">
            <?php echo $_SESSION['username']?>
            </div> 
            <div id = "user-rank">
                Student
            </div>
        </div>

        <div id = "db-search">
            <input type="text" id="search-bar" placeholder="Search mentors or topics...">
            <button id="search-btn">🔍</button>
        </div>

        <div id="db-options">
            <div class="option" id="your-schedule">
                <h3>Your Schedule</h3>
                <p>View and manage your appointments.</p>
            </div>
            <div class="option" id="communities">
                <h3>Communities</h3>
                <p>Engage with skill-specific communities.</p>
            </div>
        </div>

        <!-- Custom Modal for Logout Confirmation -->
        <div id="logout-modal" class="modal">
            <div class="modal-content">
                <div class="modal-text">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-buttons">
                    <a href="login-login.php"><button id="confirm-logout">Yes</button></a>
                    <button id="cancel-logout">No</button>
                </div>
            </div>
        </div>

        <script src="../js/db-script.js"></script>
    </body>
</html>