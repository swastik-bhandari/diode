<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:login-login.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Monospace&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.2rem;
            margin: 0;
            padding: 0;
            color: #333;
        }
        
        figure {
            margin: 20px;
            text-align: center;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        img {
            height: 300px;
            width: auto;
            border-radius: 10px;
        }

        figcaption {
            font-family: 'Monospace', sans-serif;
            font-size: 1.5rem;
            margin-top: 15px;
            color: #555;
        }

        .info {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .button-container {
            margin-top: 30px;
        }

        button {
            background-color: #e74c3c;
            color: white;
            height: 50px;
            width: 250px;
            border-radius: 25px;
            border: none;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<figure>
    <img src="../resource/person1.jpg" alt="Mentor Image">
    <figcaption><h1><?php echo htmlspecialchars($_POST['user']); ?></h1></figcaption>
</figure>

<div class="info">
    <?php
    $conn = new mysqli("localhost", "root", "", "diode");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching skill areas
    $query = "SELECT programming, data_science, ai, software_engineering, database_management, networking, cloud, ui_ux FROM mentor_info WHERE username = ?";
    $stms = $conn->prepare($query);
    $stms->bind_param("s", $_POST['user']);
    $stms->execute();
    $result = $stms->get_result();
    if ($result->num_rows > 0) {
        echo "<p><strong>Expertise Areas:</strong><br>";
        $skills = [];
        while ($row = $result->fetch_assoc()) {
            if ($row['programming'] == 1) $skills[] = "Programming";
            if ($row['data_science'] == 1) $skills[] = "Data Science";
            if ($row['ai'] == 1) $skills[] = "AI";
            if ($row['software_engineering'] == 1) $skills[] = "Software Engineering";
            if ($row['database_management'] == 1) $skills[] = "Database Management";
            if ($row['networking'] == 1) $skills[] = "Networking";
            if ($row['cloud'] == 1) $skills[] = "Cloud";
            if ($row['ui_ux'] == 1) $skills[] = "UI/UX";
        }
        echo implode(', ', $skills) . "</p>";
    }
    $conn->close();

    // Fetching schedule
    $conn = new mysqli("localhost", "root", "", "diode");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT start_time, end_time FROM schedule WHERE username = ?";
    $stms = $conn->prepare($query);
    $stms->bind_param("s", $_POST['user']);
    $stms->execute();
    $result = $stms->get_result();
    if ($result->num_rows > 0) {
        echo "<p><strong>Lecture Schedule:</strong><br>";
        while ($row = $result->fetch_assoc()) {
            echo htmlspecialchars($row['start_time']) . " to " . htmlspecialchars($row['end_time']) . "<br>";
        }
    }
    $conn->close();

    // Fetching experience
    $conn = new mysqli("localhost", "root", "", "diode");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT first_exp, second_exp, third_exp, fourth_exp FROM mentor_experience WHERE username = ?";
    $stms = $conn->prepare($query);
    $stms->bind_param("s", $_POST['user']);
    $stms->execute();
    $result = $stms->get_result();
    if ($result->num_rows > 0) {
        echo "<p><strong>Experience:</strong><br>";
        while ($row = $result->fetch_assoc()) {
            if ($row['first_exp'] == 1) echo "Less than 6 Months<br>";
            else if ($row['second_exp'] == 1) echo "6 Months - 1 Year<br>";
            else if ($row['third_exp'] == 1) echo "1 Year - 2 Years<br>";
            else if ($row['fourth_exp'] == 1) echo "2 Years - 4 Years<br>";
        }
    }
    $conn->close();
    ?>
</div>

<div class="button-container">
    <button><a href="https://abhiyan.digitalsamba.com/demo-room">Join Meeting</a></button>
</div>

</body>
</html>
