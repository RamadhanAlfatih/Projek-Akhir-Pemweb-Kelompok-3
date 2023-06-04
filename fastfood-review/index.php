<?php
$section_atas = ["images/user.png", "NatanK", "images/location.png", "4.7/5", "images/star.png"];
$items = [
    ["Luwe Burgerbar", "images/makanan1.png"],
    ["Sate Ayam Kerdil", "images/makanan2.png"],
    ["Liko's Dogfood", "images/makanan3.png"],
    ["Downtown Steak", "images/makanan4.png"]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <title>Menu Review</title>
</head>
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
            <div class="writereview"><a href="#">Write A Review</a></div>
            <div class="dropdown">
                <div class="profile-button">
                    <div class="profile-image">
                        <img src="/Projek-Akhir-Pemweb-Kelompok-3/images/profile.png" alt="">
                    </div>
                </div>
                <div class="dropdown-content">
                    <a href="#">Edit Profile</a>
                    <a href="#">Change Password</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
    </div>
    </nav>
    </div>
</header>

<body>


    <div class="container">

        <div class="section_container">
            <div class="section1">
                <div class="back">
                    <img src="images/back.png" alt="">
                </div>
                <div class="restaurant">
                    <div class="restaurant_profile">
                        <img src="images/mcd.png" alt="" class="logo_resto">
                        <h3 class="nama_resto">McDonald’s, MT Haryono</h3>
                        <p class="alamat_resto">Jl. MT. Haryono No. 115, Lowokwaru, Malang</p>
                    </div>

                    <div class="menu">
                        <h2 class="menu_nama">Menu 1</h2>
                        <div class="menu_rate">
                            <div class="rate rate_price">
                                <div class="gambar">
                                    <img src="images/uang.png" alt="">
                                    <p>50.000</p>
                                </div>
                                <h5>Price</h5>
                            </div>
                            <div class="rate rate_rating">
                                <div class="gambar">
                                    <img src="images/star.png" alt="">
                                    <p>4.7/5</p>
                                </div>
                                <h5>Average Rating</h5>
                            </div>
                            <div class="rate rate_paws">
                                <p>5.1k+</p>
                                <h5>Paws</h5>
                            </div>
                        </div>
                        <div class="menu_foto">
                            <p>Photos & Videos</p>
                            <div class="foto_collection">
                                <div class="box collection1"></div>
                                <div class="box collection2"></div>
                                <div class="box collection3"></div>
                                <div class="box collection4">
                                    <img src="images/plus.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section2">Here’s the paws for this menu</div>

            <div class="section3">
                <div class="items_container">
                    <?php for ($i = 0; $i < 8; $i++) : ?>
                        <div class="item">
                            <div class="item_section1">
                                <img src="images/user.png" alt="user">
                                <p class="nama">NatanK</p>
                                <p class="tanggal">2 May 2023</p>
                            </div>
                            <div class="item_section2">
                                <p>Luwe Burgerbar</p>
                                <img src="images/location.png" alt="location">
                                <p class="rating">4.7/5</p>
                                <img src="images/star.png" alt="bintang">
                            </div>
                            <div class="item_section3">
                                <div class="gambar"></div>
                                <p>Pecel Mbak Yuli, seakan-akan telah menjadi jejak tradisi yang melekat dalam hati para pecinta makanan Jawa. Tempat makan yang menawarkan kelezatan pecel ini telah berdiri tegak sejak zaman...</p>
                            </div>
                            <div class="item_section4">
                                <img src="images/like.png" alt="like">
                                <p>51 like</p>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>

                <div class="direction">
                    <img src="images/back.png" alt="">
                    <img src="images/next.png" alt="">
                </div>
            </div>
        </div>


    </div>

    <footer>
        <div class="footer">
            <div class="footer-left">
                <a href="#"><img src="../images/line.png" alt="Line Icon" /></a>
                <a href="#"><img src="../images/instagram.png" alt="Instagram Icon" /></a>
                <a href="#"><img src="../images/twitter.png" alt="Twitter Icon" /></a>
                <a href="#"><img src="../images/youtube.png" alt="YouTube Icon" /></a>
            </div>
            <p>&copy; 2023 PawPaw. All rights reserved.</p>
            <div class="footer-right">
                <img src="../images/logoitem.jpeg" alt="PawPaw Logo" class="logo" />
            </div>
        </div>
    </footer>

</body>

</html>