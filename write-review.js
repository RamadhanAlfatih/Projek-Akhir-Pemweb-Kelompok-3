const dropzone = document.getElementById('image-dropzone');
const input = document.getElementById('image-upload');
const preview = document.getElementById('preview-image');
const reviewForm = document.getElementById('review-form');
const restaurantNameInput = document.querySelector('input[name="restaurant-name"]');

dropzone.addEventListener('dragover', (e) => {
    dropzone.classList.add('dragover');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
});

dropzone.addEventListener('drop', (e) => {
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

const stars = document.querySelectorAll('.star');
let selectedStar = null;

stars.forEach(star => {
    star.addEventListener('click', () => {
        stars.forEach(s => {
            if (s.getAttribute('data-value') <= star.getAttribute('data-value')) {
                s.classList.add('selected');
            } else {
                s.classList.remove('selected');
            }
        });
        selectedStar = star.getAttribute('data-value');
    });

    star.addEventListener('mouseover', () => {
        stars.forEach(s => {
            if (s.getAttribute('data-value') <= star.getAttribute('data-value')) {
                s.style.color = '#ffc107';
            } else {
                s.style.color = '#ccc';
            }
        });
    });

    star.addEventListener('mouseout', () => {
        stars.forEach(s => {
            if (s.classList.contains('selected')) {
                s.style.color = '#ffc107';
            } else {
                s.style.color = '#ccc';
            }
        });
    });
});

// Add rating input to the form
let ratingInput = document.createElement('input');
ratingInput.type = 'hidden';
ratingInput.name = 'rating';
reviewForm.appendChild(ratingInput);

stars.forEach(star => {
    star.addEventListener('click', () => {
        ratingInput.value = star.getAttribute('data-value');
    });
});

reviewForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Add restaurant name to form data
    const restaurantName = document.querySelector('input[name="restaurant-name"]').value;
    formData.append('restaurant-name', restaurantName);

    // Add rating to form data
    formData.append('rating', selectedStar);

    // Print form data to console
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]);
    }

    if (form.checkValidity()) {
        form.submit();
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Form Incomplete',
            text: 'Please fill in all required fields.'
        });
    }
});
