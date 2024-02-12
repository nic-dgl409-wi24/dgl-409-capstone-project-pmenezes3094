<?php
session_start();

// Unset session variables
unset($_SESSION['user_username']);
unset($_SESSION['user_firstName']);
unset($_SESSION['user_id']);

// Destroy the session
session_destroy();

// Redirect to login page or any other page after logout
header("Location: ../../front-end/pages/login-view.php");
exit();
?>