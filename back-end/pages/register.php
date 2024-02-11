<?php 

require '../database.php';

$user_firstName = $_POST['user_firstName'];
$user_lastName = $_POST['user_lastName'];
$user_username = $_POST['user_username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$sql = "INSERT INTO user (user_firstName, user_lastName, user_username, user_email, user_password) VALUES (:user_firstName, :user_lastName, :user_username, :user_email, :user_password)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':user_firstName', $user_firstName, PDO::PARAM_STR);
$stmt->bindParam(':user_lastName', $user_lastName, PDO::PARAM_STR);
$stmt->bindParam(':user_username', $user_username, PDO::PARAM_STR);
$stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
$stmt->bindParam(':user_password', $user_password, PDO::PARAM_STR);


if ($stmt->execute()) {
    echo '<script>alert("User registered successfully.");</script>';
    echo '<script>window.location.href = "../../front-end/pages/login-form.php";</script>';
} 
else {
    $errorInfo = $stmt->errorInfo();
    echo '<script>alert("Error: ' . $errorInfo[2] . '");</script>';
}
?>