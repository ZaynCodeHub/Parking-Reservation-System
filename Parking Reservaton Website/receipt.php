<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if reservation details are available in the session
if (!isset($_SESSION['reservation'])) {
    echo "No reservation details found.";
    exit();
}

$reservation = $_SESSION['reservation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .receipt {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .receipt h2 {
            text-align: center;
        }
        .receipt p {
            font-size: 16px;
        }
        .receipt p span {
            font-weight: bold;
        }
        nav {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        overflow: hidden;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        float: left;
        font-size: 1.5rem;
        margin: 0;
        padding-left: 20px;
    }

    .nav-links {
        float: right;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-links li {
        display: inline-block;
        margin-left: 20px;
    }

    .nav-links li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .nav-links li a:hover {
        color: #ff6600;
    }

    </style>
</head>
<body>



<nav>
        <div class="container">
            <h1 class="logo">PARKER</h1>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="receipt">
        <h2>Reservation Receipt</h2>
        <p><span>Vehicle Type:</span> <?php echo htmlspecialchars($reservation['vehicle_type']); ?></p>
        <p><span>License Plate Number:</span> <?php echo htmlspecialchars($reservation['licence_plate_number']); ?></p>
        <p><span>Arrival Time:</span> <?php echo htmlspecialchars($reservation['arrival_time']); ?></p>
        <p><span>Parking Spot:</span> <?php echo htmlspecialchars($reservation['spot']); ?></p>
        <p><span>Parking Hours:</span> <?php echo htmlspecialchars($reservation['parking_hours']); ?></p>
        <p><span>Bill Amount:</span> <?php echo htmlspecialchars($reservation['bill_amount']); ?> rupees</p>
    </div>
</body>
</html>

<?php
// Clear the reservation details from the session
unset($_SESSION['reservation']);
?>
