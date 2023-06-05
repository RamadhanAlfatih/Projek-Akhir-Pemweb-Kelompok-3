<!DOCTYPE html>
<html>
<?php
// Cek apakah cookie remember me telah diset atau tidak
if (isset($_COOKIE['username'])) {
  // Jika sudah diset, langsung redirect ke homepage(setelah login).php
  header('Location: homepage(setelah login).php');
  exit();
}
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - PawPaw</title>
  <link rel="stylesheet" type="text/css" href="login-style.css" />
</head>

<body>
  <div class="background-container">
    <img src="images/background4.jpg" alt="Image" class="background4" />
  </div>
  <div class="background-text">
    <h1 class="background-header">One Step Away...</h1>
    <p class="background-paragraph">
      from starting your delicious culinary journey!
    </p>
  </div>
  <div class="login-container">
    <div class="image-container">
      <img src="images/bibimbap.png" alt="Image" class="image" />
    </div>
    <div class="login-header">
      <h2>Login</h2>
    </div>
    <form action="process_login.php" method="post">
      <div class="input-group">
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <div class="input-group remember-me">
        <input type="checkbox" id="remember" name="remember" />
        <label for="remember">Remember me</label>
      </div>
      <button type="submit">Login</button>
      <div class="forgot-password">
        <a href="forgot-password-1.html">Forgot Password?</a>
      </div>
    </form>
    <div class="register-link">
      <p>
        Don't have an account?
        <a class="register-link a" href="signup.html">Sign in</a>
      </p>
    </div>
  </div>
  <div class="footer">
    <div class="footer-left">
      <a href="#"><img src="images/line.png" alt="Line Icon" /></a>
      <a href="#"><img src="images/instagram.png" alt="Instagram Icon" /></a>
      <a href="#"><img src="images/twitter.png" alt="Twitter Icon" /></a>
      <a href="#"><img src="images/youtube.png" alt="YouTube Icon" /></a>
    </div>
    <p>&copy; 2023 PawPaw. All rights reserved.</p>
    <div class="footer-right">
      <img src="images/logoitem.jpeg" alt="PawPaw Logo" class="logo" />
    </div>
  </div>
</body>

</html>