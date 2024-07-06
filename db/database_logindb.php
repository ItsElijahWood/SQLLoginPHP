<?php

$host = 'localhost'; // replace with your database host

$dbname = 'login_db'; // replace with your database name
$username = 'root'; // replace with your username
$password = ''; // Replace with your password if you have set one

$mysqli = new mysqli(
    hostname: $host,
    password: $password,
    database: $dbname
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;