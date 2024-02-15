<?php
// Assuming $user_id is available from session or elsewhere
$user_id = $_SESSION['user_id'];

// Define the search term (assuming it's submitted via a form)
$search_term = $_POST['search_term']; 

// Retrieve data from the database based on the search term
$stmt = $conn->prepare("SELECT * FROM data WHERE user_id = :user_id AND (data_content LIKE :search_term OR data_tag LIKE :search_term)");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$search_param = "%$search_term%"; // Add wildcard for partial matches
$stmt->bindParam(':search_term', $search_param, PDO::PARAM_STR);
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
        default:
            return "<p>$data_content</p>";
    }
}
?>
