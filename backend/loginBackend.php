<?php
session_start();
include 'users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if (empty($email) || empty($pass)) {
        header('Location: ../frontend/login.php?error=emptyfields');
        exit();
    }

    if (!empty($email) && !empty($pass)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($pass, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $stmt->close();
                $conn->close();
                header("Location: ../frontend/main.php");
                exit();
            } else {
                $stmt->close();
                $conn->close();
                header('Location: ../frontend/login.php?error=invalidpassword');
                exit();
            }
        } else {
            $stmt->close();
            $conn->close();
            header('Location: ../frontend/login.php?error=nouser');
            exit();
        }
    } else {
        header('Location: ../frontend/login.php');
        exit();
    }
}
?>

