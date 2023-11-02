<?php
if (isset($_GET['path'])) {
    $licensePath = $_GET['path'];

    // Define the absolute path to your license images directory
    $licenseDirectory = '../';  // Update the directory path

    // Combine the directory and file name to get the full path
    $fullPath = $licenseDirectory . $licensePath;

    if (file_exists($fullPath)) {
        // Determine the content type based on the image file extension
        $fileExtension = pathinfo($fullPath, PATHINFO_EXTENSION);
        $contentType = mime_content_type($fullPath);

        if (strpos($contentType, 'image/') === 0) {
            // It's an image
            header('Content-Type: ' . $contentType);
            readfile($fullPath);
        } else {
            // It's not an image, handle other file types here
            echo 'File type not supported.';
        }
    } else {
        // The file doesn't exist, display "No License Image"
        echo 'No License Image';
    }
} else {
    echo 'Invalid license path.';
}
?>
