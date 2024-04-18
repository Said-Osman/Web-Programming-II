<!DOCTYPE html>
<html>
<head>
    <title>Print Numbers</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $start = $_POST["start"];
    $end = $_POST["end"];

    // Validate input
    if (!is_numeric($start) || !is_numeric($end)) {
        echo "Please enter valid numeric values for both the starting and ending numbers.";
    } else {
        // Print numbers in ascending or descending order
        if ($start < $end) {
            for ($i = $start; $i <= $end; $i++) {
                echo "$i<br>";
            }
        } elseif ($start > $end) {
            for ($i = $start; $i >= $end; $i--) {
                echo "$i<br>";
            }
        } else {
            echo "Starting and ending numbers are the same: $start";
        }
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Enter starting number: <input type="text" name="start"><br>
    Enter ending number: <input type="text" name="end"><br>
    <input type="submit" value="Print Numbers">
</form>

</body>
</html>