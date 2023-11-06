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

        $_SESSION['bookingNumber'] = $bookingNumber;
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
    <title>Ride Ease | Booking Confirmation</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
    <link rel="stylesheet" href="assets/css/print.css" media="print">
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

<?php include('includes/header.php');?>

<section class="page-header aboutus_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Booking Confirmation</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Booking Confirmation</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="about_us section-padding">
    <div class="container">
    <table class="table table-bordered">
            <tr>
                <td>Booking Number:</td>
                <td><?php echo $bookingNumber; ?></td>
            </tr>
            <tr>
                <td>Full Name:</td>
                <td><?php echo $fullname; ?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td>+60<?php echo $mobile; ?></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><?php echo $age; ?></td>
            </tr>
            <tr>
                <td>No. of Passengers:</td>
                <td><?php echo $passenger; ?></td>
            </tr>
            <tr>
                <td>From Date:</td>
                <td><?php echo $fromdate; ?></td>
            </tr>
            <tr>
                <td>From Time:</td>
                <td><?php echo date("h:i A", strtotime($fromtime)); ?></td>
            </tr>
            <tr>
                <td>Return Date:</td>
                <td><?php echo $returndate; ?></td>
            </tr>
            <tr>
                <td>Return Time:</td>
                <td><?php echo date("h:i A", strtotime($returntime)); ?></td>
            </tr>
            <tr>
                <td>License:</td>
            <td>
                <?php
                if (file_exists($license)) {
                    echo '<a href="' . $license . '" target="_blank">View License</a>';
                } else {
                    echo 'License image not found';
                }
                ?>
            </td>
            </tr>
            <tr>
                <td>Pickup Location:</td>
                <td><?php echo $pickuplocation; ?></td>
            </tr>
            <tr>
                <td>Return Location:</td>
                <td><?php echo $returnlocation; ?></td>
            </tr>
            <tr>
                <td>Message:</td>
                <td><?php echo $message; ?></td>
            </tr>
        </table>

        <button class="btn btn-primary" onclick="location.href='payment.php?bookingNumber=<?php echo $bookingNumber; ?>'">Make Payment Deposit</button>
        <button class="btn print-btn" onclick="printPage()">Print</button>
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

<script>
    function printPage() {
        window.print();
    }
</script>

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

