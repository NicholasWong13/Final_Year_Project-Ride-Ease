<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (isset($_SESSION['bookingNumber'])) {
    $bookingNumber = $_SESSION['bookingNumber'];

    $getBookingIdQuery = "SELECT id FROM booking WHERE BookingNumber = :booking_number";
    
    try {
        $stmt = $dbh->prepare($getBookingIdQuery);
        $stmt->bindParam(':booking_number', $bookingNumber);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "Booking not found.";
            exit;
        }

        $bookingId = $result['id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $payment_method = $_POST['payment_method'];

            if ($payment_method == 'cash') {
                $paymentAmount = 1000; 
                $paymentDate = date("Y-m-d H:i:s");

                $insertPaymentQuery = "INSERT INTO payment (BookingId, PaymentDate, Amount, PaymentMethod) 
                    VALUES (:booking_id, :payment_date, :payment_amount, :payment_method)";

                try {
                    $stmt = $dbh->prepare($insertPaymentQuery);
                    $stmt->bindParam(':booking_id', $bookingId); 
                    $stmt->bindParam(':payment_date', $paymentDate);
                    $stmt->bindParam(':payment_amount', $paymentAmount);
                    $stmt->bindParam(':payment_method', $payment_method);

                    if ($stmt->execute()) {
                        header('Location: cash-payment.php'); 
                        exit();
                    } else {
                        echo "Payment failed. Please try again or contact support.";
                    }
                } catch (PDOException $e) {
                    echo "Database Error: " . $e->getMessage();
                }
            } elseif ($payment_method == 'bank_transfer') {
                $bankAccountNumber = $_POST['bank_account_number'];
                
                if (!empty($_FILES['bank_transfer_receipt']['name'])) {
                    $uploadDir = 'receipts/';
                    $uploadFile = $uploadDir . basename($_FILES['bank_transfer_receipt']['name']);

                    if (move_uploaded_file($_FILES['bank_transfer_receipt']['tmp_name'], $uploadFile)) {
                        $paymentAmount = 1000; 
                        $paymentDate = date("Y-m-d H:i:s");

                        $insertPaymentQuery = "INSERT INTO payment (BookingId, PaymentDate, Amount, PaymentMethod, BankAccountNumber, ReceiptPath) 
                            VALUES (:booking_id, :payment_date, :payment_amount, :payment_method, :bank_account_number, :receipt_path)";

                        try {
                            $stmt = $dbh->prepare($insertPaymentQuery);
                            $stmt->bindParam(':booking_id', $bookingId); 
                            $stmt->bindParam(':payment_date', $paymentDate);
                            $stmt->bindParam(':payment_amount', $paymentAmount);
                            $stmt->bindParam(':payment_method', $payment_method);
                            $stmt->bindParam(':bank_account_number', $bankAccountNumber);
                            $stmt->bindParam(':receipt_path', $uploadFile);

                            if ($stmt->execute()) {
                                header('Location: bank-transfer.php'); 
                                exit();
                            } else {
                                echo "Payment failed. Please try again or contact support.";
                            }
                        } catch (PDOException $e) {
                            echo "Database Error: " . $e->getMessage();
                        }
                    } else {
                        echo "Failed to upload the receipt.";
                    }
                } else {
                    echo "Please upload the bank transfer receipt.";
                }
            }
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
} else {
    echo "Booking information not found. Please go back to the booking page and start again.";
    exit;
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
                    <p>Bank Name: <b><span style="color: blue;">Maybank Berhad</span></b></p>
                    <p>Account Holder's Name: <b><span style="color: blue;">Ride Ease</span></b></p>
                    <p>Account Number: <b><span style="color: blue;">514019999999</span></b></p>
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
                <label class="control-label">Upload Receipt</label>
                <input type="file" name="bank_transfer_receipt" accept=".pdf, .jpg, .jpeg, .png" />
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
                        <i class="fa fa fa-money" style="color: black;"></i>
                        <i class="fa fa-bank" style="color: gold;"></i>
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
