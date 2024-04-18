<!DOCTYPE html>
<html>
<head>
    <title>View Activities</title>
    <link rel="stylesheet" type="text/css" href="said.css">
</head>
<body>
    <div class="navbar">
        <a href="said.php">Home</a>
        <a href="osman.php">Add Activities</a>
        <a href="sajda.php">View Activities</a>
        <a href="logout.php" style="float: right;">Logout</a>
    </div>
    <div class="content">
        <h1>View Activities</h1>
        <ul>
            <?php foreach ($activities as $activity) { ?>
                <li><?php echo $activity["activity"]; ?> (<?php echo $activity["start_time"]; ?> - <?php echo $activity["end_time"]; ?>)</li>
            <?php } ?>
        </ul>
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