<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize input data
        $vehicle_make = filter_input(INPUT_POST, 'vehicle_make', FILTER_SANITIZE_STRING);
        $vehicle_model = filter_input(INPUT_POST, 'vehicle_model', FILTER_SANITIZE_STRING);
        $vehicle_year = filter_input(INPUT_POST, 'vehicle_year', FILTER_SANITIZE_NUMBER_INT);
        $inspection_date = filter_input(INPUT_POST, 'inspection_date', FILTER_SANITIZE_STRING);
        $checklist = implode(', ', $_POST["checklist"]);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

        // Check for any required fields
        if (empty($vehicle_make) || empty($vehicle_model) || empty($vehicle_year) || empty($inspection_date)) {
            $error = "Please fill in all required fields.";
        } else {
            // Insert inspection data into the database
            $sql = "INSERT INTO inspections (vehicle_make, vehicle_model, vehicle_year, inspection_date, checklist, comments) VALUES (:vehicle_make, :vehicle_model, :vehicle_year, :inspection_date, :checklist, :comments)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':vehicle_make', $vehicle_make, PDO::PARAM_STR);
            $query->bindParam(':vehicle_model', $vehicle_model, PDO::PARAM_STR);
            $query->bindParam(':vehicle_year', $vehicle_year, PDO::PARAM_INT);
            $query->bindParam(':inspection_date', $inspection_date, PDO::PARAM_STR);
            $query->bindParam(':checklist', $checklist, PDO::PARAM_STR);
            $query->bindParam(':comments', $comments, PDO::PARAM_STR);

            if ($query->execute()) {
                $msg = "Inspection data has been successfully recorded.";
            } else {
                $error = "Error: Data not recorded.";
            }
        }
    }
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
						<h4 class="widget-title">Vehicles Inspection</h4>
					</header>
					<div class="widget-body">
            <?php if ($error) { ?>
                <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div>
            <?php } elseif ($msg) { ?>
                <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div>
            <?php } ?>
            <form action="vehicle-inspection.php" method="post">
                <label for="vehicle_make">Vehicle Make:</label>
                <input type="text" name="vehicle_make" required><br>

                <label for="vehicle_model">Vehicle Model:</label>
                <input type="text" name="vehicle_model" required><br>

                <label for="vehicle_year">Vehicle Year:</label>
                <input type="number" name="vehicle_year" required><br>

                <label for="inspection_date">Inspection Date:</label>
                <input type="date" name="inspection_date" required><br>

                <h2>Inspection Checklist:</h2>
                <input type="checkbox" name="checklist[]" value="Brakes"> Brakes<br>
                <input type="checkbox" name="checklist[]" value="Lights"> Lights<br>
                <input type="checkbox" name="checklist[]" value="Tires"> Tires<br>
                <input type="checkbox" name="checklist[]" value="Engine"> Engine<br>
                <input type="checkbox" name="checklist[]" value="Transmission"> Transmission<br>

                <label for="comments">Additional Comments:</label><br>
                <textarea name="comments" rows="4" cols="50"></textarea><br>

                <input type="submit" value="Submit Inspection">
            </form>
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