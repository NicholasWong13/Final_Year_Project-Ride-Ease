<?php
session_start();
include('includes/config.php');
error_reporting(E_ALL);

$bookingNumber = '';
$fullname = '';
$mobile = '';
$age = '';
$passenger = '';
$fromdate = '';
$fromtime = '';
$returndate = '';
$returntime = '';
$license = '';
$pickuplocation = '';
$returnlocation = '';
$message = '';

if (isset($_GET['bookingNumber'])) {
    $bookingNumber = $_GET['bookingNumber'];

    $sql = "SELECT * FROM booking WHERE BookingNumber = :bookingNumber";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingNumber', $bookingNumber, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $fullname = $row['FullName'];
        $mobile = $row['Mobile'];
        $age = $row['age'];
        $passenger = $row['passenger'];
        $fromdate = $row['FromDate'];
        $fromtime = $row['FromTime'];
        $returndate = $row['ReturnDate'];
        $returntime = $row['ReturnTime'];
        $license = $row['License'];
        $pickuplocation = $row['PickupLocation'];
        $returnlocation = $row['ReturnLocation'];
        $message = $row['message'];
    } else {
        echo "Booking not found.";
        exit;
    }
} else {
    echo "Booking information not found.";
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ride Ease | Booking Details</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text css" href="assets/switcher/css/switcher.css" media="all" />
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
                <h1>Booking Details</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Booking Details</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="about_us section-padding">
    <div class="container">
        <p>Below are the details of your booking:</p>

        <ul>
            <li>Booking Number: <?php echo $bookingNumber; ?></li>
            <li>Full Name: <?php echo $fullname; ?></li>
            <li>Mobile: +60<?php echo $mobile; ?></li>
            <li>Age: <?php echo $age; ?></li>
            <li>No. of Passengers: <?php echo $passenger; ?></li>
            <li>From Date: <?php echo $fromdate; ?></li>
            <li>From Time: <?php echo date("h:i A", strtotime($fromtime)); ?></li>
            <li>Return Date: <?php echo $returndate; ?></li>
            <li>Return Time: <?php echo date("h:i A", strtotime($returntime)); ?></li>
            <li>License: <a href="uploads/" target="_blank"><img src="uploads/$license" alt="License"></a></li>
            <li>Image License Link: <?php echo $license; ?></li>
            <li>Pickup Location: <?php echo $pickuplocation; ?></li>
            <li>Return Location: <?php echo $returnlocation; ?></li>
            <li>Message: <?php echo $message; ?></li>
        </ul>
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
<script src="assets/js/booking-form.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
