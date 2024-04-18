<!DOCTYPE html>
<html>
<head>
    <title>PHP Arrays</title>
</head>
<body>
<?php
$cars = array('Toyota' => ['Fielder','Probox','IST'],
'Nissan' => ['Bluebird','Wingroad','Patrol']);
foreach ($cars as $manufacturer => $models) {
    echo "<h2>$manufacturer</h2>";
    foreach ($models as $model) {
        echo "$model<br>";
    }
}
?>
</body>
</html>