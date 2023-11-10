<?php
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

if (isset($_GET['path'])) {
    $image = $_GET['path'];

    $imageDirectory = 'document/'; 
    $image = basename($image);

    $fullPath = $imageDirectory . $image;

    if (file_exists($fullPath) && is_readable($fullPath)) {
        $fileExtension = pathinfo($fullPath, PATHINFO_EXTENSION);

        if (in_array($fileExtension, $allowedExtensions)) {
            $contentType = mime_content_type($fullPath);

            if (strpos($contentType, 'image/') === 0) {
                header('Content-Type: ' . $contentType);
                readfile($fullPath);
                exit;
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
