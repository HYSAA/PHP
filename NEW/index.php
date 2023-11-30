<?php
// Database connection parameters
$host = 'your_mysql_host';
$dbname = 'mydatabase';
$username = 'your_mysql_username';
$password = 'your_mysql_password';

// Establish a database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Function to verify user login
function login($email, $password, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        return true;
    } else {
        // Login failed
        return false;
    }
}

// Example usage
$email = 'user@example.com';
$password = 'password';

if (login($email, $password, $pdo)) {
    echo "Login successful!";
} else {
    echo "Login failed!";
}
?>
