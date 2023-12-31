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

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
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

<section class="compare-page inner_pages">
    <div class="container">
        <div class="compare_info">
            <?php
            if (isset($comparisonData)) {
                echo '<h4>Comparison Results:</h4>';
                echo '<div class="compare_product_img">';
                echo '<ul style="list-style-type: none; padding: 0; margin: 0; text-align: center;">';

                foreach ($comparisonData as $vehicle) {
                    echo '<li style="display: inline-block; margin-right: 20px;">';
                    echo '<img style="width: 300px; border: 2px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" src="assets/images/vehicle-images/' . htmlentities($vehicle['Vimage1']) . '" alt="' . htmlentities($vehicle['VehiclesTitle']) . '"><br/></br>';
                    echo '</li>';
                }

                echo '</ul>';
                echo '</div>';

                echo '<form method="post">';
                echo '<table>';
                echo '<tr>';
                echo '<br/>';
                echo '<th>Brand</th>';
                echo '<th>Vehicle Name</th>';
                echo '<th>Price/Day</th>';
                echo '<th>Seating Capacity</th>';
                echo '<th>Fuel Type</th>';
                echo '<th>Reg.Year</th>';
                echo '</tr>';

                foreach ($comparisonData as $vehicle) {
                    echo '<tr>';
                    echo '<td>' . htmlentities($vehicle['BrandName']) . '</td>';
                    echo '<td>' . htmlentities($vehicle['VehiclesTitle']) . '</td>';
                    echo '<td>RM ' . htmlentities($vehicle['PricePerDay']) . '</td>';
                    echo '<td>' . htmlentities($vehicle['SeatingCapacity']) . '</td>';
                    echo '<td>' . htmlentities($vehicle['FuelType']) . '</td>';
                    echo '<td>' . htmlentities($vehicle['ModelYear']) . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '<center><button type="submit" name="compare_vehicles" class="btn">Compare Again</button></center>';
                echo '</form>';
            }
            ?>
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
