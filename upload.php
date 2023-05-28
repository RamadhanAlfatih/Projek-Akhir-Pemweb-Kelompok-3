<?php
if(isset($_FILES['image'])) {
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  
  // Lokasi penyimpanan file yang diunggah
  $upload_path = 'images/';

  // Membuat direktori jika belum ada
  if(!is_dir($upload_path)){
    mkdir($upload_path, 0755, true);
  }

  // Pindahkan file yang diunggah ke direktori tujuan
  move_uploaded_file($file_tmp, $upload_path . $file_name);

  echo "File berhasil diunggah: " . $upload_path . $file_name;
}
?>
