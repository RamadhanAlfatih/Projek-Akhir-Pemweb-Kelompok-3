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
            <div class="form-container">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div id="image-dropzone" onclick="document.getElementById('image-upload').click()">
                        <div class="dropzone-text">Drag and drop an image here or click to select</div>
                        <input type="file" id="image-upload" name="image" accept="image/*" onchange="previewImage(event)" />
                        <img id="preview-image" src="#" alt="Preview" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Upload" name="submit">
                    </div>
                </form>
            </div>
            <div class="form-container">
                <form>
                    <div class="form-group">
                        <input type="text" name="deskripsi" placeholder="Description & Review" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const dropzone = document.getElementById('image-dropzone');
        const input = document.getElementById('image-upload');
        const preview = document.getElementById('preview-image');

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');

            const file = e.dataTransfer.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', () => {
                    preview.setAttribute('src', reader.result);
                    preview.style.display = 'block';
                });

                reader.readAsDataURL(file);
            }
        });

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', () => {
                    preview.setAttribute('src', reader.result);
                    preview.style.display = 'block';
                });

                reader.readAsDataURL(file);
            }
        });

        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', () => {
                    preview.setAttribute('src', reader.result);
                    preview.style.display = 'block';
                });

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
</body>

</html>