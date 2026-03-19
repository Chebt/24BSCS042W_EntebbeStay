<?php
$conn = new mysqli('db', 'root', 'chebt32', 'coursework_db');
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
