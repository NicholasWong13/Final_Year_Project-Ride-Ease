<?php
session_start();
include('includes/config.php'); // Include your database connection script here

// Define the absolute path to the directory where uploads should be stored
$uploadDirectory = 'uploads/'; // Replace with your actual server path

// Check if 'bookingID' is set in the session
if (isset($_SESSION['bookingID'])) {
    $bookingID = $_SESSION['bookingID'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $payment_method = $_POST['payment_method'];

        if ($payment_method == 'cash') {
            // Handle cash payment
            // You can insert a record into the database here

            // Example query to insert payment information
            $paymentAmount = 1000; // Assuming a fixed amount of RM1000
            $paymentDate = date("Y-m-d H:i:s"); // Use the current date and time

            $insertPaymentQuery = "INSERT INTO payment (BookingID, Amount, PaymentDate, PaymentMethod) 
                                   VALUES (:bookingID, :paymentAmount, :paymentDate, 'Cash')";
            $stmt = $dbh->prepare($insertPaymentQuery);
            $stmt->bindParam(':bookingID', $bookingID);
            $stmt->bindParam(':paymentAmount', $paymentAmount);
            $stmt->bindParam(':paymentDate', $paymentDate);
            $stmt->execute();

            if ($stmt) {
                // Payment successful, you can redirect or display a success message
                header('Location: cash-payment.php?success=true');
                exit();
            } else {
                // Handle database insertion error
                echo "Payment failed. Please try again or contact support.";
            }
        } elseif ($payment_method == 'bank_transfer') {
            // Handle bank transfer payment
            if (isset($_FILES['receipt_file']) && $_FILES['receipt_file']['error'] == UPLOAD_ERR_OK) {
                $temp_receipt_path = $uploadDirectory . basename($_FILES['receipt_file']['name']);

                if (move_uploaded_file($_FILES['receipt_file']['tmp_name'], $temp_receipt_path)) {
                    // Insert a record into the database with the receipt path

                    // Example query to insert payment information
                    $paymentAmount = 1000; // Assuming a fixed amount of RM1000
                    $paymentDate = date("Y-m-d H:i:s"); // Use the current date and time

                    $insertPaymentQuery = "INSERT INTO payment (BookingID, Amount, PaymentDate, PaymentMethod, ReceiptPath) 
                                       VALUES (:bookingID, :paymentAmount, :paymentDate, 'Bank Transfer', :temp_receipt_path)";
                    $stmt = $dbh->prepare($insertPaymentQuery);
                    $stmt->bindParam(':bookingID', $bookingID);
                    $stmt->bindParam(':paymentAmount', $paymentAmount);
                    $stmt->bindParam(':paymentDate', $paymentDate);
                    $stmt->bindParam(':temp_receipt_path', $temp_receipt_path);
                    $stmt->execute();

                    if ($stmt) {
                        // Payment successful, you can redirect or display a success message
                        header('Location: bank-transfer.php?success=true');
                        exit();
                    } else {
                        // Handle database insertion error
                        echo "Payment failed. Please try again or contact support.";
                    }
                } else {
                    // Handle file upload error
                    echo "File Upload Error: There was a problem with the file upload.";
                }
            } else {
                // Handle file upload error
                echo "File Upload Error: Please upload a valid receipt file.";
            }
        }
    }
} else {
    // Handle the case where 'bookingID' is not set in the session
    echo "Booking information not found. Please go back to the booking page and start again.";
}
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ride Ease | Payment</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

<?php include('includes/colorswitcher.php');?>

<?php include('includes/header.php');?>

<section class="page-header aboutus_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Payment</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Payment</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="listing-detail">
    <div class="container">
    <form method="post" class="payment-form" enctype="multipart/form-data">
            <div class="widget_heading">
                <h5><i class="fa fa-envelope" aria-hidden="true"></i> Payment Method (Deposit)</h5>
            </div>

            <div class="form-group">
                <label class="control-label">Bank Transfer Details</label>
                <div>
                    <p>Bank Name: Ride Ease</p>
                    <p>Account Holder's Name: Ride Ease</p>
                    <p>Account Number: Your Account Number</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Deposit - RM1000</label>
                <div>
                    <label>
                        <input type="radio" name="payment_method" value="cash" required> Cash
                    </label><br/>
                    <label>
                        <input type="radio" name="payment_method" value="bank_transfer" required> Bank Transfer
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Bank Transfer Receipt (Upload)</label>
                <input type="file" name="receipt_file" accept="image/*" />
            </div>

            <div class="form-group">
                <input type="submit" class="btn" name="submit" value="Proceed to Complete">
            </div>
        </form>
        <div class="col s4">
            <div class="rounded-card tint-glass-black" style="margin-top: 100px;">
                <div class="card-content">
                    <label for="cards" style="font-size: 24px;">Accepted Methods</label>
                    <div style= 'margin-bottom: 20px; padding: 7px 0; font-size: 40px;'>
                        <i class="fa fa-cc-visa payable-cards" style="color: navy;"></i>
                        <i class="fa fa-cc-amex payable-cards" style="color: blue;"></i>
                        <i class="fa fa-cc-mastercard payable-cards" style="color: red;"></i>
                        <i class="fa fa-cc-discover payable-cards" style="color: orange;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php');?>

<div id="back-top" class="back-top">
    <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
</div>

<?php include('includes/login.php');?>

<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!-- Bootstrap Slider JS -->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!-- Slider JS -->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
