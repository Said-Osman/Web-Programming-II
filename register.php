<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            background-image: url(photos/pic.jpeg);
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0; 
        }

        .form-container {
            width: 300px; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: transparent; 
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%; 
            margin-bottom: 10px; 
            padding: 5px; 
            border: 1px solid #ccc; 
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff; 
            color: #fff; 
            cursor: pointer; 
        }

        .login-link {
            text-align: center;
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Register">
        </form>
        <div class="login-link">
            <a href="login.php">Login</a>
        </div>
    </div>
    <?php
session_start();

require_once "functions.php";
require_once "database.php";

if (isUserLoggedIn()) {
    header("Location: said.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {

        header("Location: login.php");
        exit;
    } else {
        $registration_error = "Registration failed. Please try again.";
    }

    $stmt->close();
}
?>

</body>
</html>