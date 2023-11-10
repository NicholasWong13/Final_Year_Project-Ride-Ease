<?php
if (isset($_POST['updateprofile'])) {
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = 'document/'; // Directory where the images will be stored
        $imageTempFile = $_FILES['image']['tmp_name'];
        $imageFileName = basename($_FILES['image']['name']);
        $imageFileLocation = $uploadDirectory . $imageFileName;

        // Check and create directory if it doesn't exist
        if (!file_exists($uploadDirectory) && !mkdir($uploadDirectory, 0755, true)) {
            die("Failed to create upload directory.");
        }

        // Move the uploaded file to the desired location
        if (move_uploaded_file($imageTempFile, $imageFileLocation)) {
            // File was successfully uploaded, handle further processing here
            // For example, save the file path to a database, perform additional actions, etc.
            // Insert the $imageFileLocation into the database or perform other operations as needed
            // ...
            echo "File uploaded and processed successfully.";
        } else {
            echo "Failed to move the file to the designated directory.";
        }
    } else {
        echo "Error uploading file. Please try again.";
    }

    // Process other form fields and perform necessary database updates...
}
?>
