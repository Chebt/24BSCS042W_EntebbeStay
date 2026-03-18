<?php
include 'db_config.php';
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Logic to handle if the session is an array or a string
$displayName = is_array($_SESSION['user']) ? $_SESSION['user']['username'] : $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntebbeStay | 24BSCS042W</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="nav">
        <h1>EntebbeStay Booking</h1>
        
        <p>Logged in as: <strong><?php echo htmlspecialchars($displayName); ?></strong> | <a href="logout.php">Logout</a></p>
    </div>
</header>

<main class="hotel-grid">
    <?php
    $sql = "SELECT * FROM hotels";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //
            $imageName = strtolower(str_replace(' ', '_', $row['name'])) . ".jpg"; 
            
            echo "
            <div class='hotel-card'>
                <img src='assets/" . $imageName . "' alt='" . $row['name'] . "' class='hotel-img' onerror=\"this.src='assets/default-hotel.jpg'\">
                <div class='content'>
                    <h3>" . $row['name'] . "</h3>
                    <div class='stars'>" . str_repeat('★', (int)$row['rating']) . "</div>
                   
                    <p class='services'><strong>Services:</strong> " . $row['services'] . "</p>
                    <p class='availability'>Available Spaces: " . $row['available_space'] . "</p>
                    
                    <a href='" . $row['website'] . "' target='_blank' class='btn-book'>View Website</a>
                </div>
            </div>";
        }
    } else {
        echo "<p>No hotels found in the database.</p>";
    }
    ?>
</main>

</body>
</html>
