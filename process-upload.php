<?php
if (isset($_POST['updateprofile'])) {
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = 'document/'; 
        $imageTempFile = $_FILES['image']['tmp_name'];
        $imageFileName = basename($_FILES['image']['name']);
        $imageFileLocation = $uploadDirectory . $imageFileName;

        if (!file_exists($uploadDirectory) && !mkdir($uploadDirectory, 0755, true)) {
            die("Failed to create upload directory.");
        }

        if (move_uploaded_file($imageTempFile, $imageFileLocation)) {
            echo "File uploaded and processed successfully.";
        } else {
            echo "Failed to move the file to the designated directory.";
        }
    } else {
        echo "Error uploading file. Please try again.";
    }

}
?>
