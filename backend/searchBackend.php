<?php

if (session_start() == PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['dest'] = $_POST['destination'];
    $_SESSION['date'] = $_POST['travelDate'];

    header('Location: ../frontend/busBook.php');
    exit();
}
