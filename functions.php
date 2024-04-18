<!DOCTYPE html>
<html>
<head>
	<title>Functions</title>
</head>
<body>
	<?php
	//Function Without Arguments
	function AddNum(){ 
		$a = 20;
		$b = 30;
		$sum = $a + $b;
		echo $sum;
	}
		AddNum();
		//Function with parameters
		function Sum ($a, $b){
			$Sum = $a+$b;
			echo $Sum;
		}
		Sum(100,450);
		
	?>


</body>
</html>