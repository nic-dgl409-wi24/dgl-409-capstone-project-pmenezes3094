// Script to handle adding and searching bars
document.addEventListener('DOMContentLoaded', function() {
    var addButton = document.querySelector('.add');
    var addContent = document.querySelector('.add-bar');
    var searchButton = document.querySelector('.search');
    var searchContent = document.querySelector('.search-bar');

    function closeBars(event) {
        if (!event.target.closest('.add-bar') && !event.target.closest('.add')) {
            addContent.classList.remove('active');
        }
        if (!event.target.closest('.search-bar') && !event.target.closest('.search')) {
            searchContent.classList.remove('active');
        }
    }

    addButton.addEventListener('click', function() {
        addContent.classList.toggle('active');
        searchContent.classList.remove('active');
    });

    searchButton.addEventListener('click', function() {
        searchContent.classList.toggle('active');
        addContent.classList.remove('active');
    });

    document.addEventListener('click', closeBars);
});

// Function to open add bar
function openAddBar() {
    var addContent = document.querySelector('.add-bar');
    addContent.classList.toggle('active');
}

// Logout function
function logout() {
    window.location.href = '../../back-end/pages/session-variables-unset.php';
}

// Function to toggle forms and highlight buttons
function toggleForm(formId) {
    var forms = document.querySelectorAll('.content-add-bar form');
    forms.forEach(function(form) {
        form.style.display = 'none';
    });

    var selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.style.display = 'block';
    }

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
        if (index !== 0) {
            form.style.display = 'none';
        }
    });
});