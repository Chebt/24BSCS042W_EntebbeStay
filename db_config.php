<?php
$conn = new mysqli('db', 'root', 'school_password', 'coursework_db');
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
