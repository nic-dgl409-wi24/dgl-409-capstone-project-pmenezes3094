<?php
// save_data.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the content sent from the Chrome extension
    $content = $_POST['content'];

    // Do something with the content, for example, save it to a file or database
    // Example: Save content to a text file
    $file = 'saved_content.txt';
    file_put_contents($file, $content);

    // You can also run any other PHP code here based on the received content
    echo "Data saved successfully.";
} else {
    echo "Invalid request method.";
}
?>