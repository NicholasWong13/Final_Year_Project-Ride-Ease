<?php 
  session_start();
  include('includes/config.php');
  error_reporting(0);
?>
<?php
// Calculate the total number of cars
$carsPerPage = 10;

$sqlTotalCars = "SELECT COUNT(*) as total FROM vehicles";
$queryTotalCars = $dbh->prepare($sqlTotalCars);
$queryTotalCars->execute();
$totalCars = $queryTotalCars->fetch(PDO::FETCH_ASSOC)['total'];

// Calculate the total number of pages
$totalPages = ceil($totalCars / $carsPerPage);

// Determine the current page
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Ensure that $currentPage is within valid bounds
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Calculate the offset for the database query
$offset = ($currentPage - 1) * $carsPerPage;

// Fetch car data for the current page
$sql = "SELECT vehicles.*, brands.BrandName, brands.id AS bid 
        FROM vehicles
        JOIN brands ON brands.id = vehicles.VehiclesBrand
        LIMIT $offset, $carsPerPage";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>
  <!DOCTYPE HTML>
  <html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Ride Ease | Car Listing</title>
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
          
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  </head>
  <body>

<?php include('includes/colorswitcher.php');?>

<?php include('includes/header.php');?>

<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Car Listing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Car Listing</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="listing-page">
  <div class="container">
    <div class="row">
    <div class="col-md-9 col-md-push-3">
      
  <?php 
  $sql = "SELECT vehicles.*,brands.BrandName,brands.id as bid  from vehicles join brands on brands.id=vehicles.VehiclesBrand";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="assets/images/vehicle-images/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
            <p class="list-price">RM<?php echo htmlentities($result->PricePerDay);?> Per Day</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> model</li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
              <li><i class="fa fa-tachometer" aria-hidden="true"></i><?php echo htmlentities($result->Mileage);?></li>
            </ul>
            <ul>
            <a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

          </ul>
          </div>
        </div>
      <?php }} ?>
      <div class="pagination">
  <ul>
    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
      <li <?php if ($i == $currentPage) echo 'class="current"'; ?>>
        <a href="car-listing.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php } ?>
  </ul>
</div>


         </div>
      
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Car </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand">
                  <option>Select Brand</option>

  <?php 
  $sql = "SELECT * from  brands ";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {       ?>  
  <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
  <?php }} ?>
                 
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" name="fueltype">
                  <option>Select Fuel Type</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Electric">Electric</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
  <?php 
  $sql = "SELECT vehicles.*,brands.BrandName,brands.id as bid  from vehicles join brands on brands.id=vehicles.VehiclesBrand order by id desc limit 4";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>

              <li class="gray-bg">
                <div class="recent_post_img"> <a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="assets/images/vehicle-images/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                <div class="recent_post_title"> <a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a>
                  <p class="widget_price">RM<?php echo htmlentities($result->PricePerDay);?> Per Day</p>
                </div>
              </li>
              <?php }} ?>
              
            </ul>
          </div>
        </div>
      </aside> 
    </div>
  </div>
</section>

<section class="brand-section gray-bg">
  <div class="container">
    <div class="brand-hadding">
      <h5>Popular Brands</h5>
    </div>
    <div class="brand-logo-list">
      <div id="popular_brands">
        <div><a href="#"><img src="assets/images/brand-logo-1.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-2.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-3.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-4.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-5.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-6.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-7.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-8.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-9.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-10.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-11.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-12.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-13.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-14.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-15.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-16.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-17.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-18.png" class="img-responsive" alt="image"></a></div>
        <div><a href="#"><img src="assets/images/brand-logo-19.png" class="img-responsive" alt="image"></a></div>
      </div>
    </div>
  </div>
</section>


  <?php include('includes/footer.php');?>

  <div id="back-top" class="back-top"> 
    <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> 
  </div>

  <?php include('includes/login.php');?>

  <?php include('includes/registration.php');?>

  <?php include('includes/forgotpassword.php');?>

  <!-- Scripts --> 
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script> 
  <script src="assets/js/interface.js"></script> 
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS--> 
  <script src="assets/js/bootstrap-slider.min.js"></script> 
  <!--Slider-JS--> 
  <script src="assets/js/slick.min.js"></script> 
  <script src="assets/js/owl.carousel.min.js"></script>

  </body>
  </html>
