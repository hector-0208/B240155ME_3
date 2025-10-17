<?php

include 'users.php';

$sql = $conn->prepare("SELECT * FROM bookings WHERE email=?");
$sql->bind_param("s", $_SESSION['email']);
$sql->execute();
$result = $sql->get_result();
$discount = ($result->num_rows > 0) ? 0 : 0.15;
$sql->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datetime = $_SESSION['source'] == 'Ravangla' ? $_SESSION['date'] . " 06:00" : $_SESSION['date'] . " 13:00";
    
    $passengers = $_SESSION['passengers'];
    $seats = $_SESSION['seats'];

    foreach ($passengers as $index => $pax) {
        $seat = $seats[$index];
        $seatNum = (int) preg_replace('/[^0-9]/', '', $seat);
        
        $price = ($seatNum % 3 == 0) ? 350 : 300;
        $fare = $price - $price * $discount;

        $stmt = $conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssds', $pax, $_SESSION['source'], $_SESSION['dest'], $datetime, $seat, $fare, $_SESSION['email']);
        
        if (!$stmt->execute()) {
            echo "<script>alert('Payment unsuccessful. An error occurred.'); window.location.href='../frontend/payment.php';</script>";
            exit();
        }
    }
    $stmt->close();
    header('Location: ../frontend/success.php');
    exit();
}
?>
