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
        $sql = "UPDATE payment SET Status=:status WHERE id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Payment Successfully Cancelled";
    }

    if (isset($_REQUEST['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = 1;
        $sql = "UPDATE payment SET Status=:status WHERE id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Payment Successfully Confirmed";
    }
    ?>

    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ride Ease | Admin Manage Payment</title>

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
                                <h4 class="widget-title">Manage Payment</h4>
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
                                            <div class="panel-heading">Payment Info</div>
                                            <div class="panel-body">
                                                <table id="zctb"
                                                       class="display table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Booking ID</th>
                                                        <th>Payment Date</th>
                                                        <th>Amount (RM)</th>
                                                        <th>Payment Method</th>
                                                        <th>Receipt Path</th>
                                                        <th>Status</th>
                                                        <th>Posting Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Booking ID</th>
                                                        <th>Payment Date</th>
                                                        <th>Amount (RM)</th>
                                                        <th>Payment Method</th>
                                                        <th>Receipt Path</th>
                                                        <th>Status</th>
                                                        <th>Posting Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>

                                                    <?php
                                                    $sql = "SELECT * FROM payment"; // You may need to join this table with other related tables
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo htmlentities($cnt); ?></td>
                                                                <td><?php echo htmlentities($result->BookingId); ?></td>
                                                                <td><?php echo htmlentities($result->PaymentDate); ?></td>
                                                                <td><?php echo htmlentities($result->Amount); ?></td>
                                                                <td><?php echo htmlentities($result->PaymentMethod); ?></td>
                                                                <?php
        if ($result->PaymentMethod !== 'cash') {
            echo '<td><a href="view-receipt.php?path=' . htmlentities($result->ReceiptPath) . '" target="_blank">View Receipt</a></td>';
        } else {
            echo '<td>N/A</td>'; // Display "N/A" for cash payments
        }
        ?>
</td>


<td>
                                                                <?php
                                                                    if ($result->Status == 0) {
                                                                        echo htmlentities('Not Confirmed yet');
                                                                    } else if ($result->Status == 1) {
                                                                        echo htmlentities('Confirmed');
                                                                    } else {
                                                                        echo htmlentities('Cancelled');
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo htmlentities($result->PostingDate); ?></td>
                                                                <td><a href="manage-payment.php?aeid=<?php echo htmlentities($result->id); ?>"
                                                                       onclick="return confirm('Do you really want to Confirm this payment')"> Confirm</a> /
                                                                    <a href="manage-payment.php?eid=<?php echo htmlentities($result->id); ?>"
                                                                       onclick="return confirm('Do you really want to Cancel this payment')"> Cancel</a>
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
