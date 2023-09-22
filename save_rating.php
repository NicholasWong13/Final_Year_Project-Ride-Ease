<?php
// Handle saving the user rating to a database (MySQL in this example)

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));

    if ($data && isset($data->rating)) {
        $userRating = intval($data->rating);

        // You should replace the database credentials and connection logic
        $mysqli = new mysqli("localhost", "username", "password", "ride ease");

        if ($mysqli->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Database connection error']);
            exit();
        }

        $sql = "INSERT INTO ratings (rating) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $userRating);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error saving rating']);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid data']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
