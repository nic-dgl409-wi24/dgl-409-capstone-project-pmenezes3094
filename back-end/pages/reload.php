<?php
require 'error.php';
require '../database.php';
require '../../back-end/pages/session-variables-set.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../../front-end/pages/login-view.php");
    exit();
}

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];

// Check if the user has any data in the data table
$sql_check_data = "SELECT COUNT(*) AS count FROM data WHERE user_id = :user_id";
$stmt_check_data = $conn->prepare($sql_check_data);
$stmt_check_data->bindParam(':user_id', $user_id);
$stmt_check_data->execute();
$row = $stmt_check_data->fetch(PDO::FETCH_ASSOC);

// Determine which main to load based on the database result
if ($row['count'] > 0) {
    header("Location: ../../front-end/pages/dashboard-view.php");
} else {
    header("Location: ../../front-end/pages/dashboard-first-time.php");
}
?>
