<?php
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $email = $_POST['email'];

    if ($password !== $confirmPassword) {
        echo '<script>alert("Password does not match."); window.location.href = "signup.html";</script>';
        exit;
    }

    $user = new User($username, $password, $email);
    $registrationStatus = $user->register();

    if ($registrationStatus === 'Registration successful.') {
        echo '<script>alert("Registration successful. Please log in."); window.location.href = "login.html";</script>';
    } else {
        echo '<script>alert("' . $registrationStatus . '"); window.location.href = "signup.html";</script>';
    }
}
?>
