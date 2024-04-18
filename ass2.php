<!DOCTYPE html>
<html>
<head>
	<title>Assigment Two</title>
</head>
<body>
<?php
function DoctorLocation($day) {
    switch ($day) {
        case 'Monday':
            return "The doctor is in Nairobi";
        case 'Tuesday':
            return "The doctor is in Nakuru";
        case 'Wednesday':
            return "The doctor is in Kericho";
        case 'Thursday':
            return "The doctor is in Kisumu";
        case 'Friday':
            return "The doctor is in Narok";
        default:
            return "The doctor's location is unknown";
    }
}
$selectedDay = '';
$doctorLocation = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDay = isset($_POST["day"]) ? $_POST["day"] : '';
    $doctorLocation = DoctorLocation($selectedDay);
}
?><form method="post" action="">
        <label for="day">Select a day:</label>
        <select id="day" name="day" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
        </select>
        <button type="submit">Check Doctor's Location</button>
    </form>
    <?php if (!empty($doctorLocation)): ?>
        <p><?php echo $doctorLocation; ?></p>
    <?php endif; ?>
</body>
</html>