<?php
// Include necessary files and establish database connection
require '../../back-end/pages/error.php';
require '../../back-end/database.php';
require '../../back-end/pages/session-variables-set.php';
require '../../back-end/pages/dashboard.php';
require 'partials/head.php';
?>

<?php require 'partials/header.php'; ?>

<main>
    <div class="container">
        <h2>Search Results</h2>
        <div class="card-container">
            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                
                // Query the database for matching results based on the search term
                $stmt = $conn->prepare("SELECT * FROM data WHERE user_id = :user_id AND (data_content LIKE :search OR data_tag LIKE :search)");
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $search_param = "%{$search}%"; // Add wildcards to search term
                $stmt->bindParam(':search', $search_param, PDO::PARAM_STR);
                $stmt->execute();
                $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // Display search results
                foreach ($search_results as $card) {
            ?>
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
            <?php
                }
            } else {
                echo "No search term provided.";
            }
            ?>
        </div>
        <a href="dashboard-view.php">Back to Home</a> 
    </div>
</main>

<?php require 'partials/closing.php'; ?>
