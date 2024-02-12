//Header Functions

//Search
document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.search');
    var content = document.querySelector('.search-bar');

    button.addEventListener('click', function() {
        content.classList.toggle('active');
    });
});

//Add
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

