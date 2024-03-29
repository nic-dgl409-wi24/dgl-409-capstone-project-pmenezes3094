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
    $user_id = $user['user_id'];
    $user_password = $user['user_password'];

    // Check if the entered password matches the stored password
    $enteredPassword = $_POST["user_password"]; 
    $storedPassword = $user['user_password'];

    if ($enteredPassword === $storedPassword) {
        // Set session variables for the logged-in user
        $_SESSION['user_username'] = $user['user_username'];
        $_SESSION['user_firstName'] = $user['user_firstName'];
        $_SESSION['user_id'] = $user['user_id'];

        // Check if the user has data in the data table
        $sql_check_data = "SELECT COUNT(*) AS count FROM data WHERE user_id = :user_id";
        $stmt_check_data = $conn->prepare($sql_check_data);
        $stmt_check_data->bindParam(':user_id', $user_id);
        $stmt_check_data->execute();
        $row = $stmt_check_data->fetch(PDO::FETCH_ASSOC);

        if ($row['count'] > 0) {
            // Redirect to the dashboard page if data exists
            redirectWithMessage("Login Successful", "../../front-end/pages/dashboard-view.php");
        } else {
            // Redirect to the first-time dashboard view if no data exists
            redirectWithMessage("Login Successful", "../../front-end/pages/dashboard-first-time.php");
        }

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
