<?php
// Include the database connection script
require '../database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data ID from the form
    $data_id = $_POST['data_id'];

    // Prepare SQL statement to retrieve the file path from the database
    $sql_select = "SELECT data_content FROM data WHERE data_id = :data_id";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':data_id', $data_id, PDO::PARAM_INT);

    // Execute the SQL statement
    $stmt_select->execute();
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Retrieve the file path
        $file_path = $row['data_content'];

        // Delete the file from the server
        if (file_exists($file_path)) {
            unlink($file_path); // This function deletes the file
        } else {
            echo "File not found.";
        }

        // Prepare SQL statement to delete the record
        $sql_delete = "DELETE FROM data WHERE data_id = :data_id";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bindParam(':data_id', $data_id, PDO::PARAM_INT);

        // Execute the SQL statement
        if ($stmt_delete->execute()) {
            // Redirect to the page where records are displayed
            header("Location: ../../front-end/pages/dashboard-view.php");
            exit();
        } else {
            echo "Error deleting record";
        }
    } else {
        echo "Record not found.";
    }
}
?>
