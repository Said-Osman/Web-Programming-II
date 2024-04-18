<!DOCTYPE html>
<html>
<head>
    <title>Time Management System</title>
    <link rel="stylesheet" type="text/css" href="said.css">
</head>
<body> 
       <div class="navbar">
        <a href="said.php">Home</a>
        <a href="osman.php">Add Activities</a>
        <a href="sajda.php">View Activities</a>
        <a href="logout.php" style="float: right;">Logout</a>
    </div>
    <br>
    <div>
        <?php
         include 'liveclock.php'; 
        ?>
    </div>
    <div class="content">
           <?php if (isset($_SESSION["username"])) { ?>
            <h1>Hello, <?php echo $_SESSION["username"]; ?>! Welcome to</h1>
        <?php } else { ?>
            <h1>Welcome!</h1>
        <?php } ?>
        <h1>Time Management System</h1>
        <p>This application allows you to manage your activities effectively.</p>
        <p>To add a new activity, click on "Add Activities" in the navbar. To view your activities, click on "View Activities".</p>
    </div>
        <ul>
            <?php 
            $activities=activities;
            foreach ($activities as $activity) {?>
                <li><?php echo $activity["activity"]; ?> (<?php echo $activity["start_time"]; ?> - <?php echo $activity["end_time"]; ?>)</li>
            <?php  }?>
        </ul>
    </div>
    <?php
       include 'calendar.php';
    ?>
       <script>
        function toggleActivities() {
            var activitiesDiv = document.getElementById("activities");
            if (activitiesDiv.style.display === "none") {
                activitiesDiv.style.display = "block";
            } else {
                activitiesDiv.style.display = "none";
            }
        }
    </script>
         <div class="custom-text">
            <P>Developed By Said Osman</P>
            <p>Contact me at saidosman4217@gmail.com</p>
        </div>
        <?php
session_start();

require_once "functions.php";
require_once "database.php";

redirectIfNotLoggedIn();
$user_id = $_SESSION["id"];
$sql = "SELECT id, activity, start_time, end_time FROM activities WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$activities = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
</body>
</html>