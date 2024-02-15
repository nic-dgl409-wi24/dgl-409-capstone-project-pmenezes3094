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
                <div class="data-content">
                    <p>hHi My name is priya and I love design. this is continue flow of content that I am testing right now. I'm trying to write more content to test more contest sorry</p>
                    <img src="../assets/images/background.jpg">
                </div>
                <div class="card-content">
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/edit.svg" alt="">
                    </button>
                    <button class="slide-button button-icon">
                        <img src="../assets/icons/delete.svg" alt="">
                    </button>
                </div>
            </div>

            <div class="card-xs card">
            </div>

            <div class="card-s card">
            </div>

            <div class="card-r card">
            </div>

            <div class="card-m card">
            </div>

            <div class="card-l card">
            </div>

            <div class="card-xl card">
            </div>

            <div class="card-xxl card">
            </div>

        </div>

    </div>
</main>

<?php require 'partials/closing.php'; ?>