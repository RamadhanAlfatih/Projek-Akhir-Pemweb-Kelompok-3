<?php
$target_path = "images/";
$target_foto = $target_path . basename($_FILES["foto"]["name"]);
$imgType = strtolower(pathinfo($target_foto, PATHINFO_EXTENSION));
if ($imgType != "jpg" && $imgType != "png") {
    echo "Maaf, cuma bisa foto ekstensi .jpg atau .png saja";
    exit();
}
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_foto)) {
    echo "Foto " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " sukses ter-uploaad";
} else {
    echo "Maaf, sesuatu ada yang salah saat mengupload foto.";
}
