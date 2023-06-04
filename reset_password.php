<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="reset-password-style.css" />
    <title>Reset Password</title>
</head>

<body>
    <div class="login-container">
        <h1>Reset Your Password</h1>
        <p>
            Enter your new password below.
        </p>
        <hr class="line" />
        <form action="reset_password_process.php" method="post">
            <div class="input-group">
                <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>" />

                <input type="password" name="password" placeholder="New Password" required />
            </div>
            <button type="submit">Reset Password</button>
        </form>
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