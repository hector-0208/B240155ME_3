<?php

include 'users.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passengers = $_POST['passenger'];
    $seats = explode(',', $_POST['selectedSeats']);

    if(count($passengers) != count($seats)) {
        echo "<script>alert('Number of passengers and seats selected do not match.'); window.location.href='../frontend/busBook.php';</script>";
        exit();
    }

    $_SESSION['passengers'] = $passengers;
    $_SESSION['seats'] = $seats;

    $datetime = $_SESSION['source'] == 'Ravangla' ? $_SESSION['date'] . ' 06:00:00' : $_SESSION['date'] . ' 18:00:00';
    $errors = [];
    foreach($seats as $seat) {
        $checkStmt = $conn->prepare("SELECT * FROM bookings WHERE seat = ? AND doj = ?");
        $checkStmt->bind_param('ss', $seat, $datetime);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        if($result->num_rows > 0) {
            $errors[] = "Seat $seat has just been booked.";
        }
        $checkStmt->close();
    }

    if(!empty($errors)) {
        $errorMsg = implode("\n", $errors);
        echo "<script>alert('". addslashes($errorMsg) ."'); window.location.href='../frontend/busBook.php';</script>";
    } else {
        header('Location: ../frontend/payment.php');
        exit();
    }
}

