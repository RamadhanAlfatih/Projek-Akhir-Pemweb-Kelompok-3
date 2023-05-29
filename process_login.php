<?php
require_once 'Database.php';

session_start();

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

// Cek apakah cookie remember me telah diset atau tidak
if (isset($_COOKIE['username'])) {
    // Jika sudah diset, kita langsung redirect ke homepage
    header('Location: homepage(setelah login).html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['remember']);

    $user = new User($username, $password);
    $authenticationStatus = $user->authenticate();

    if ($authenticationStatus) {
        // Login berhasil
        $_SESSION['logged_in_user'] = $username;

        if ($rememberMe) {
            // Jika "Remember Me" dicentang, set cookie dengan masa berlaku 7 hari
            setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/');
        } else {
            // Jika "Remember Me" tidak dicentang, hapus cookie jika ada
            if (isset($_COOKIE['username'])) {
                setcookie('username', '', time() - 3600, '/');
            }
        }

        // Redirect ke homepage
        header('Location: homepage(setelah login).html');
        exit();
    } else {
        // Login gagal
        echo '<script>alert("Invalid username or password. Please try again."); window.location.href = "login.html";</script>';
    }
}
?>
