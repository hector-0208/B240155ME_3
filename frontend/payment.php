<?php
include '../backend/users.php';
if (!isset($_SESSION['seats']) || empty($_SESSION['seats'])) {
    header("Location: booking.php");
    exit();
}

$sql = $conn->prepare("SELECT * FROM bookings WHERE email=?");
$sql->bind_param("s", $_SESSION['email']);
$sql->execute();
$result = $sql->get_result();
$discount = ($result->num_rows > 0) ? 0 : 0.15;
$totalFare = 0;

foreach ($_SESSION['seats'] as $seat) {
    $seatNum = (int) preg_replace('/[^0-9]/', '', $seat);
    $price = ($seatNum % 3 == 0) ? 350 : 300;
    $totalFare += $price - ($price * $discount);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking - BusTravel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container"><a href="../index.php" class="nav-logo">BusTravel</a></div>
    </nav>
    <main class="main-content">
        <h1 class="page-title">Confirm Your Booking</h1>
        <div class="form-container">
            <h3>Booking Summary</h3>
            <p><strong>Route:</strong> <?php echo htmlspecialchars($_SESSION['source']); ?> to
                <?php echo htmlspecialchars($_SESSION['dest']); ?>
            </p>
            <p><strong>Date:</strong> <?php echo htmlspecialchars($_SESSION['date']); ?></p>
            <hr style="margin: 15px 0;">
            <h4>Passengers & Seats:</h4>
            <ul style="list-style-position: inside;">
                <?php foreach ($_SESSION['passengers'] as $index => $pax): ?>
                    <li><?php echo htmlspecialchars($pax); ?> (Seat:
                        <?php echo htmlspecialchars($_SESSION['seats'][$index]); ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
            <hr style="margin: 15px 0;">
            <?php if ($discount > 0): ?>
                <p style="color: green; font-weight: bold;">First-time booking discount (15%) applied!</p>
            <?php endif; ?>
            <h3 style="margin-top: 15px;">Total Amount: ₹<?php echo number_format($totalFare, 2); ?></h3>
            <br>
            <form action="../backend/paymentBackend.php" method="POST">
                <button type="submit" class="btn-submit">Confirm & Pay</button>
            </form>
        </div>
    </main>
</body>

</html>
