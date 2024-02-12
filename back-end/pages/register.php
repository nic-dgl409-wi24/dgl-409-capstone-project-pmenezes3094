<?php 
require '../database.php';

// Extract user data from the POST request
$user_firstName = $_POST['user_firstName'];
$user_lastName = $_POST['user_lastName'];
$user_username = $_POST['user_username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

// Prepare SQL query to insert user data into the database
$sql = "INSERT INTO user (user_firstName, user_lastName, user_username, user_email, user_password) VALUES (:user_firstName, :user_lastName, :user_username, :user_email, :user_password)";
$stmt = $conn->prepare($sql);

// Bind parameters to the SQL statement
$stmt->bindParam(':user_firstName', $user_firstName, PDO::PARAM_STR);
$stmt->bindParam(':user_lastName', $user_lastName, PDO::PARAM_STR);
$stmt->bindParam(':user_username', $user_username, PDO::PARAM_STR);
$stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
$stmt->bindParam(':user_password', $user_password, PDO::PARAM_STR);

// Execute the SQL statement
if ($stmt->execute()) {
    // Redirect to the login form after successful registration
    redirectWithMessage("User registered successfully.", "../../front-end/pages/login-form.php");
} else {
    // Display an error message if registration fails
    $errorInfo = $stmt->errorInfo();
    redirectWithMessage("Error: " . $errorInfo[2], "../../front-end/pages/registration-form.php");
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>
