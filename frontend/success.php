<?php
include '../backend/users.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
unset($_SESSION['source'], $_SESSION['dest'], $_SESSION['date'], $_SESSION['passengers'], $_SESSION['seats']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful - BusTravel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container"><a href="../index.php" class="nav-logo">BusTravel</a></div>
    </nav>
    <main class="main-content">
        <div class="form-container" style="text-align: center;">
            <h1 class="page-title" style="color: #28a745;">Booking Successful!</h1>
            <p>Your tickets have been confirmed. Thank you for choosing BusTravel.</p>
            <br>
            <a href="bookings.php" class="btn-primary"
                style="margin-right: 10px; text-transform: none; display: inline-block; width: auto; padding: 15px 25px;">View
                My Bookings</a>
            <a href="booking.php" class="btn-secondary"
                style="color: #333; border-color: #333; text-transform: none; display: inline-block; width: auto; padding: 12px 25px;">Book
                Another Ticket</a>
        </div>
    </main>
</body>

</html>
