<?php
session_start();

if (isset($_SESSION['logged_in_user'])) {
    // jika telah login
    header('Location: ../../homepage(setelah login).html');
} else {
    // jika belum
    header('Location: ../../login.html');
}
