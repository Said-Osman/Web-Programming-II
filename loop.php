<!DOCTYPE html>
<html>
<head>
	<title>Looping System</title>
</head>
<body>
<div>
	<h3>Loops Form</h3>
	<form method="post" action="">
		<label for="start">Starting No:</label>
		<input type="text" name="start"><br>
		<label for="end">Ending No:</label>
		<input type="text" name="end"><br><br>
		<input type="submit" name="print" value="Print">
	</form>
</div>
<hr>
	<?php
      $start = $_POST['start'];
      $end = $_POST['end'];
      if(isset($_POST['print'])){
      	if($start<$end){
      		while($start<=$end){
      			echo "$start<br>";
      			$start++;
      		}
      	}
      	elseif($start>$end){
      		while($start>=$end){
            echo "$start<br>";
            $start--;
        }
      	}
      }

	?>
</body>
</html>