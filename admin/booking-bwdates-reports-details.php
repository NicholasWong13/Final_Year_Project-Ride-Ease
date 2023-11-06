<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ride Ease || B/W Dates Booking Detail</title>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/Chart.min.css">
        
        <!-- build:css assets/css/app.min.css -->
        <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
        <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/core.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <!-- endbuild -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family>Raleway:400,500,600,700,800,900,300">
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
                                <h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                <?php
                                $fdate = $_POST['fromdate'];
                                $tdate = $_POST['todate'];
                                ?>
                                <h5 style="color: blue">Report from <?php echo $fdate ?> to <?php echo $tdate ?></h5>
                            </header>
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Vehicle</th>
                                            <th>From Date</th>
                                            <th>Return Date</th>
                                            <th>Price Per Day (RM)</th>
                                            <th>Total Amount (RM)</th>
                                            <th>Posting date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $sql = "SELECT users.FullName, brands.BrandName, vehicles.VehiclesTitle, booking.FromDate, booking.ReturnDate, booking.VehicleId as vid, vehicles.PricePerDay, booking.PostingDate, booking.id FROM booking 
                                        JOIN vehicles ON vehicles.id = booking.VehicleId 
                                        JOIN users ON users.EmailId = booking.userEmail 
                                        JOIN brands ON vehicles.VehiclesBrand = brands.id 
                                        WHERE DATE(booking.PostingDate) BETWEEN '$fdate' AND '$tdate'";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        $totalAmountEarned = 0; 
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                                $fromDate = strtotime($result->FromDate);
                                                $returnDate = strtotime($result->ReturnDate);
                                                $totalDays = ($returnDate - $fromDate) / (60 * 60 * 24);
                                                $pricePerDay = $result->PricePerDay;
                                                $totalCost = $totalDays * $pricePerDay;
                                                $totalAmountEarned += $totalCost; 
                                                
                                                $totalCosts[] = $totalCost;

                                                $postingDate = date('Y-m-d', strtotime($result->PostingDate));
                                                $dateLabels[] = $postingDate;

                                                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->FullName); ?></td>
                                                    <td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?>
                                                        <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
                                                    <td><?php echo htmlentities($result->FromDate); ?></td>
                                                    <td><?php echo htmlentities($result->ReturnDate); ?></td>
                                                    <td><?php echo number_format($pricePerDay, 2); ?></td>
                                                    <td><?php echo number_format($totalCost, 2); ?></td>
                                                    <td><?php echo htmlentities($result->PostingDate); ?></td>
                                                </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } ?>
                                        </tbody>
                                    </table>
                                    <br/><div>Total Amount Earned: <span style="color: red;">RM <?php echo number_format($totalAmountEarned, 2); ?></span></div>
                                    <div class="col-md-12">
                                    <canvas id="totalCostChart" width="400" height="200"></canvas>
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
    <script>
    var fdate = new Date("<?php echo $fdate; ?>");
    var tdate = new Date("<?php echo $tdate; ?>");

    var ctx = document.getElementById("totalCostChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', 
        data: {
            labels: <?php echo json_encode($dateLabels); ?>, 
            datasets: [
                {
                    label: 'Total Cost (RM)',
                    data: <?php echo json_encode($totalCosts); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Posting Date' 
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Cost (RM)'
                    }
                },
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Total Cost from ' + fdate.toDateString() + ' to ' + tdate.toDateString(),
                    position: 'top'
                }
            }
        }
    });
</script>
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
