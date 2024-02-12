<?php
// Include the database connection script
require '../database.php';

// Extract user input from the POST request
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];

// Define the SQL query to update the user's password
$sql = "UPDATE user SET user_password = :user_password WHERE user_username = :user_username";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters to the SQL statement
$stmt->bindParam(':user_username', $user_username, PDO::PARAM_STR);
$stmt->bindParam(':user_password', $user_password, PDO::PARAM_STR);

// Execute the SQL statement
if ($stmt->execute()) {
    // If password update is successful, redirect to the login form
    redirectWithMessage("Password updated successfully.", "../../front-end/pages/login-form.php");
} else {
    // If an error occurs, display an error message
    $errorInfo = $stmt->errorInfo();
    redirectWithMessage("Error: " . $errorInfo[2], "../../front-end/pages/login-form.php");
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>
