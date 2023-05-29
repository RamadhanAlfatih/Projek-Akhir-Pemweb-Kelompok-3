<?php
session_start();

// Menghapus semua session
session_unset();

// Menghancurkan semua session
session_destroy();

// Menghapus cookie
if (isset($_COOKIE['username'])) {
    // Mengatur masa berlaku cookie menjadi waktu lampau untuk menghapusnya
    setcookie('username', '', time() - 3600, '/');
}

// Redirect ke halaman login
header('Location: login.html');
exit();
?>
