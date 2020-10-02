<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #e8ffff;
        }
    </style>
</head>
<body>
<?php

$username = $_POST["username"];
$password = $_POST["pass"];


if($username === "eval" && $password === "eva") {       // Checking if the login credentials are correct
    echo "<h2> Correct Credentials </h2>";
    session_start();        // This starts the session
    $_SESSION['count'] = 2;
    echo " Upload New Images: <a href='newupload.php'>Click</a> <br/>";
} else {
    echo ("Enter proper username and password <br>");
    echo '<a href="index.php">Login Screen</a>';
}
?>

</body>
</html>