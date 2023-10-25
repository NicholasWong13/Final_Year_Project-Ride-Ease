<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['search'])) {
    $searchdata = $_POST['searchdata'];
    $results = array();

    $sql = "SELECT * FROM booking WHERE BookingNumber LIKE :searchdata OR Name LIKE :searchdata OR MobileNumber LIKE :searchdata";
    $query = $dbh->prepare($sql);
    $query->bindParam(':searchdata', '%' . $searchdata . '%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    	<meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ride Ease | Search Booking Detail</title>

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


</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Search by Booking No./Name/Mobile No.</label>
                                        <input id="searchdata" type="text" name="searchdata" required="true"
                                            class="form-control" placeholder="Booking No./Name/Mobile No.">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                                </form>
                            </header>
                            <?php if (isset($_POST['search'])) { ?>
                            <h4 align="center">Result against "<?php echo $searchdata; ?>" keyword</h4>
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Booking Number</th>
                                                <th>UserName</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            foreach ($results as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row->BookingNumber); ?></td>
                                                <td><?php echo htmlentities($row->Name); ?></td>
                                                <td><?php echo htmlentities($row->MobileNumber); ?></td>
                                                <td><?php echo htmlentities($row->Email); ?></td>
                                                <?php if (empty($row->Status)) { ?>
                                                <td><?php echo "Not Updated Yet"; ?></td>
                                                <?php } else { ?>
                                                <td><?php echo htmlentities($row->Status); ?></td>
                                                <?php } ?>
                                                <td><a href="view-booking-detail.php?editid=<?php echo htmlentities($row->ID); ?>&&aptid=<?php echo htmlentities($row->AppointmentNumber); ?>" class="btn btn-primary">View</a></td>
                                            </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </main>
    <?php include_once('includes/customizer.php'); ?>

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