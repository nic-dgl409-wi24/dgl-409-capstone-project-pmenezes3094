<?php
require '../../back-end/pages/error.php';
require '../../back-end/database.php';
require '../../back-end/pages/session-variables-set.php';
require '../../back-end/pages/dashboard.php';
require 'partials/head.php';
?>

<?php require 'partials/header.php'; ?>
<div class="hotspot"><a href="login-view.php">next</a></div>

<main>
    <div class="container">
        <div class="greeting">
            <h3>Welcome to your Thought Treasury, <span class="emphasize"><?php echo $user_firstName; ?>!</span></h3>
        </div>

        <div class="card-container">
            <div class="grid-card">
                <div class="data-content">
                    <p>hHi My name is priya and I love design. this is continue flow of content that I am testing right now. I'm trying to write more content to test more contest sorry</p>
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

                <div class="grid-card">
                    <div class="data-content">
                        <audio controls>
                            <source src="../../../dry-flowers-and-twigs-rustling-34133.mp3" type="audio/mp3">
                        </audio>
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

                    <div class="grid-card">
                        <div class="data-content">
                            <video controls width="300">
                                <source src="../../../pexels_videos_3744 (Original).mp4" type="video/mp4">
                            </video>
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

                        <div class="grid-card">
                            <div class="data-content">
                                <a href=""></a>
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

                            <div class="grid-card">
                                <div class="data-content">
                                    <div class="card-content">
                                        <img src="../assets/demo-image.jpeg" alt="pink flowers">
                                    </div>
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

                            <?php foreach ($cards_data as $card) : ?>
                                <div class="grid-card">
                                    <div class="data-content">
                                        <?php echo generateCardContent($card['data_type'], $card['data_content']); ?>
                                    </div>
                                    <div class="card-content">
                                        <button class="slide-button button-icon">
                                            <img src="../assets/icons/edit.svg" alt="Edit">
                                        </button>
                                        <form action="../../back-end/pages/delete.php" method="post">
                                            <input type="hidden" name="data_id" value="<?php echo $card['data_id']; ?>">
                                            <button type="submit" class="slide-button button-icon" name="delete">
                                                <img src="../assets/icons/delete.svg" alt="Delete">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
</main>

<?php require 'partials/closing.php'; ?>