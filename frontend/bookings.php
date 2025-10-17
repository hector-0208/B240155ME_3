<?php
include '../backend/users.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$bookings = [];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - BusTravel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="../index.php" class="nav-logo">BusTravel</a>
            <ul class="nav-links">
                <li><a href="main.php">Home</a></li>
                <li><a href="booking.php">Book Ticket</a></li>
                <li><a href="bookings.php">My Bookings</a></li>
                <li><a href="backend/logoutBackend.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main class="main-content">
        <h1 class="page-title">My Travel History</h1>

        <div class="content-section">
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Route</th>
                        <th>Date</th>
                        <th>Passengers</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="bookingsTableBody">
                    <?php if (empty($bookings)): ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">You have no bookings yet.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td>BT-00<?php echo htmlspecialchars($booking['id']); ?></td>
                                <td><?php echo htmlspecialchars($booking['passenger']); ?></td>
                                <td><?php echo htmlspecialchars($booking['source']); ?> →
                                    <?php echo htmlspecialchars($booking['dest']); ?></td>
                                <td><?php echo htmlspecialchars($booking['doj']); ?></td>
                                <td><?php echo htmlspecialchars($booking['seat']); ?></td>
                                <td>₹<?php echo number_format($booking['fare'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
