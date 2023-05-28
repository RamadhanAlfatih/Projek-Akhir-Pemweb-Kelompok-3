<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="write-review-style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="all-container">
        <div class="container">
            <header>
                <h1>Write a Paw...</h1>
            </header>
            <div class="input-container">
                <input type="text" name="restaurant-name" placeholder="Restaurant name" required>
            </div>
        </div>
        <div class="container2">
            <div class="photo-container">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <p>Choose a photo to upload:</p>
                    <input type="file" id="foto" name="foto" accept=".jpg,.png" onchange="lihatFoto()">
                    <br>
                    <br>
                    <img src="#" alt="Hasil upload" id="lihat" width="200" height="200" style="display:none;">
                    <br>
                    <br>
                    <input type="submit" value="upload" name="submit">
                </form>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader()
                            reader.onload = function(e) {
                                document.getElementById('lihat').src = e.target.result
                                document.getElementById('lihat').style.display = 'block'
                            }
                            reader.readAsDataURL(input.files[0])
                        }
                    }
                    document.getElementById("foto").addEventListener("change", function() {
                        readURL(this)
                    })
                </script>
            </div>
            <div class="input-container">
                <input type="text" name="restaurant-name" placeholder="Restaurant name" required>
            </div>
        </div>
    </div>
</body>

</html>