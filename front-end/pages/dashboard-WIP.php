<?php require 'partials/head.php'; ?>
<?php require '../../back-end/pages/session-variables-set.php'; ?>

<div class="hotspot"><a href="login-view.php">next</a></div>

<?php require 'partials/header.php'; ?>

<main>
    <div class="container">
        <div class="greeting">
            <h3>Welcome to your Thought Treasury, <span class="emphasize"><?php echo $user_firstName; ?>!</span></h3>
        </div>

        <div class="card-container">
            <div class="card-xxs card">
                <div class="card-content">
                    <audio controls>
                        <source src="../../Assets/dry-flowers-and-twigs-rustling-34133.mp3" type="audio/mp3">
                    </audio>
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-xs card">
                <div class="card-content">
                    <video controls width="300">
                        <source src="../../Assets/pexels_videos_3744 (Original).mp4" type="video/mp4">
                    </video>
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-s card">
                <div class="card-content">
                    <img src="../../Assets/demo-image.jpeg" alt="pink flowers">
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-r card">
                <div class="card-content">
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-m card">
                <div class="card-content">
                    <a href="https://www.weloveflorists.com/floral-blogs/" target="_blank">
                        <img src="../../Assets/website-header.png" alt="weloveflorists.com header page which has flowers"> Visit weloveflorists.com
                    </a>
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-l card">
                <div class="card-content">
                    <p>
                        “And so the spring buds burst, and so I gaze, And so the blossoms fall, and so my days ...”― Onitsura
                    </p>
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-xl card">
                <div class="card-content">
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-xxl card">
                <div class="card-content">
                </div>
                <div class="card-buttons">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

        </div>

    </div>
</main>

<?php require 'partials/closing.php'; ?>