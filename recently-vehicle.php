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
  <title>Ride Ease | Recently Listed Vehicle</title>

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

<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Recently Listed Vehicle</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Recently Listed Vehicle</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="section-padding gray-bg">
  <div class="container">
      
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Recently Listed Cars</a></li>
        </ul>
      </div>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">
  <?php 
  $sql = "SELECT vehicles.*,brands.BrandName,brands.id as bid  from vehicles join brands on brands.id=vehicles.VehiclesBrand order by id desc limit 3";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>">
<img src="assets/images/vehicle-images/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehicle-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<span class="price">RM<?php echo htmlentities($result->PricePerDay);?> /Day</span> 
</div>
<div class="inventory_info_m" text-align="justify">
<p><?php echo substr($result->VehiclesOverview,0,1000);?></p>
</div>
</div>
</div>
<?php }}?>
       
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
<!--Bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
