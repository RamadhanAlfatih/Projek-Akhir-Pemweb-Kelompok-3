<?php
require_once 'Database.php';

session_start();

$pdo = Database::getConnection();

// Check if form data is sent
if (isset($_POST['restaurant-name'], $_POST['deskripsi'], $_POST['rating'])) {
    $restaurantName = $_POST['restaurant-name'];
    $description = $_POST['deskripsi'];
    $rating = $_POST['rating'];
    $username = $_SESSION['logged_in_user']; // Ambil username dari session

    // Check if fields are not empty
    if (!empty($restaurantName) && !empty($description) && !empty($rating)) {
        // Upload image
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an image
        $validExtensions = array('jpg', 'jpeg', 'png');
        if (in_array($imageFileType, $validExtensions)) {
            // Move uploaded file to storage folder
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // File successfully uploaded, perform database operation

                // Insert data into reviews table
                $sql = "INSERT INTO reviews (restaurant_name, description, rating, image_path, created_date, username) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $currentDate = date('Y-m-d'); // Tanggal saat ini
                if ($stmt->execute([$restaurantName, $description, $rating, $targetFile, $currentDate, $username])) {
                    // Display successful notification using JavaScript
                    echo "<script>
                        alert('Review Submitted Successfully');
                        window.location.href = '/Projek-Akhir-Pemweb-Kelompok-3/homepage(setelah login).php';
                      </script>";
                } else {
                    // Error in database operation
                    echo "<script>
                        alert('There was a problem submitting your review. Please try again.');
                        window.history.back();
                      </script>";
                }
            } else {
                // If failed to move file
                echo "<script>
                    alert('Sorry, there was an error uploading your file.');
                    window.history.back();
                  </script>";
            }
        } else {
            // If file is not a valid image
            echo "<script>
                alert('Invalid file format. Only JPG, JPEG, and PNG files are allowed.');
                window.history.back();
              </script>";
        }
    } else {
        // If any field is empty
        echo "<script>
            alert('Please fill in all required fields.');
            window.history.back();
        </script>";
    }
} else {
    // If form data is not sent
    echo "<script>
        alert('No data received. Please try again.');
        window.history.back();
    </script>";
}
?>
