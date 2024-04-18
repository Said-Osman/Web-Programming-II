<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        .confirmation-box {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
        }

        .confirmation-box button {
            margin: 0 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f1f1f1;
            cursor: pointer;
        }
    </style>
    <script>
        function cancelLogout() {
            window.location.href = "said.php";
        }
    </script>
</head>
<body>
    <div class="confirmation-box">
        Are you sure you want to logout?
        <form method="post" action="">
            <input type="submit" name="confirm_logout" value="Yes">
            <button type="button" onclick="cancelLogout()">No</button>
        </form>
    </div>
    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirm_logout"])) {
        $_SESSION = array();

        session_destroy();

        header("Location: login.php");
        exit;
    } else {
        header("Location: said.php");
        exit;
    }
}
?>

</body>
</html>