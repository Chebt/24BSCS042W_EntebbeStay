<?php
include 'db_config.php';
session_start();

if (isset($_GET['id'])) {
    $booking_id = (int)$_GET['id'];
    $username = is_array($_SESSION['user']) ? $_SESSION['user']['username'] : $_SESSION['user'];

    // 1. Get the hotel_id before deleting so we know which hotel to update
    $info_query = $conn->query("SELECT hotel_id FROM bookings WHERE id = $booking_id AND user_name = '$username'");
    
    if ($info_query->num_rows > 0) {
        $row = $info_query->fetch_assoc();
        $hotel_id = $row['hotel_id'];

        // 2. Delete the booking
        $conn->query("DELETE FROM bookings WHERE id = $booking_id");

        // 3. IMPORTANT: Restore the available space (+1)
        $conn->query("UPDATE hotels SET available_space = available_space + 1 WHERE id = $hotel_id");

        echo "<script>alert('Booking Cancelled. Your spot has been released.'); window.location.href='my_bookings.php';</script>";
    }
}
?>
