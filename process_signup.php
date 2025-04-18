<?php
session_start();
include 'db_connect.php';

// Create 'users' table if it doesn't exist
$createTableQuery = "
    CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

if (!$conn->query($createTableQuery)) 
{
    die("Table creation failed: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hash

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) 
    {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) 
    {
        $_SESSION['error'] = "Email already exists!";
        header("Location: signup.php");
        exit();
    }
    $stmt->close();

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    if (!$stmt) 
    {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $fullname, $email, $password);
    if ($stmt->execute()) 
    {
        $_SESSION['success'] = "Account created! Please log in.";
        header("Location: login.php");
        exit();
    } 
    else 
    {
        $_SESSION['error'] = "Signup failed. Try again.";
        header("Location: signup.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
