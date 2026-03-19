<?php
include 'db_config.php';
session_start();

// 1. Authentication Check
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}


$displayName = is_array($_SESSION['user']) ?
 $_SESSION['user']['username'] : $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntebbeStay Hotel Booking Service</title>
    
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: #f4f7f6; 
            margin: 0; 
            padding: 20px;
        }
        .hotel-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 20px; 
        }
        .hotel-card { 
            background: white; 
            border-radius: 12px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
            overflow: hidden; 
            padding: 15px; 
        }
        .hotel-img { 
            width: 100%; 
            height: 180px; 
            object-fit: cover; 
            background: #ddd; 
        }
        .login-box { 
            max-width: 400px; 
            margin: 100px auto; 
            background: white; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.2); 
            text-align: center; 
        }
        input { 
            width: 90%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        button { 
            background: #2c3e50; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }
        /* Adds styles for your header/nav since */
        .nav {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .nav h1 { margin: 0; }
        .btn-book {
            display: inline-block;
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn-book {
            display: inline-block;
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
             margin-top: 10px;
             font-weight: bold;
             text-align: center;
        }
        .btn-book:hover {
            background: #219150;
        }
        .nav {
    background: #2c3e50;
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}
.nav h1 { margin: 0; color: #ecf0f1; }
.nav p { font-size: 0.9em; opacity: 0.9; }


    </style>
</head>

<body>

<header>
    <div class="nav">
        <marquee behavior="Your walk around Entebbe" direction="left"></marquee>
        <h1>EntebbeStay Hotel Booking Service</h1>
        <p>Welcome to EntebbeStay Hotel Booking Service were we help travelers find and book a 2-5 star hotel of their choice, that
             provides a 'home-away-from experience' located between Kawuku and Kitoro in Entebbe.
             The system allows you to view hotel details,  services offered, and real-time availability.</p>
        <p>Logged in as: <strong><?php echo htmlspecialchars($displayName); ?></strong> | 
        <a href="logout.php">Logout</a></p>
    </div>
</header>

<main class="hotel-grid">
    <?php
    // 3. This Fetches the 10+ hotels from my MySQL database (database.sql)
    $sql = "SELECT * FROM hotels";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
           
            $imageFileName = strtolower(str_replace(' ', '_', $row['name'])) . ".jpg"; 
            
           
            $servicesList = is_array($row['services']) ? implode(", ", $row['services']) : $row['services'];

            echo "
            <div class='hotel-card'>
                <img src='images/" . $imageFileName . "' alt='" . $row['name'] . "' class='hotel-img' 
                onerror=\"this.src='https://via.placeholder.com'\">
                
                <div class='content'>
                    <h3>" . $row['name'] . "</h3>
                    <div class='stars'>" . str_repeat('★', (int)$row['rating']) . "</div>
                   
                    <p class='services'><strong>Services:</strong> " . $servicesList . "</p>
                    <p class='availability'>Available Spaces: <strong>" . $row['available_space'] . "</strong></p>
                    
                    <a href='" . $row['website'] . "' target='_blank' class='btn-book'>Book Now</a>
                </div>
            </div>";
        }
    } else {
        echo "<div class='no-results'><p>No hotels found in the database. Please check your SQL import.</p></div>";
    }
    ?>
</main>

<footer>
    <p>&copy; 2026 EntebbeStay | Your walk around Entebbe</p>
</footer>

</body>
</html>
