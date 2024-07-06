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
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/dashboard/webdev/css/styles.css">
    <link rel="stylesheet" href="/dashboard/webdev/css/login.css">
</head>

<body>

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
        <h1>Login</h1>

        <?php if ($is_invalid): ?>
            <span class="error">Invalid login</span><br>
        <?php endif; ?>

        <form method="post">
            <div>
                <input type="email" name="email" id="email" placeholder="Email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>

            <div>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <button>Log in</button>
            </for>
    </div>
</body>

</html>