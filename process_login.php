<?php
// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang dikirimkan melalui form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan validasi login sesuai dengan logika aplikasi Anda
    // Misalnya, periksa username dan password pada database

    // Contoh validasi sederhana
    if ($username === "admin" && $password === "admin123") {
        // Jika login berhasil, Anda dapat melakukan redirect ke halaman dashboard atau halaman lainnya
        header("Location: dashboard.php");
        exit; // Penting untuk menghentikan eksekusi kode setelah melakukan redirect
    } else {
        // Jika login gagal, Anda dapat menampilkan pesan error atau melakukan tindakan lainnya
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PawPaw</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="background-container"> 
        <img src="images/background4.jpg" alt="Image" class="background4">
    </div>
    <div class="background-text">
        <h1 class="background-header">One Step Away...</h1>
        <p class="background-paragraph">from starting your delicious culinary journey!</p>
    </div>
    <div class="login-container">
        <div class="image-container">
            <img src="images/bibimbap.png" alt="Image" class="image">
        </div>
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">Login</button>
            <div class="forgot-password">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a class="register-link a" href="signup.html">Sign in</a></p>
        </div>

        <?php
        // Menampilkan pesan error jika ada
        if (isset($error_message)) {
            echo '<div class="error-message">' . $error_message . '</div>';
        }
        ?>
    </div>
</body>
</html>
