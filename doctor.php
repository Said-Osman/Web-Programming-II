<!DOCTYPE html>
<html>
<head>
	<title>Doctor Schedule</title>
</head>
<body>
	<div>
		<form method="post" action="">
			<h2>Doctors Schedule Form</h2>
			<label>Day</label>
			<select name="day">
				<option value="" selected>--Select day--</option>
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
				<option value="Sunday">Sunday</option>
			</select><br><br>
			<input type="Submit" name="Submit_btn" value="Reset">
			<input type="Submit" name="Submit_btn" value="Check Doctor's Location">
			
		</form>
	</div><hr>
	<div>
		<h3>Doctor's Schedule Results</h3>
		<?php
		$day = $_POST['day'];
		if(isset($_POST['Submit_btn'])){
			if($day =="Monday"){
				echo "<h4>You Selected ".$day. ": The doctor is in Nairobi</h4>";
			}
			elseif ($day =="Tuesday") {
				echo "<h4>You Selected ".$day.": The doctor is in Nakuru</h4>";
			}
			elseif ($day =="Wednesday") {
				echo "<h4>You Selected ".$day.": The doctor is in Kericho</h4>";
			}
			elseif ($day =="Thursday") {
				echo "<h4>You Selected ".$day.": The doctor is in Kisumu</h4>";
			}
			elseif ($day =="Friday") {
				echo "<h4>You Selected ".$day.": The doctor is in Narok</h4>";
			}
			elseif ($day =="Saturday" || $day == "Sunday") {
				echo "<h4>You Selected ".$day.": The doctor is at home resting</h4>";
			}
			else{
				echo "INVALID";
			}

		}
		?>
	</div>
</body>
</html>