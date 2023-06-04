<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once 'Database.php';

$pdo = Database::getConnection();

// Query data dari tabel reviews
$sql = "SELECT restaurant_name, description, rating, image_path FROM reviews";
$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profile-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Profile</title>
    <script>
        // Fungsi untuk menangani klik pada tabel
        function handleTableClick(url) {
            // Mengubah kelas "active" saat tabel diklik
            this.classList.toggle("active");

            // Mengarahkan pengguna ke halaman tujuan
            window.location.href = url;
        }

        // Mendapatkan daftar tabel dengan kelas "tabel-1"
        var tables = document.getElementsByClassName("tabel-1");

        // Menambahkan event listener untuk setiap tabel
        for (var i = 0; i < tables.length; i++) {
            var url = "halaman_review_lengkap.html"; // Ganti dengan URL halaman review lengkapnya
            tables[i].addEventListener("click", function() {
                handleTableClick.call(this, url);
            });
        }
    </script>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a href="/Projek-Akhir-Pemweb-Kelompok-3/homepage(setelah login).html">
                    <img src="/Projek-Akhir-Pemweb-Kelompok-3/landing-page/img/LOGO.png" alt="PawPaw Logo" class="logonav" />
                </a>
                <ul>
                    <li></li>
                </ul>
                <form class="search-form">
                    <input type="text" placeholder="What Food Do You Have In Mind ?" />
                </form>
                <a href="/Projek-Akhir-Pemweb-Kelompok-3/fastfood.html"><button type="submit">Search</button></a>
                <div class="writereview"><a href="/Projek-Akhir-Pemweb-Kelompok-3/write-review.html">Write A Review</a>
                </div>
                <div class="dropdown">
                    <div class="profile-button">
                        <div class="profile-image">
                            <img src="images/profile.png" alt="">
                        </div>
                    </div>
                    <div class="dropdown-content">
                        <a href="profile.html">Edit Profile</a>
                        <a href="#">Change Password</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
        </div>
        </nav>
        </div>
    </header>
    <div class="background-container">
        <img src="images/background.jpg" alt="Image" class="background">
    </div>
    <form action="logout.php" method="post" class="logout-form">
        <button type="submit" class="logout">Logout</button>
    </form>
    <div class="profile-container">
        <div class="photo">
            <img src="images/profile.png" alt="Photo profile">
        </div>
        <div class="profile-desc">
            <h1>Lil Natan</h1>
            <p class="username">@<?php echo $_SESSION['logged_in_user']; ?></p>
            <p>Hello ges! aku suka review makan nih! aku juga wibu loh!</p>
        </div>
    </div>

    <div class="follow-container">
        <div class="item-1">10 Paws</div>
        <div class="item-2">10 Following</div>
        <div class="item-3">10 Followers</div>
    </div>

    <div class="review-container">
        <?php foreach ($reviews as $review) : ?>
            <div class="tabel-1">
                <div class="profile-photo">
                    <img src="images/profile.png" alt="">
                </div>
                <div class="name"><?php echo $_SESSION['logged_in_user']; ?></div>
                <div class="date">May 2, 2023</div>
                <div class="restaurant-name-rating">
                    <div class="restaurant-name"><?php echo $review['restaurant_name']; ?></div>
                    <div class="rating">
                        <?php
                        // Menghitung jumlah bintang yang akan ditampilkan
                        $rating = $review['rating'];
                        $starCount = ceil($rating);

                        // Menampilkan bintang sesuai jumlah rating
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
        <?php endforeach; ?>
        <!-- <div class="tabel-2">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">April 27, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Sate Ayam Kerdil</div>
                <div class="rating">
                    <div class="stars">★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_sateayam.jpg" alt="">
            </div>
            <div class="description">Enak pol wes sumpah recomended 10/10.</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">3 Likes</div>
            </div>
        </div>
        <div class="tabel-3">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">April 25, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Liko's Dogfood</div>
                <div class="rating">
                    <div class="stars">★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_dogfood.jpg" alt="">
            </div>
            <div class="description">Best dogfood in the town. Suitable for all ages</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">69 Likes</div>
            </div>
        </div>
        <div class="tabel-4">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">April 3, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Downtown Steak</div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_steak.jpg" alt="">
            </div>
            <div class="description">Nestled in the heart of the city, Downtown Steak is a culinary gem that caters to
                discerning palates seeking the epitome of steak perfection. From the moment you step foot into this
                refined establishment...</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">121 Likes</div>
            </div>
        </div>
        <div class="tabel-5">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">March 17, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Sicko Cafe</div>
                <div class="rating">
                    <div class="stars">★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_cafe.jpg" alt="">
            </div>
            <div class="description">Cafe highclass dengan ambiens nyaman. Harga lumayan murah untuk kelasnya</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">10 Likes</div>
            </div>
        </div>
        <div class="tabel-6">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">March 2, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Soewie Steakhouse</div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_steak2.jpg" alt="">
            </div>
            <div class="description">Soewie Steakhouse: A Fusion of Modern Elegance and Culinary Excellence<br><br>

                Step into a world of refined dining at Soewie Steakhouse, where the marriage of modern elegance and
                culinary mastery awaits. Located in the heart of the city, this upscale steakhouse is a haven for steak
                enthusiasts seeking a truly memorable dining experience..</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">24 Likes</div>
            </div>
        </div>
        <div class="tabel-7">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">February 31, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Padang Murah</div>
                <div class="rating">
                    <div class="stars">★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_padang.png" alt="">
            </div>
            <div class="description">Murah sekali. 20rb bisa makan 7 kali. Penyelamat anak kosz</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">126 Likes</div>
            </div>
        </div>
        <div class="tabel-8">
            <div class="profile-photo">
                <img src="images/profile.png" alt="">
            </div>
            <div class="name">NatanK</div>
            <div class="date">January 1, 2023</div>
            <div class="restaurant-name-rating">
                <div class="restaurant-name">Bebek Goreng Pak eBe</div>
                <div class="rating">
                    <div class="stars">★★★★</div>
                </div>
            </div>
            <div class="restaurant-photo">
                <img src="images/profile_dogfood.jpg" alt="">
            </div>
            <div class="description">Kulitnya enak sekali sumpah. Harus coba pokok</div>
            <div class="likes">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <div class="like-count">72 Likes</div>
            </div>
        </div> -->
    </div>
    <div class="next-previous">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
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