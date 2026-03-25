<?php
include 'db_config.php';
session_start();

// Get the Hotel ID from the URL
$hotel_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$hotel_query = $conn->query("SELECT * FROM hotels WHERE id = $hotel_id");
$hotel = $hotel_query->fetch_assoc();

if (!$hotel) { die("Hotel not found!"); }

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['user']['username'];
    $in = $_POST['check_in'];
    $out = $_POST['check_out'];
    $guests = $_POST['guests'];

    $sql = "INSERT INTO bookings (hotel_id, user_name, check_in, check_out, guests) 
            VALUES ($hotel_id, '$user', '$in', '$out', $guests)";

    if ($conn->query($sql)) {
        // Reduce available space by 1
        $conn->query("UPDATE hotels SET available_space = available_space - 1 WHERE id = $hotel_id");
        echo "<script>alert('Booking Successful!'); window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book <?php echo $hotel['name']; ?></title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #f4f7f6; }
        .form-container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #27ae60; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Reserve at <?php echo $hotel['name']; ?></h2>
        <p>Location: <?php echo $hotel['location']; ?></p>
        <form method="POST">
            <label>Check-in Date:</label>
            <input type="date" name="check_in" required>
            <label>Check-out Date:</label>
            <input type="date" name="check_out" required>
            <label>Number of Guests:</label>
            <input type="number" name="guests" min="1" max="10" required>
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
