<?php
session_start();
include('includes/config.php');
error_reporting(0);

$sql = "SELECT vehicles.*, brands.BrandName FROM vehicles
        JOIN brands ON brands.id = vehicles.VehiclesBrand";
$query = $dbh->prepare($sql);
$query->execute();
$vehicles = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare_vehicles'])) {
    $selectedVehicleIDs = isset($_POST['compare']) ? $_POST['compare'] : array();

    if (count($selectedVehicleIDs) < 2) {
        echo '<h2>Please select at least two vehicles to compare.</h2>';
    } else {
        $comparisonData = array();
        foreach ($selectedVehicleIDs as $vehicleID) {
            foreach ($vehicles as $vehicle) {
                if ($vehicle['id'] == $vehicleID) {
                    $comparisonData[] = $vehicle;
                }
            }
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Ride Ease | Vehicle Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style1.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

<?php include('includes/colorswitcher.php'); ?>
<?php include('includes/header.php'); ?>

<section class="page-header compare_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Compare Vehicles</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Compare Vehicles</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="compare-page inner_pages" style="text-align: center;">
    <div class="container">
        <div class="vehicle-selection">
            <h2>Select Vehicles to Compare:</h2>
            <form method="post" action="compare-vehicles-details.php">
                <select multiple name="compare[]" style="height: 200px;">
                    <?php foreach ($vehicles as $vehicle) { ?>
                        <option value="<?= $vehicle['id'] ?>">
                            <?= $vehicle['BrandName'] ?> <?= $vehicle['VehiclesTitle'] ?>
                        </option>
                    <?php } ?>
                </select>
                <br/><br/><button type="submit" name="compare_vehicles" class="btn">Compare Selected Vehicles</button>
            </form>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>

<div id="back-top" class="back-top">
    <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
</div>

<?php include('includes/login.php'); ?>
<?php include('includes/registration.php'); ?>
<?php include('includes/forgotpassword.php'); ?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!-- bootstrap-slider-JS -->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!-- Slider-JS -->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
