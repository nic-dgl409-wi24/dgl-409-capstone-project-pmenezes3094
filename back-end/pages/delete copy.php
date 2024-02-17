<?php
// Include the database connection script
require '../database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data ID from the form
    $data_id = $_POST['data_id'];

    // Prepare SQL statement to delete the record
    $sql = "DELETE FROM data WHERE data_id = :data_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':data_id', $data_id, PDO::PARAM_INT);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Redirect to the page where records are displayed
        header("Location: ../../front-end/pages/dashboard-view.php");
        exit();
    } else {
        echo "Error deleting record";
    }
}
?>