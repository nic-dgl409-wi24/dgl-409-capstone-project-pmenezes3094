<?php
require 'error.php';
require '../database.php';
require '../../back-end/pages/session-variables-set.php';

// Function to upload base64-encoded audio data
function uploadBase64Audio($base64Data, $data_tag, $user_id, $conn) {
    // Extract base64 data
    $audioData = base64_decode($base64Data);

    // Define the upload directory
    $uploaddirectory = "../../../uploads/";

    // Create a unique filename
    $filename = uniqid('audio_') . '.wav';

    // Define the file path
    $filepath = $uploaddirectory . $filename;

    // Save the audio data to the file
    if (file_put_contents($filepath, $audioData)) {
        // Determine data type
        $data_type = 'audio';

        // Insert data into the database using parameterized query
        $sql = "INSERT INTO data (user_id, data_type, data_content, data_timestamp, data_tag)
                VALUES (:user_id, :data_type, :data_content, NOW(), :data_tag)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':data_type', $data_type, PDO::PARAM_STR);
        $stmt->bindParam(':data_content', $filepath, PDO::PARAM_STR);
        $stmt->bindParam(':data_tag', $data_tag, PDO::PARAM_STR);

        if ($stmt->execute()) {
            redirectWithMessage("Audio uploaded successfully.", "reload.php");
        } else {
            redirectWithMessage("Error inserting audio data into the database.", "error_redirect_location.php");
        }
    } else {
        redirectWithMessage("Audio file could not be uploaded. Please try again.", $_SERVER['HTTP_REFERER']);
    }
}

// Extract data from the POST request
$data_tag = $_POST['data_tag'];
$user_id = $_SESSION['user_id']; // Assuming you have a user session set up
$conn = $pdo; // Assuming you have a PDO database connection named $pdo

// Check if audio data is passed
if (isset($_POST['audioData']) && $conn !== null) {
    // Call function to upload base64-encoded audio
    uploadBase64Audio($_POST['audioData'], $data_tag, $user_id, $conn);
} else {
    // Handle if audio data is not passed or PDO connection is null
    // redirectWithMessage("Audio data not found or database connection failed.", $_SERVER['HTTP_REFERER']);
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>
