<!DOCTYPE html>
<html>
<?php
session_start();

require_once 'Database.php';

$pdo = Database::getConnection();

// Query data dari tabel reviews
$sql = "SELECT restaurant_name, description, rating, image_path, created_date, username FROM reviews";
$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <title>Food Reviewer Website</title>
  <link rel="stylesheet" type="text/css" href="homepage(sebelum login).css" />
</head>

<body>
  <header>
    <div class="container">
      <nav>
        <a href="/Projek-Akhir-Pemweb-Kelompok-3/homepage(sebelum login).php">
          <img src="/Projek-Akhir-Pemweb-Kelompok-3/landing-page/img/LOGO.png" alt="PawPaw Logo" class="logonav" />
        </a>
        <ul>
          <li></li>
        </ul>
        <form class="search-form">
          <input type="text" placeholder="What Food Do You Have In Mind ?" />
        </form>
        <a href="/Projek-Akhir-Pemweb-Kelompok-3/fastfood.html"><button type="submit">Search</button></a>
        <a href="/Projek-Akhir-Pemweb-Kelompok-3/login.html"><button href="login.html" class="login-button">Login</button> </a>
      </nav>
    </div>
  </header>
  <main>
    <img src="images/foodhomepage1.png" class="floatimage1" />
    <img src="images/foodhomepage3.png" class="floatimage2" />
    <img src="images/foodhomepage2.png" class="floatimage3" />
    <img src="images/foodhomepage4.png" class="floatimage4" />
    <h1>Begin your food-print with Paw Paw!</h1>
    <div class="konten">
      <p>Start seeking and discovering foods with your fellow Paw(s)</p>
      <!-- <div class="boxreview"></div>
        <div class="boxreview1"></div>
        <div class="boxreview2"></div>
        <div class="boxreview3"></div> -->
    </div>
    <div class="review-container">
      <?php $count = 0; ?>
      <?php foreach ($reviews as $review) : ?>
        <?php if ($count >= 4) break; ?> <!-- Menambahkan kondisi untuk menghentikan loop setelah 4 iterasi -->
        <div class="tabel-1">
          <div class="profile-photo">
            <img src="images/profile.png" alt="">
          </div>
          <div class="name"><?php echo $review['username']; ?></div>
          <div class="date"><?php echo $review['created_date']; ?></div>
          <div class="restaurant-name-rating">
            <div class="restaurant-name"><?php echo $review['restaurant_name']; ?></div>
            <div class="rating">
              <?php
              $rating = $review['rating'];
              $starCount = ceil($rating);

              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $starCount) {
                  echo '<span class="star">&#9733;</span>';
                } else {
                  echo '<span class="star">&#9734;</span>';
                }
              }
              ?>
            </div>
          </div>
          <div class="restaurant-photo">
            <img src="<?php echo $review['image_path']; ?>" alt="">
          </div>
          <div class="description"><?php echo $review['description']; ?></div>
          <div class="likes">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <div class="like-count">51 Likes</div>
          </div>
        </div>
        <?php $count++; ?>
      <?php endforeach; ?>
      <h2>Our Mission ?</h2>
      <div class="info"></div>
      <img src="images/fotoframe.png" class="infopic" />
      <div class="mission">
        <p>
          To provide honest and insightful food reviews that inspire and guide
          food enthusiasts in discovering exceptional culinary experiences. In
          other words we strive to become the go-to platform for food lovers,
          empowering them with reliable and engaging reviews, and connecting
          them with remarkable dining establishments around the world.
        </p>
      </div>
  </main>
  <footer>
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
  </footer>
</body>

</html>