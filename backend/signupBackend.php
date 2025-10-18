<?php
session_start();
include 'users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password_plain = $_POST['password'] ?? null;
    $password = password_hash($password_plain, PASSWORD_DEFAULT);

    if (empty($name) || empty($email) || empty($password)) {
        header("Location: ../frontend/signup.php?error=emptyfields");
        exit();
    }
    $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $checkStmt->close();
        $conn->close();
        header("Location: ../frontend/signup.php?error=userexists");
        exit();
    } else {
        $checkStmt->close();
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: ../frontend/login.php?signup=success");
            exit();
        } else {
            $stmt->close();
            $conn->close();
            header("Location: ../frontend/signup.php?error=sqlerror");
            exit();
        }
    }
} else {
    header('Location: ../frontend/signup.php');
    exit();
}
