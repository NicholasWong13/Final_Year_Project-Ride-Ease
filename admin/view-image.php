<?php
// Whitelist allowed image extensions to prevent arbitrary file execution
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

if (isset($_GET['path'])) {
    $image = $_GET['path'];

    $imageDirectory = '../'; // You might want to adjust this to your actual directory

    // Ensure the image path is within the image directory
    $fullPath = realpath($imageDirectory . $image);

    if (strpos($fullPath, $imageDirectory) === 0 && file_exists($fullPath)) {
        $fileExtension = pathinfo($fullPath, PATHINFO_EXTENSION);

        if (in_array($fileExtension, $allowedExtensions)) {
            $contentType = mime_content_type($fullPath);

            if (strpos($contentType, 'image/') === 0) {
                header('Content-Type: ' . $contentType);
                readfile($fullPath);
                exit; // Stop further execution after serving the file
            } else {
                echo 'File type not supported.';
            }
        } else {
            echo 'Invalid file extension.';
        }
    } else {
        echo 'File not found or access denied.';
    }
} else {
    echo 'Invalid request.';
}
?>


