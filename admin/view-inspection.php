<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Retrieve inspection data from the database
    $sql = "SELECT * FROM inspections";
    $query = $dbh->prepare($sql);
    $query->execute();
    $inspections = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE HTML>
  <html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<title>Ride Ease | Vehicles Inspection </title>

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

<?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>

<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="row">
					<div class="col-md-12">
					<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">View Inspection</h4>
					</header>
        <div class="widget-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Year</th>
                        <th>Inspection Date</th>
                        <th>Checklist</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inspections as $inspection) { ?>
                        <tr>
                            <td><?php echo htmlentities($inspection['vehicle_make']); ?></td>
                            <td><?php echo htmlentities($inspection['vehicle_model']); ?></td>
                            <td><?php echo htmlentities($inspection['vehicle_year']); ?></td>
                            <td><?php echo htmlentities($inspection['inspection_date']); ?></td>
                            <td><?php echo htmlentities($inspection['checklist']); ?></td>
                            <td><?php echo htmlentities($inspection['comments']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
