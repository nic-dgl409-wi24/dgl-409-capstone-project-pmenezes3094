<?php 
session_start(); 
$user_username = $_SESSION['user_username'];
$user_firstName = $_SESSION['user_firstName'];
$user_id = $_SESSION['user_id'];
?>

<script>
// Store session variables in local storage
localStorage.setItem('user_username', '<?php echo $user_username; ?>');
localStorage.setItem('user_firstName', '<?php echo $user_firstName; ?>');
localStorage.setItem('user_id', '<?php echo $user_id; ?>');
</script>