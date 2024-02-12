<?php
session_start();

require '../database.php';

// Retrieve username from POST data
$user_username = $_POST["user_username"];

// Prepare SQL query to fetch user data
$sql = "SELECT user_id, user_username, user_password, user_firstName FROM user WHERE user_username = :user_username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_username', $user_username);
$stmt->execute();

// Fetch user data from the database
$user = $stmt->fetch();

// Check if user exists
if ($user) {
    $user_password = $user['user_password'];

    // Check if the entered password matches the stored password
    $enteredPassword = $_POST["user_password"]; 
    $storedPassword = $user['user_password'];

    if ($enteredPassword === $storedPassword) {
        // Set session variables for the logged-in user
        $_SESSION['user_username'] = $user['user_username'];
        $_SESSION['user_firstName'] = $user['user_firstName'];
        $_SESSION['user_id'] = $user['user_id'];

        // Redirect to the dashboard page after successful login
        redirectWithMessage("Login Successful", "../../front-end/pages/dashboard-first-time.php");
    } else {
        // Redirect to the login form with an error message if passwords don't match
        redirectWithMessage("Username and password do not match", "../../front-end/pages/login-view.php");
    }
} else {
    // Redirect to the login form with an error message if the user doesn't exist
    redirectWithMessage("User does not exist", "../../front-end/pages/login-view.php");
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>

<a href="../../front-end/pages/login"></a>
