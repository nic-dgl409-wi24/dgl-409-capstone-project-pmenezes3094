<?php
session_start();

require '../database.php';

$user_username = $_POST["user_username"];



$sql = "SELECT user_id, user_username, user_password, user_firstName FROM user WHERE user_username = :user_username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_username', $user_username);
$stmt->execute();

$user = $stmt->fetch();

if ($user) 
{
    $user_password = $user['user_password'];

    //Algorithm to check password
    $enteredPassword = $_POST["user_password"]; 
    $storedPassword = $user['user_password'];
    if ($enteredPassword === $storedPassword)
    {
        $_SESSION['user_username'] = $user['user_username'];
        $_SESSION['user_firstName'] = $user['user_firstName'];
        $_SESSION['user_id'] = $user['user_id'];

        $user_username = $_SESSION['user_username'];
        $user_firstName = $_SESSION['user_firstName'];
        $user_id = $_SESSION['user_id'];

        echo '<script>alert("Login Successful");</script>';
        echo '<script>window.location.href = "../../front-end/pages/dashboard-first-time.php";</script>';
    }
    else 
    {
        echo '<script>alert("Username and password do not match");</script>';
        echo '<script>window.location.href = "../../front-end/pages/login-form.php";</script>';
    }
} 
else 
{
    echo '<script>alert("User does not exist");</script>';
    echo '<script>window.location.href = "../../front-end/pages/login-form.php";</script>';
}
?>
