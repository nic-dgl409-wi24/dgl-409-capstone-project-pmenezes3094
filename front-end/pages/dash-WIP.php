<?php 
require '../../back-end/pages/error.php';
require '../../back-end/database.php';
require 'partials/head.php';
require '../../back-end/pages/session-variables-set.php';

// Connect to your database and retrieve data
// Assuming you have already set up your database connection

// Fetch data from the database
$stmt = $conn->prepare("SELECT data_id, data_content, data_tag, data_type FROM data where user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="hotspot"><a href="login-view.php">next</a></div>

<?php require 'partials/header.php'; ?>

<main>
    <div class="container">
        <div class="greeting">
            <h3>Welcome to your Thought Treasury, <span class="emphasize"><?php echo $user_firstName; ?>!</span></h3>
        </div>

        <div class="card-container">
            <?php foreach ($cards as $card): ?>
                <div class="card <?php echo determineCardClass($card['data_type']); ?>">
                    <div class="card-content">
                        <p><?php echo htmlspecialchars($card['data_content']); ?></p>
                        <!-- Your card content here -->
                    </div>
                    <div class="slide-buttons">
                        <button class="slide-button button-icon">
                            <img src="../assets/icons/edit.svg" alt="">
                        </button>
                        <button class="slide-button button-icon">
                            <img src="../assets/icons/delete.svg" alt="">
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>


<?php require 'partials/closing.php'; ?>

<?php
// Function to determine the class name based on content type
function determineCardClass($content_type) {
    switch ($content_type) {
        case 'audio':
            return 'card-xxs';
        case 'video':
            return 'card-xs';
        case 'image':
            return 'card-s';
        case 'textnote':
                return 'card-l';
        case 'link':
                return 'card-m';
        default:
            return 'default-xl';
    }
}
?>
