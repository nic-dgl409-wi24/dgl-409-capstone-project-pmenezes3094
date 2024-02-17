<?php 
require 'error.php';
require '../database.php';
require '../../back-end/pages/session-variables-set.php';

// Extract data from the POST request
$data_content = $_POST['data_content'];
$data_tag = $_POST['data_tag'];

// Check if the data_content resembles a link
if (preg_match('/\b(?:https?|ftp):\/\/\S+\b/', $data_content)) {
    $data_type = 'link';
} else {
    $data_type = 'textnote';
}

// Prepare SQL query to insert data into the database
$sql = "INSERT INTO data (user_id, data_type, data_content, data_timestamp, data_tag)
        VALUES (:user_id, :data_type, :data_content, NOW(), :data_tag)";
$stmt = $conn->prepare($sql);

// Bind parameters to the SQL statement
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // Assuming $user_id is available from session or elsewhere
$stmt->bindParam(':data_type', $data_type, PDO::PARAM_STR);
$stmt->bindParam(':data_content', $data_content, PDO::PARAM_STR);
$stmt->bindParam(':data_tag', $data_tag, PDO::PARAM_STR);

// Execute the SQL statement
if ($stmt->execute()) {
    // Redirect back to the referring page after successful insertion
    // redirectWithMessage("Data inserted successfully.", $_SERVER['HTTP_REFERER']);
    redirectWithMessage("Data inserted successfully.", "reload.php");
} else {
    // Handle errors
    $errorInfo = $stmt->errorInfo();
    redirectWithMessage("Error: " . $errorInfo[2], "error_redirect_location.php");
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>
