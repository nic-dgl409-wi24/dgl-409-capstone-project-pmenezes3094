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

