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
    <title>Games</title>
    <link rel="stylesheet" href="/dashboard/webdev/css/styles.css">
    <link rel="stylesheet" href="/dashboard/webdev/css/games.css">
</head>

<body>

    <?php if (isset($user)): ?>
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


        <br><br><br>
        <h1 style="color: white;">Choose a Game</h1>

        <div style="text-align: center;">
            <a href="/dashboard/webdev/pages/games/guess-the-number/numguess-page.php" style="color: white;">Guess the
                Number</a>
        </div>


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

        <br><br><br><br><br>
        <h2 style="text-align: center; color: white;">You are not logged In</h2>
        <p style="text-align: center; color: white;">To use the full page please register an account or login.</p>

    <?php endif; ?>
</body>

</html>