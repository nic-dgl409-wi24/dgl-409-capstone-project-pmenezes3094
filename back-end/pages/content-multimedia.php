<?php
require 'error.php';
require '../database.php';
require '../../back-end/pages/session-variables-set.php';

function uploadFile($file) {
    $uploaddirectory = "../../../uploads/";
    $filename = $file['name'];
    $newfilename = sanitizeFileName($filename, $uploaddirectory);
    
    if (move_uploaded_file($file['tmp_name'], $uploaddirectory . $newfilename)) {
        return $uploaddirectory . $newfilename;
    } else {
        return false;
    }
}

function sanitizeFileName($filename, $directory) {
    $fileextension = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = preg_replace('/[^A-z0-9]/', '.', $filename);
    $i = 0;
    while (file_exists($directory . $newfilename)) {
        $i++;
        $newfilename = $newfilename . $i . '.' . $fileextension;
    }
    return $newfilename;
}

function determineDataType($file_extension) {
    $image_extensions = array("jpg", "jpeg", "png", "gif", "bmp", "tiff", "svg");
    $video_extensions = array("mp4", "avi", "mov", "wmv", "mkv");
    $audio_extensions = array("mp3", "wav", "ogg", "aac", "wma");

    if (in_array($file_extension, $image_extensions)) {
        return 'image';
    } elseif (in_array($file_extension, $video_extensions)) {
        return 'video';
    } elseif (in_array($file_extension, $audio_extensions)) {
        return 'audio';
    } else {
        return 'file';
    }
}

function insertData($user_id, $data_type, $data_content, $data_tag) {
    global $conn;
    $sql = "INSERT INTO data (user_id, data_type, data_content, data_timestamp, data_tag)
            VALUES (:user_id, :data_type, :data_content, NOW(), :data_tag)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':data_type', $data_type, PDO::PARAM_STR);
    $stmt->bindParam(':data_content', $data_content, PDO::PARAM_STR);
    $stmt->bindParam(':data_tag', $data_tag, PDO::PARAM_STR);
    return $stmt->execute();
}

// Extract data from the POST request
$data_tag = $_POST['data_tag'];

// Check if file upload is successful
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $filepath = uploadFile($_FILES['image']);

    if ($filepath !== false) {
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $data_type = determineDataType(strtolower($file_extension));

        if (insertData($user_id, $data_type, $filepath, $data_tag)) {
            redirectWithMessage("File uploaded successfully.", "reload.php");
        } else {
            redirectWithMessage("Error inserting data into the database.", "error_redirect_location.php");
        }
    } else {
        redirectWithMessage("File could not be uploaded. Please try again.", $_SERVER['HTTP_REFERER']);
    }
} else if (isset($_FILES['audio']) && $_FILES['audio']['error'] === 0) {
    $audioPath = uploadFile($_FILES['audio']);

    if ($audioPath !== false) {
        $file_extension = pathinfo($_FILES['audio']['name'], PATHINFO_EXTENSION);
        $data_type = determineDataType(strtolower($file_extension));

        if (insertData($user_id, $data_type, $audioPath, $data_tag)) {
            redirectWithMessage("Audio uploaded successfully.", "reload.php");
        } else {
            redirectWithMessage("Error inserting audio data into the database.", "error_redirect_location.php");
        }
    } else {
        redirectWithMessage("Audio file could not be uploaded. Please try again.", $_SERVER['HTTP_REFERER']);
    }
} else {
    // Handle file upload errors
    redirectWithMessage("File could not be uploaded.", $_SERVER['HTTP_REFERER']);
}

// Function to redirect with a JavaScript alert message
function redirectWithMessage($message, $url) {
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location.href = "' . $url . '";</script>';
}
?>
