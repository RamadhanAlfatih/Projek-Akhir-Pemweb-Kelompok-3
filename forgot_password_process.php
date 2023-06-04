<?php
require_once 'Database.php';

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['username_or_email'])) {
    $username_or_email = $_POST['username_or_email'];

    $pdo = Database::getConnection();

    // Select user based on email or username
    $sql = "SELECT * FROM user WHERE email = ? OR username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username_or_email, $username_or_email]);
    $user = $stmt->fetch();

    if ($user) {
        // If user is found, create password reset token
        $token = bin2hex(random_bytes(50));

        //Server settings
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Ganti dengan SMTP server Anda
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ramadhanalfatih1015@gmail.com'; // Ganti dengan email pengirim
        $mail->Password   = ' '; // Ganti dengan password email pengirim
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('ramadhanalfatih10@gmail.com', 'Mailer'); // Ganti dengan alamat email pengirim
        $mail->addAddress($user['email']); // Ganti dengan alamat email penerima

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $resetLink = "http://localhost/Projek-Akhir-Pemweb-Kelompok-3/reset_password.php?token=" . $token;
        $mail->Body    = "Klik link berikut untuk mereset password Anda: <a href='{$resetLink}'>{$resetLink}</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        try {
            $mail->send();

            // Store token in database with expiration date
            $expires_at = date("Y-m-d H:i:s", strtotime("+1 day"));
            $sql = "INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user['email'], $token, $expires_at]);

            // Redirect to the password reset confirmation page
            header("Location: forgot-password-3.html");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "
        <script>
        alert('Tidak ada pengguna dengan email atau username tersebut.');
        window.location.href='forgot-password-1.html';
        </script>
        ";
    }
}
?>
