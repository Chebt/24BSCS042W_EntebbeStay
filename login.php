<?php
include 'db_config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape inputs to prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT id, username FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        
        // Store as an array so index.php can read it correctly
        $_SESSION['user'] = [
            'id' => $userData['id'],
            'username' => $userData['username']
        ];
        
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EntebbeStay</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="login-box">
        <h2>EntebbeStay Login</h2>
        <h3>Welcome to EntebbeStay Hotel Service</h3>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" style="width: 100%; margin-top: 10px;">Login</button>
        </form>
        <p style="margin-top: 15px; font-size: 0.8em;">Don't have an account? Contact Admin.</p>
    </div>
</body>
</html>
