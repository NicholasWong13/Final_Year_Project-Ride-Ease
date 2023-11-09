<?php
session_start();
include('includes/config.php');

if (isset($_GET['bid'])) {
    $bid = intval($_GET['bid']);

    $sql = "SELECT booking.*, users.FullName, vehicles.PricePerDay, brands.BrandName, vehicles.VehiclesTitle FROM booking
            JOIN vehicles ON vehicles.id = booking.VehicleId
            JOIN users ON users.EmailId = booking.userEmail
            JOIN brands ON vehicles.VehiclesBrand = brands.id
            WHERE booking.id = :bid";


    $query = $dbh->prepare($sql);
    $query->bindParam(':bid', $bid, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
    $fromDate = new DateTime($result['FromDate']);
    $returnDate = new DateTime($result['ReturnDate']);
    $interval = $fromDate->diff($returnDate);
    $totalDays = $interval->days;
    $totalCost = $totalDays * $result['PricePerDay'];
}

}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Details</title>
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
		<!-- build:css assets/css/app.min.css -->
		<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
		<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
		<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/core.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<!-- endbuild -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
		<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
		<script>
			Breakpoints();
		</script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

<main id="app-main" class="app-main">
	<div class="wrap">
		<section class="app-content">
			<div class="row">
				<div class="col-md-12">
					<div class="widget">
						<header class="widget-header">
							<h4 class="widget-title">Bookings Details</h4>
						</header>
						<hr class="widget-separator">
                            <div class="widget-body">
                             
    <?php if (isset($result)) { ?>
        <table>
            <tr>
                <th>Booking Number:</th>
                <td><?php echo htmlentities($result['BookingNumber']); ?></td>
            </tr>
            <tr>
                <th>User's Name:</th>
                <td><?php echo htmlentities($result['FullName']); ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo htmlentities($result['userEmail']); ?></td>
            </tr>
            <tr>
                <th>Vehicle:</th>
                <td><?php echo htmlentities($result['BrandName']); ?> <?php echo htmlentities($result['VehiclesTitle']); ?></td>
            </tr>
            <tr>
                <th>From Date:</th>
                <td><?php echo htmlentities($result['FromDate']); ?></td>
            </tr>
            <tr>
                <th>Return Date:</th>
                <td><?php echo htmlentities($result['ReturnDate']); ?></td>
            </tr>
            <tr>
                <th>Price/Day:</th>
                <td><?php echo htmlentities($result['PricePerDay']); ?></td>
            </tr>
            <tr>
                <th>Total Days:</th>
                <td><?php echo htmlentities($totalDays); ?></td>
            </tr>
            <tr>
                <th>Total Cost:</th>
                <td><?php echo htmlentities($totalCost); ?></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td><?php echo ($result['Status'] == 1) ? 'Confirmed' : 'Not Confirmed'; ?></td>
            </tr>
            <tr>
                <th>Posting Date:</th>
                <td><?php echo htmlentities($result['PostingDate']); ?></td>
            </tr>
        </table><br/>
		<a href="manage-bookings.php" class="btn btn-primary">Go Back</a>
       
    <?php } else { ?>
        <p>Booking not found.</p>
    <?php } ?>
	                  
	</div>
    <?php include_once('includes/footer.php'); ?>
    </main>
    <!-- build:js assets/js/core.min.js -->
    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->
    <!-- build:js assets/js/app.min.js -->
    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    </body>
</html>