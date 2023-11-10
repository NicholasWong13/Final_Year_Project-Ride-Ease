<?php
if (isset($_GET['path'])) {
    $licensePath = $_GET['path'];

    $licenseDirectory = '../';  

    $fullPath = $licenseDirectory . $licensePath;

    if (file_exists($fullPath)) {
        $fileExtension = pathinfo($fullPath, PATHINFO_EXTENSION);
        $contentType = mime_content_type($fullPath);

        if (strpos($contentType, 'image/') === 0) {
            header('Content-Type: ' . $contentType);
            readfile($fullPath);
        } else {
            echo 'File type not supported.';
        }
    } else {
        echo 'No License Image';
    }
} else {
    echo 'Invalid license path.';
}
?>
