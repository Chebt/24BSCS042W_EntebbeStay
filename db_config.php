<?php
// Check if we are in Docker (Host is 'db') or XAMPP (Host is 'localhost')
$host = (getenv('DB_HOST')) ? 'db' : 'localhost';
$user = 'root';
// Use my password for Docker, or empty for XAMPP
$pass = ($host === 'db') ? 'chebt32' : ''; 
$dbname = 'coursework_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}
?>