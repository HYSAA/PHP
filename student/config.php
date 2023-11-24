<?php
$host = "localhost";  // replace with your database host
$user = "root";       // replace with your database username
$pass = "12345";           // replace with your database password
$db = "login";    // replace with your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
