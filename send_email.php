<?php

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Initialize PHPMailer

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'rideease.my@gmail.com'; // Your Gmail email address
$mail->Password = 'rideease'; // Your Gmail password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 465;

$mail->setFrom('rideease.my@gmail.com', 'Ride Ease');
$mail->addAddress('nicholaswongkx@gmail.com', 'Wong');
$mail->Subject = 'Hello from PHPMailer';
$mail->Body = 'This is a test email sent from PHPMailer via Gmail SMTP.';

try {
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email sending failed. Error: {$mail->ErrorInfo}";
}


?>