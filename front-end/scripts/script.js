document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.search');
    var content = document.querySelector('.slide-bar');

    button.addEventListener('click', function() {
        content.classList.toggle('active');
    });
});
