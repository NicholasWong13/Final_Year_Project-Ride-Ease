<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $userData = array();
    $sql = "SELECT DATE_FORMAT(RegDate, '%Y-%m') AS Month, COUNT(*) AS UserCount FROM users GROUP BY Month";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $row) {
        $userData['labels'][] = $row['Month'];
        $userData['data'][] = (int) $row['UserCount'];
    }
    
    
    $totalUsers = array_sum($userData['data']);

     $bookingsData = array();
     $sqlBookings = "SELECT MONTH(FromDate) AS Month, COUNT(*) AS BookingCount FROM booking GROUP BY MONTH(FromDate)";
     $queryBookings = $dbh->prepare($sqlBookings);
     $queryBookings->execute();
     $resultsBookings = $queryBookings->fetchAll(PDO::FETCH_ASSOC);
 
     foreach ($resultsBookings as $row) {
         $bookingsData['labels'][] = date("F", mktime(0, 0, 0, $row['Month'], 1));
         $bookingsData['data'][] = (int) $row['BookingCount'];
     }

    $totalBookings = array_sum($bookingsData['data']);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Ride Ease | Admin Analytics</title>

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
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <h2 class="page-title">Analytics</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Users Analytics</div>
                            <div class="panel-body">
                                <canvas id="usersChart" width="400" height="200"></canvas>
                                <p style="color: blue">Total Users: <span style="color: red;"><?php echo $totalUsers; ?></span></p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Bookings Analytics</div>
                            <div class="panel-body">
                                <canvas id="bookingsChart" width="400" height="200"></canvas>
                                <p style="color: blue">Total Bookings: <span style="color: red;"><?php echo $totalBookings; ?></span></p> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include_once('includes/footer.php'); ?>
    </main>

    <script>
    var userData = <?php echo json_encode($userData); ?>;
    var ctxUser = document.getElementById("usersChart").getContext('2d');
    var userChart = new Chart(ctxUser, {
    type: 'bar',
    data: {
        labels: userData.labels, 
        datasets: [
            {
                label: 'Number of Users',
                data: userData.data,
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false, 
                stepSize: 1, 
                min: 0, 
                title: {
                    display: true,
                    text: 'Number of Users'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Registration Month (Year-Month)'
                }
            }
        }
    }
});

    var bookingsData = <?php echo json_encode($bookingsData); ?>;
    var ctxBookings = document.getElementById('bookingsChart').getContext('2d');
    var bookingsChart = new Chart(ctxBookings, {
    type: 'bar',
    data: {
        labels: bookingsData.labels,
        datasets: [
            {
                label: 'Number of Bookings',
                data: bookingsData.data,
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false, 
                stepSize: 1, 
                min: 0, 
                title: {
                    display: true,
                    text: 'Number of Bookings'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
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
<?php }?>