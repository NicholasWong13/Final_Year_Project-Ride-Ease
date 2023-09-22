<?php 
  session_start();
  include('includes/config.php');
  error_reporting(0);
?> 

<!DOCTYPE HTML>
  <html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Ride Ease | Compare Vehicle </title>
  <!--Bootstrap -->
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

<?php include('includes/colorswitcher.php');?>

<?php include('includes/header.php');?>

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

<section id="filter_form" class="inner-filter gray-bg">
  <div class="container">
    <h3>Find Your Dream Car <span>(Easy Search From Here)</span></h3>
    <div class="row">
      <form action="search-carresult.php" method="post">
        <div class="form-group select col-md-3 col-sm-6 black_input">
        <div class="select">
                <select class="form-control" name="brand">
                  <option>Select Brand</option>

  <?php $sql = "SELECT * from  brands ";
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
  </div>
        <div class="form-group col-md-3 col-sm-6">
                <select class="form-control">
                  <option>Select Fuel Type</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Electric">Electric</option>
                </select>
          </div>
        <div class="form-group col-md-3 col-sm-6">
          <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car </button>
        </div>
      </form>
    </div>
  </div>
</section>

<section class="compare-page inner_pages">
  <div class="container">
    <div class="compare_info">
      <h4>Compare (Car Name 1) and (Car Name 2) and (Car Name 3)</h4>
      <div class="compare_product_img">
        <div class="inventory_info_list">
          <ul>
            <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
            <li><a href="#"><img src="assets/images/600x380.jpg" alt="image"></a></li>
            <li><a href="#"><img src="assets/images/600x380.jpg" alt="image"></a></li>
            <li><a href="#"><img src="assets/images/600x380.jpg" alt="image"></a></li>
          </ul>
        </div>
        
      </div>
      <div class="compare_product_title gray-bg">
        <div class="inventory_info_list">
          <ul>
            <li class="listing_heading">Compare <br>
              Inventorys <span class="td_divider"></span></li>
            <li><a href="#">Car Name</a>
              <p class="price">$90,000</p>
              <span class="vs">V/s</span></li>
            <li><a href="#">Car Name</a>
              <p class="price">$85,000</p>
              <span class="vs">V/s</span></li>
            <li><a href="#">Car Name</a>
              <p class="price">$75,000</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="compare_product_info"> 
        <div class="inventory_info_list">
          <div class="listing_heading">
            <div>BASIC INFO</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
          </div>
          <ul>
            <li class="info_heading">
              <div>Model Year</div>
              <div>No. of Owners</div>
              <div>KMs Driven</div>
              <div>Fuel Type</div>
            </li>
            <li>
              <div>2010</div>
              <div>4</div>
              <div>30,000</div>
              <div>Diesel</div>
            </li>
            <li>
              <div>2005</div>
              <div>2</div>
              <div>55,000</div>
              <div>Diesel</div>
            </li>
            <li>
              <div>2010</div>
              <div>1</div>
              <div>95,000</div>
              <div>Diesel</div>
            </li>
          </ul>
        </div>
        
        <!--Technical-Specification-Table-->
        <div class="inventory_info_list">
          <div class="listing_heading">
            <div>Technical Specification</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
          </div>
          <ul>
            <li class="info_heading">
              <div>Engine Type</div>
              <div>Engine Description</div>
              <div>No. of Cylinders</div>
              <div>Mileage-City</div>
              <div>Mileage-Highway</div>
              <div>Fuel Tank Capacity</div>
              <div>Seating Capacity</div>
              <div>Transmission Type</div>
            </li>
            <li>
              <div>TDCI Diesel Engine</div>
              <div>1.5KW</div>
              <div>4</div>
              <div>22.4kmpl</div>
              <div>25.83kmpl</div>
              <div>40 (Liters)</div>
              <div>5</div>
              <div>Manual</div>
            </li>
            <li>
              <div>TDCI Diesel Engine</div>
              <div>1.9KW</div>
              <div>5</div>
              <div>32.4kmpl</div>
              <div>48.83kmpl</div>
              <div>60 (Liters)</div>
              <div>5</div>
              <div>Automatic</div>
            </li>
            <li>
              <div>TDCI Diesel Engine</div>
              <div>1.6KW</div>
              <div>6</div>
              <div>21.4kmpl</div>
              <div>28.83kmpl</div>
              <div>42 (Liters)</div>
              <div>6</div>
              <div>Manual</div>
            </li>
          </ul>
        </div>
        
        <!--Accessories-->
        <div class="inventory_info_list">
          <div class="listing_heading">
            <div>Accessories</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
          </div>
          <ul>
            <li class="info_heading">
              <div>Air Conditioner</div>
              <div>AntiLock Braking System</div>
              <div>Power Steering</div>
              <div>Power Windows</div>
              <div>CD Player</div>
              <div>Leather Seats</div>
              <div>Central Locking</div>
              <div>Power Door Locks</div>
              <div>Brake Assist</div>
              <div>Driver Airbag</div>
              <div>Passenger Airbag</div>
              <div>Crash Sensor</div>
              <div>Engine Check Warning</div>
              <div>Automatic Headlamps</div>
            </li>
            <li>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
            </li>
            <li>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-close" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
            </li>
            <li>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-close" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-close" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-close" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
              <div><i class="fa fa-check" aria-hidden="true"></i></div>
            </li>
          </ul>
        </div>
        <div class="inventory_info_list text-center">
          <ul>
            <li>&nbsp;</li>
            <li><a href="#" class="btn">View Detail</a></li>
            <li><a href="#" class="btn">View Detail</a></li>
            <li><a href="#" class="btn">View Detail</a></li>
          </ul>
        </div>
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
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>