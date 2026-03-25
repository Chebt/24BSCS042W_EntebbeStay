<?php
include 'db_config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$displayName = is_array($_SESSION['user']) ? $_SESSION['user']['username'] : $_SESSION['user'];

// --- SQL QUERY BUILDING ---
$sql = "SELECT * FROM hotels WHERE 1=1";

if (!empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql .= " AND (name LIKE '%$search%' OR location LIKE '%$search%')";
}
    // this adds a rating feature
if (!empty($_GET['rating'])) {
    $rating = (int)$_GET['rating'];
    $sql .= " AND rating = $rating";
}
    // Sorts the searches by price and availability
if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'space_high': $sql .= " ORDER BY available_space DESC"; break;
        case 'price_low':  $sql .= " ORDER BY price ASC"; break;
        case 'price_high': $sql .= " ORDER BY price DESC"; break;
    }
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntebbeStay Hotel Booking Service</title>
    <!-- Linking to my external CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css?v=1.1">

</head>
<body>

<header class="nav">

<!-- Adding my Modern CSS Marquee -->
    <div class="marquee-container">
        <div class="marquee-text">
            EntebbeStay | Your walk around Entebbe &nbsp;&nbsp; • &nbsp;&nbsp; 
            EntebbeStay | Your walk around Entebbe &nbsp;&nbsp; • &nbsp;&nbsp;
            EntebbeStay | Your walk around Entebbe &nbsp;&nbsp; • &nbsp;&nbsp;
        </div>
    </div>
    
    <h1>EntebbeStay Hotel Booking Services</h1>
    <p>Welcome to EntebbeStay Hotel Booking Service where we help travelers find and book a friendly 2-5 star hotel
        of their choice, that provides a 'home-away-from-home' experience </p>
    <p>Logged in as: <strong><?php echo htmlspecialchars($displayName); ?></strong> | 
    <a href="my_bookings.php" style="color: #d746f4;">My Bookings</a> | 
    <a href="logout.php" style="color: #3c83e7;">Logout</a></p>
</header>

<!-- This is Filter Section -->
<!-- It will allow users to choose how they want the results ordered. -->
<section class="filters">
    <form method="GET">
        <input type="text" name="search" placeholder="Search hotels..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
        
        <select name="rating">
            <option value="">All Ratings</option>
            <?php for($i=5; $i>=2; $i--): ?>
                <option value="<?php echo $i; ?>" <?php if(($_GET['rating']??'') == $i) echo 'selected'; ?>><?php echo $i; ?> Stars</option>
            <?php endfor; ?>
        </select>
        <!-- allows users to choose how they want the results ordered.-->
        <select name="sort">
            <option value="">Sort By</option>
            <option value="space_high" <?php if(($_GET['sort']??'') == 'space_high') echo 'selected'; ?>>Most Available</option>
            <option value="price_low" <?php if(($_GET['sort']??'') == 'price_low') echo 'selected'; ?>>Price: Low-High</option>
        </select>

        <button type="submit">Apply</button>
    </form>
</section>

<main class="hotel-grid">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()):     // fetches each hotel row
            $imagePath = (stripos($row['image'], 'images/') === false) ? "images/".$row['image'] : $row['image'];
        ?>
            <div class="hotel-card">
                <!-- thsi outputs safe data to avoid HTML injection -->
                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="hotel-img" alt="Hotel Photo">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <!-- this converts numeric rating to star icons -->
                <div class="stars"><?php echo str_repeat('★', (int)$row['rating']); ?></div>
                <p>📍 <?php echo htmlspecialchars($row['location']); ?></p>
                <p><strong>Available:</strong> <?php echo $row['available_space']; ?> rooms</p>
                 <!-- it ensures that booking link uses ID param -->
                <a href="book.php?id=<?php echo $row['id']; ?>" class="btn-book">Book Now</a>
            </div>
        <?php endwhile; ?>
    <?php else: // this is a fallback if no hotels are found?>
        <p>No results found for your search.</p>
    <?php endif; ?>
    
</main>

<footer>
    <p>Note; we provide our hotel services between Kawuku and Kitoro. Our system allows you to view hotel details,  
        services offered, and real-time availability.</p>
    <p>&copy; 2026 EntebbeStay | Your walk around Entebbe</p>
</footer>

</body>
</html>
