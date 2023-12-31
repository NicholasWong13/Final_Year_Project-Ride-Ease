<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $msg = "";
    $search = "";

    if (isset($_GET['search'])) {
        $search = $_GET['search'];

        // Construct the SQL query to search for vehicles by VehiclesTitle
        $sql = "SELECT brands.BrandName, vehicles.VehiclesTitle, vehicles.RegNo, vehicles.PricePerDay, vehicles.FuelType, vehicles.ModelYear, vehicles.id
                FROM vehicles
                JOIN brands ON brands.id = vehicles.VehiclesBrand
                WHERE vehicles.VehiclesTitle LIKE :search";

        // Prepare the SQL query
        $query = $dbh->prepare($sql);

        // Bind the search parameter with the wildcard for partial matching
        $query->bindParam(':search', '%' . $search . '%', PDO::PARAM_STR);

        // Execute the SQL query
        $query->execute();

        // Fetch the results as objects
        $results = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        // If no search criteria is provided, retrieve all records
        $sql = "SELECT brands.BrandName, vehicles.VehiclesTitle, vehicles.RegNo, vehicles.PricePerDay, vehicles.FuelType, vehicles.ModelYear, vehicles.id
                FROM vehicles
                JOIN brands ON brands.id = vehicles.VehiclesBrand";

        // Prepare the SQL query
        $query = $dbh->prepare($sql);

        // Execute the SQL query
        $query->execute();

        // Fetch the results as objects
        $results = $query->fetchAll(PDO::FETCH_OBJ);
    }
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Ride Ease | Manage Vehicles </title>

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
                                <h4 class="widget-title">Manage Vehicles</h4>
                            </header>
                            <form method="GET" action="manage-vehicles.php">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control" placeholder="Search here..." name="search"
                                        required="required" value="<?php echo htmlentities($search); ?>" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><span
                                                class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </form>
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <?php if ($error) { ?>
                                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                                    <?php } else if ($msg) { ?>
                                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                                    <?php } ?>
                                    <table
                                        class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Brand</th>
                                                <th>Vehicle Title</th>
                                                <th>Reg No.</th>
                                                <th>Price Per Day (MYR)</th>
                                                <th>Fuel Type</th>
                                                <th>Model Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Brand</th>
                                                <th>Vehicle Title</th>
                                                <th>Reg No.</th>
                                                <th>Price Per Day (MYR)</th>
                                                <th>Fuel Type</th>
                                                <th>Model Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
$cnt = 1;
foreach ($results as $result) {
    ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($result->BrandName); ?></td>
                                                <td><?php echo htmlentities($result->VehiclesTitle); ?></td>
                                                <td><?php echo htmlentities($result->RegNo); ?></td>
                                                <td><?php echo htmlentities($result->PricePerDay); ?></td>
                                                <td><?php echo htmlentities($result->FuelType); ?></td>
                                                <td><?php echo htmlentities($result->ModelYear); ?></td>
                                                <td><a href="edit-vehicle.php?id=<?php echo $result->id; ?>"><i
                                                        class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a href="manage-vehicles.php?del=<?php echo $result->id; ?>"
                                                        onclick="return confirm('Do you want to delete');"><i
                                                            class="fa fa-close"></i></a></td>
                                            </tr>
                                            <?php
    $cnt = $cnt + 1;
}
    ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
<?php } ?>
