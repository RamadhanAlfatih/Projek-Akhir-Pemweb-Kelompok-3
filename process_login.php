<?php
require_once 'Database.php';

class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT password FROM user WHERE username = :username");
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        $hashedPassword = $stmt->fetchColumn();

        if (password_verify($this->password, $hashedPassword)) {
            return true;
        }

        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['remember']);

    $user = new User($username, $password);
    $authenticationStatus = $user->authenticate();

    if ($authenticationStatus) {
        // Login berhasil
        // Lakukan aksi yang diperlukan, seperti menyimpan data login ke session, redirect ke halaman utama, dll.

        if ($rememberMe) {
            // Jika "Remember Me" dicentang, set cookie dengan masa berlaku 7 hari
            setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/');
        } else {
            // Jika "Remember Me" tidak dicentang, hapus cookie jika ada
            setcookie('username', '', time() - 3600, '/');
        }

        echo '<script>alert("Login successful. Redirecting to homepage."); window.location.href = "homepage.html";</script>';
    } else {
        // Login gagal
        echo '<script>alert("Invalid username or password. Please try again."); window.location.href = "login.html";</script>';
    }
}
?>
