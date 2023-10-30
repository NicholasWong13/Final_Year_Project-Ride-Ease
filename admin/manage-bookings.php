<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_REQUEST['eid'])) {
        $eid = intval($_GET['eid']);
        $status = "2";
        $sql = "UPDATE booking SET Status=:status WHERE id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Booking Successfully Cancelled";
    }

    if (isset($_REQUEST['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = 1;
        $sql = "UPDATE booking SET Status=:status WHERE id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Booking Successfully Confirmed";
    }
    ?>

    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ride Ease | Admin Manage Bookings</title>

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

    <?php include_once('includes/header.php'); ?>

    <?php include_once('includes/sidebar.php'); ?>

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Manage Bookings</h4>
                            </header>
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <?php if ($error) { ?>
                                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                                else if ($msg) { ?>
                                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                <div class="table-responsive">
                                    <table id="zctb"
                                           class="display table table-striped table-bordered table-hover"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Bookings Info</div>
                                            <div class="panel-body">
                                                <table id="zctb"
                                                       class="display table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Booking No</th>
                                                        <th>Full Name</th>
                                                        <th>Vehicle</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Price/Day (RM)</th>
                                                        <th>From Date</th>
                                                        <th>Return Date</th>
                                                        <th>Driver License</th>
                                                        <th>Status</th>
                                                        <th>Total Days</th>
                                                        <th>Total Cost (RM)</th>
                                                        <th>Posting date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Booking No</th>
                                                        <th>Full Name</th>
                                                        <th>Vehicle</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Price/Day (RM)</th>
                                                        <th>From Date</th>
                                                        <th>Return Date</th>
                                                        <th>Driver License</th>
                                                        <th>Status</th>
                                                        <th>Total Days</th>
                                                        <th>Total Cost (RM)</th>
                                                        <th>Posting date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>

                                                    <?php
                                                    $sql = "SELECT booking.BookingNumber,users.FullName,brands.BrandName,vehicles.VehiclesTitle,booking.Mobile,users.EmailId,vehicles.PricePerDay,booking.FromDate,booking.ReturnDate,booking.License,booking.VehicleId as vid,booking.Status,booking.PostingDate,booking.id  from booking join vehicles on vehicles.id=booking.VehicleId join users on users.EmailId=booking.userEmail join brands on vehicles.VehiclesBrand=brands.id  ";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {
                                                            $fromDate = new DateTime($result->FromDate);
                                                            $returnDate = new DateTime($result->ReturnDate);
                                                            $interval = $fromDate->diff($returnDate);
                                                            $totalDays = $interval->days;
                                                            $totalCost = $totalDays * $result->PricePerDay;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo htmlentities($cnt); ?></td>
                                                                <td><?php echo htmlentities($result->BookingNumber); ?></td>
                                                                <td>
                                                                    <a href="edit-users.php?id=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->FullName); ?></a>
                                                                </td>
                                                                <td>
                                                                    <a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?>
                                                                        , <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
                                                                <td>+60<?php echo htmlentities($result->Mobile); ?></td>
                                                                <td><?php echo htmlentities($result->EmailId); ?></td>
                                                                <td><?php echo htmlentities($result->PricePerDay); ?></td>
                                                                <td><?php echo htmlentities($result->FromDate); ?></td>
                                                                <td><?php echo htmlentities($result->ReturnDate); ?></td>
                                                                <td>
<?php
if ($result->License) {
    $imagePath = "uploads/" . $result->License; // Update the path as needed

    // Debugging: Print the image path and URL
    echo "Image Path: $imagePath<br>";

    if (file_exists($imagePath)) {
        // Create a link to open the image in a new tab or window
        echo "<a href='$imagePath' target='_blank'>View Image</a>";
    } else {
        echo "Image Not Found: $imagePath"; // Debug the file path
    }
} else {
    echo "No License Image";
}
?>
</td>


                                                                <td><?php
                                                                    if ($result->Status == 0) {
                                                                        echo htmlentities('Not Confirmed yet');
                                                                    } else if ($result->Status == 1) {
                                                                        echo htmlentities('Confirmed');
                                                                    } else {
                                                                        echo htmlentities('Cancelled');
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo htmlentities($totalDays); ?></td>
                                                                <td><?php echo htmlentities($totalCost); ?></td>
                                                                <td><?php echo htmlentities($result->PostingDate); ?></td>
                                                                <td><a href="manage-bookings.php?aeid=<?php echo htmlentities($result->id); ?>"
                                                                       onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> /
                                                                    <a href="manage-bookings.php?eid=<?php echo htmlentities($result->id); ?>"
                                                                       onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a> /
                                                                    <a href="booking-details.php?bid=<?php echo htmlentities($result->id); ?>"> View</a> /
                                                                    <a href="print-booking-details.php?bid=<?php echo htmlentities($result->id); ?>"> Print</a> 
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $cnt++;
                                                        }
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<?php } ?>
