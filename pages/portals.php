<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // connects to database
    $mysqli = require __DIR__ . "/../db/database_logindb.php";
    // searches from the user table
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    // executes the thing inside the $sql var
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/dashboard/webdev/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="/dashboard/webdev/css/portals.css" />
</head>

<body>
    <?php if (isset($user)): ?>
        <div class="container">
            <br><br>
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

        <div style="position: relative; width: 100%; height: 0; padding-top: 56.2225%;
  padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
  border-radius: 8px; will-change: transform;">
            <iframe loading="lazy"
                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAGFAyNyzWw&#x2F;pk6bPtnBMVrz4IiSOBx6UQ&#x2F;view?embed"
                allowfullscreen="allowfullscreen" allow="fullscreen">
            </iframe>
        </div>

    <?php else: ?>

        <div class="container">
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

            <br><br><br><br><br>
            <h2 style="text-align: center;">You are not logged In</h2>
            <p style="text-align: center;">To use the full page please register an account or login.</p>
        </div>

    <?php endif; ?>
</body>

</html>