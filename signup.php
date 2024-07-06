<?php

$is_invalid = false;
// Looks for the request method of post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // connects to database and stores in variable
    $mysqli = require __DIR__ . "/db/database_logindb.php";
    // fetches the email from the table "user"
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );
    //  executes the SQL query stored in the variable $sql 
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        // Unhashing password to see if it verifies
        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/dashboard/webdev/css/styles.css">
    <link rel="stylesheet" href="/dashboard/webdev/css/signup.css">
</head>

<body>
    <?php if (isset($user)): ?>


        <div class="container">
            <nav class="nav">
                <i class="uil uil-bars navOpenBtn"></i>
                <a href="index.php" class="logo" style="color: white;">Project Undefined</a>
                <ul class="nav-links">
                    <i class="uil uil-times navCloseBtn"></i>
                    <li><a href="index.php" style="color: white;">Home</a></li>
                    <li><a href="login.php" style="color: white;">Login</a></li>
                    <li><a href="signup.php" style="color: white;">Register</a></li>
                </ul>
                <li><a></a></li>
        </div>
        </nav>

        <h2>You've already signed up!</h2>
        <p>To create another account log out and come back to this page.</p>

    <?php else: ?>
        <div class="container">
            <nav class="nav">
                <i class="uil uil-bars navOpenBtn"></i>
                <a href="index.php" class="logo" style="color: white;">Project Undefined</a>
                <ul class="nav-links">
                    <i class="uil uil-times navCloseBtn"></i>
                    <li><a href="index.php" style="color: white;">Home</a></li>
                    <li><a href="login.php" style="color: white;">Login</a></li>
                    <li><a href="signup.php" style="color: white;">Register</a></li>
                </ul>
                <li><a></a></li>
        </div>
        </nav>

        <div class="login-container">
            <h1>Signup</h1>
            <form action="/dashboard/webdev/php/process-signup.php" method="post" id="signup" novalidate>
                <div>
                    <input type="text" id="name" name="name" placeholder="Name">
                </div>

                <div>
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>

                <div>
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>

                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repeat password">
                </div>

                <button>Sign up</button>
            </form>
        </div>

    <?php endif; ?>
</body>

</html>