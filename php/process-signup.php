<?php

// If name is empty die
if (empty($_POST["name"])) {
    die("Name is required");
}
// if email is invalid die
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}
// if password is not over 8 characters die
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}
// password must contain one letter die
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}
// password must contain one number die
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
// password must be same die
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}
// makes the password hash
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
// connect to database
$mysqli = require __DIR__ . "/../db/database_logindb.php";
// inserts the infomration into the database
$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
// initializes it        
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sss",
    $_POST["name"],
    $_POST["email"],
    $password_hash
);

if ($stmt->execute()) {

    header("Location: signup-success.php");
    exit;

} else {
    // if same email dieS
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}