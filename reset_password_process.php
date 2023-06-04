<?php
require_once 'Database.php';

$pdo = Database::getConnection(); // Menambahkan ini

if (isset($_POST['token']) && isset($_POST['password'])) {
    $token = $_POST['token'];
    $newPassword = $_POST['password'];
    
    // Cari token dalam database
    $sql = "SELECT * FROM password_resets WHERE token = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$token]);
    $reset = $stmt->fetch();

    if ($reset && strtotime($reset['expires_at']) > time()) {
        // Jika token ditemukan dan belum kedaluwarsa, perbarui password
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->execute([$hashedPassword, $reset['email']]);

        // Hapus token reset password
        $sql = "DELETE FROM password_resets WHERE token = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token]);

        echo "Password Anda telah diperbarui.";
    } else {
        echo "Token tidak valid atau telah kedaluwarsa.";
    }
}
?>
