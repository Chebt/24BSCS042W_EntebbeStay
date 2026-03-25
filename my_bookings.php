<?php
include 'db_config.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = is_array($_SESSION['user']) ? $_SESSION['user']['username'] : $_SESSION['user'];

// JOIN query to get hotel names from 'hotels' and dates from 'bookings'
$sql = "SELECT b.*, h.name as hotel_name, h.location, h.image 
        FROM bookings b 
        JOIN hotels h ON b.hotel_id = h.id 
        WHERE b.user_name = '$username' 
        ORDER BY b.booking_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings - EntebbeStay </title>
    <link rel="stylesheet" href="" class="stylesheet">
</head>
<body>

<div class="booking-container">
    <a href="index.php" class="back-link">← Back to Hotels</a>
    <h1>My Reservations</h1>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="booking-card">
                <div>
                    <h3 style="margin:0;"><?php echo htmlspecialchars($row['hotel_name']); ?></h3>
                    <p style="color: #666; margin: 5px 0;">📍 <?php echo htmlspecialchars($row['location']); ?></p>
                    <p><strong>Dates:</strong> <?php echo $row['check_in']; ?> to <?php echo $row['check_out']; ?></p>
                    <small>Booked on: <?php echo date('M d, Y', strtotime($row['booking_date'])); ?></small>
                </div>
                <div style="text-align: right;">
                    <span class="status-badge">Confirmed</span>
                    <p><strong>Guests:</strong> <?php echo $row['guests']; ?></p>
                </div>

                <!-- Add this inside your booking-card div in my_bookings.php -->
                <div style="text-align: right;">
                    <span class="status-badge">Confirmed</span>
                    <p><strong>Guests:</strong> <?php echo $row['guests']; ?></p>
    
                <!-- Cancellation Link with Confirmation -->
                <!-- prevents accidental clicks from ruining a customer's trip!-->
                <a href="cancel_booking.php?id=<?php echo $row['id']; ?>" 
                onclick="return confirm('Are you sure you want to cancel this booking? This will free up the room for others.');"
                style="color: #e74c3c; font-size: 0.85em; text-decoration: none; font-weight: bold;">
                    Cancel Reservation
                </a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div style="text-align: center; padding: 50px; background: white; border-radius: 10px;">
            <p>You haven't made any bookings yet!</p>
            <a href="index.php" class="btn-book" style="background:#2c3e50; color:white; padding:10px; 
            text-decoration:none; border-radius:5px;">Find a Hotel</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
