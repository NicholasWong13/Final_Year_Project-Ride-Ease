<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the AJAX request
    $vehicleId = $_POST['vehicleId'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    // Implement the SQL query to update availability
    // Be sure to validate and sanitize input data

    // Return a success or error response
    $response = [
        'status' => 'success',
        'message' => 'Availability updated successfully',
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
