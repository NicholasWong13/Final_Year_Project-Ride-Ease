<?php
if (isset($_GET['path'])) {
    $image = $_GET['path'];

    $imageDirectory = '../';

    $fullPath = $imageDirectory . $image;

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
        echo 'No Receipt';
    }
} else {
    echo 'Invalid receipt path.';
}
?>


