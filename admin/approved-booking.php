<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Ride Ease | Approved Booking Detail</title>
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
                                    <h4 class="widget-title">Approved Bookings</h4>
                                </header>
                                <hr class="widget-separator">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Booking Number</th>
                                                    <th>Vehicle</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>From Date</th>
                                                    <th>Return Date</th>
                                                    <th>Price/Day</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $status = 1;
                                                $sql = "SELECT users.FullName, brands.BrandName, vehicles.VehiclesTitle, booking.Mobile, users.EmailId, booking.FromDate, booking.ReturnDate, booking.VehicleId as vid, booking.Status, booking.PostingDate, booking.id, booking.BookingNumber  
                                                        FROM booking 
                                                        JOIN vehicles ON vehicles.id = booking.VehicleId 
                                                        JOIN users ON users.EmailId = booking.userEmail 
                                                        JOIN brands ON vehicles.VehiclesBrand = brands.id 
                                                        WHERE booking.Status = :status";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':status', $status, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><a href="edit-users.php?id=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->FullName); ?></a></td>
                                                            <td><?php echo htmlentities($result->BookingNumber); ?></td>
                                                            <td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
                                                            <td>+60<?php echo htmlentities($result->Mobile); ?></td>
                                                            <td><?php echo htmlentities($result->EmailId); ?></td>
                                                            <td><?php echo htmlentities($result->FromDate); ?></td>
                                                            <td><?php echo htmlentities($result->ReturnDate); ?></td>
                                                            <td><?php 
                                                                if ($result->Status == 0) {
                                                                    echo htmlentities('Not Confirmed yet');
                                                                } else if ($result->Status == 1) {
                                                                    echo htmlentities('Confirmed');
                                                                } else {
                                                                    echo htmlentities('Cancelled');
                                                                }
                                                            ?></td>
                                                            <td><a href="booking-details.php?bid=<?php echo htmlentities($result->id); ?>">View</a></td>
                                                        </tr>
                                                        <?php
                                                        $cnt++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Booking Number</th>
                                                    <th>Vehicle</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>From Date</th>
                                                    <th>Return Date</th>
                                                    <th>Price/Day</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include_once('includes/footer.php');?>
        </main>
        <?php include_once('includes/customizer.php');?>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>
    </body>
    </html>
<?php } ?>
