<?php
require '../../back-end/pages/error.php';
require '../../back-end/database.php';
require '../../back-end/pages/session-variables-set.php';
require '../../back-end/pages/dashboard.php';
require 'partials/head.php';
?>
<?php require 'partials/header.php'; ?>

<main>
    <div class="container">
        <div class="greeting">
            <h3>Welcome to your Thought Treasury, <span class="emphasize"><?php echo $user_firstName; ?>!</span></h3>
        </div>
        <div class="card-container">
            <?php foreach ($cards_data as $card) : ?>
    <div class="grid-card" onclick="openCardModal('<?php echo $card['data_type']; ?>', '<?php echo $card['data_content']; ?>')">
        <div class="card-content">
            <div class="card-buttons">
                <button class="button-hover">
                    <img src="../assets/icons/edit.svg" alt="Edit">
                </button>
                <form action="../../back-end/pages/delete.php" method="post">
                    <input type="hidden" name="data_id" value="<?php echo $card['data_id']; ?>">
                    <button type="submit" class="button-hover" name="delete">
                        <img src="../assets/icons/delete.svg" alt="Delete">
                    </button>
                </form>
            </div>
        </div>
        <div class="data-content">
            <?php echo generateCardContent($card['data_type'], $card['data_content']); ?>
        </div>
    </div>
<?php endforeach; ?>


        </div>
    </div>
</main>
<?php require 'partials/modal-expand-card.php'; ?>

<?php require 'partials/closing.php'; ?>