<?php
// Assuming $user_id is available from session or elsewhere
$user_id = $_SESSION['user_id'];

// Retrieve data from the database
$stmt = $conn->prepare("SELECT * FROM data WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$cards_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Function to generate appropriate HTML markup based on data type
function generateCardContent($data_type, $data_content) {
    switch ($data_type) {
        case 'textnote':
            return "<p>$data_content</p>";
        case 'image':
            return "<img src='$data_content' alt='Image'>";
        case 'video':
            return "<video controls><source src='$data_content' type='video/mp4'></video>";
        case 'audio':
            return "<audio controls><source src='$data_content' type='audio/mp3'></audio>";
        case 'link':
            return "<a href='$data_content'>$data_content</a>";
        case 'file':
            return "<a href='$data_content'>$data_content</a>";
        default:
            return "<p>$data_content</p>";
    }
}

?>

