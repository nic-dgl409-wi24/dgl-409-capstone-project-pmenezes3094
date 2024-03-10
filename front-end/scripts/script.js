//Header Functions

//Search-bar
document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.search');
    var content = document.querySelector('.search-bar');

    button.addEventListener('click', function() {
        content.classList.toggle('active');
    });
});

//Add-bar
document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.add');
    var content = document.querySelector('.add-bar');

    button.addEventListener('click', function() {
        content.classList.toggle('active');
    });
});

//Logout
function logout() {
    window.location.href = '../../back-end/pages/session-variables-unset.php';
}

// Function to toggle forms and highlight buttons
function toggleForm(formId) {
    // Hide all forms
    var forms = document.querySelectorAll('.content-add-bar form');
    forms.forEach(function(form) {
        form.style.display = 'none';
    });

    // Display the selected form
    var selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.style.display = 'block';
    }

    // Highlight the clicked button
    var buttons = document.querySelectorAll('.add-data button');
    buttons.forEach(function(button) {
        if (button.getAttribute('data-form-id') === formId) {
            button.classList.add('button-active');
        } else {
            button.classList.remove('button-active');
        }
    });
}

// Hide all forms initially except the text form
document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('.content-add-bar form');
    forms.forEach(function(form, index) {
        if (index !== 0) { // Hide all forms except the first one
            form.style.display = 'none';
        }
    });
});

var modal = document.getElementById('expand-modal');
var modalImg = document.getElementById('modalImage');
var modalVideo = document.getElementById('modalVideo');
var span = document.getElementsByClassName('close')[0];

// // Function to close the modal
// function closeModal() {
//     modal.style.display = 'none';
//     document.body.style.overflow = 'auto';
//     modalImg.style.display = 'none';
//     modalVideo.style.display = 'none';
//     // Pause any playing video
//     modalVideo.pause();
// }

// // Event listener for the close button
// span.onclick = function() {
//     closeModal();
// }

// Event listener for clicking outside the modal
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

// Event listeners for images
var images = document.querySelectorAll('.modal-trigger');
images.forEach(function(image) {
    image.onclick = function(){
        modal.style.display = 'flex';
        modalImg.src = this.src;
        modalImg.style.display = 'block';
        modalVideo.style.display = 'none';
        document.body.style.overflow = 'hidden';
    }
});

// Event listeners for videos
var videos = document.querySelectorAll('.modal-video');
videos.forEach(function(video) {
    video.onclick = function(){
        modal.style.display = 'flex';
        modalImg.style.display = 'none';
        modalVideo.style.display = 'block';
        modalVideo.src = this.querySelector('source').src;
        document.body.style.overflow = 'hidden';
        modalVideo.play(); // Start playing the video
    }
});

// function openModal() {
//     document.getElementById('modal-art').style.display = 'block';
//     document.body.style.overflow = 'hidden'; // Disable background scroll
//   }
  
//   function closeModal() {
//     document.getElementById('modal-art').style.display = 'none';
//     document.body.style.overflow = 'auto'; // Enable background scroll
//   }





