<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>

        body {
            background-image: url(photos/sas.jpeg);
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
            border: 1px solid blueviolet; 
            border-radius: 5px;
            background-color: transparent; 
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%; 
            margin-bottom: 10px; 
            padding: 5px; 
            border: 1px solid blue; 
            border-radius: 3px; 
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff; 
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
            <a href="register.php">Register</a>
        </form>
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

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: said.php");
            exit;
        } else {
            $login_error = "Invalid username or password";
        }
    } else {
        $login_error = "Invalid username or password";
    }

    $stmt->close();
}
?>
</body>
</html>