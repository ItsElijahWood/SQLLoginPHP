<?php

session_start();

//* Checks the database for the user table then grabs the id
if (isset($_SESSION["user_id"])) {
    //* connects to database using the file
    $mysqli = require __DIR__ . "/db/database_logindb.php";
    //* searches from the user table for user id
    $sql = "SELECT * FROM user
    WHERE id = {$_SESSION["user_id"]}";
    //* executes the thing inside the $sql var code
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/dashboard/webdev/css/styles.css">
    <link rel="stylesheet" href="/dashboard/webdev/css/signup-success.css">
</head>

<body>

    <?php if (isset($user)): ?>

        <div class="container">
            <nav class="nav">
                <i class="uil uil-bars navOpenBtn"></i>
                <a href="/dashboard/webdev/index.php" class="logo" style="color: white;">Project Undefined</a>
                <ul class="nav-links">
                    <i class="uil uil-times navCloseBtn"></i>
                    <li><a href="/dashboard/webdev/index.php" style="color: white;">Home</a></li>
                    <li><a href="/dashboard/webdev/logout.php" style="color: white;">Logout</a></li>
                    <li><a href="/dashboard/webdev/pages/portals.php" style="color: white;">Portal</a></li>
                    <li><a href="/dashboard/webdev/pages/games.php" style="color: white;">Games</a></li>
                </ul>
                <li><a></a></li>
        </div>
        </nav>
        </div>

        <br><br><br><br><br>
        <h1 style="color: black;">Already Signed Up</h1>
        <p>You've already signed up!</p>

    <?php else: ?>

        <div class="container">
            <nav class="nav">
                <i class="uil uil-bars navOpenBtn"></i>
                <a href="/dashboard/webdev/index.php" class="logo" style="color: white;">Project Undefined</a>
                <ul class="nav-links">
                    <i class="uil uil-times navCloseBtn"></i>
                    <li><a href="/dashboard/webdev/index.php" style="color: white;">Home</a></li>
                    <li><a href="/dashboard/webdev/login.php" style="color: white;">Login</a></li>
                    <li><a href="/dashboard/webdev/signup.php" style="color: white;">Register</a></li>
                </ul>
                <li><a></a></li>
        </div>
        </nav>
        </div>

        <br><br><br><br>
        <h1>Signup</h1>

        <p>Signup successful.</p>

    <?php endif; ?>
</body>

</html>