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
  <title>Ride Ease | Pricing </title>

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

<section class="page-header services_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Pricing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Pricing</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
  </section>

<div class="col-md-4">
    <div class="insurance-package">
        <h2>Basic Coverage</h2>
        <div class="price">
            <span class="currency">RM</span>
            <span class="amount">29</span>
        </div>
        <ul class="features">
            <li>Liability Insurance</li>
            <li>Basic Coverage</li>
            <li>Single Driver</li>
            <li>Rental Car Protection</li>
        </ul>
        <a href="#loginform" class="btn">Get Coverage</a>
    </div>
</div>

<!-- Premium Insurance Package -->
<div class="col-md-4">
    <div class="insurance-package">
        <h2>Premium Coverage</h2>
        <div class="price">
            <span class="currency">RM</span>
            <span class="amount">59</span>
        </div>
        <ul class="features">
            <li>Comprehensive Insurance</li>
            <li>Enhanced Coverage</li>
            <li>Multiple Drivers</li>
            <li>Roadside Assistance</li>
        </ul>
        <a href="#loginform" class="btn">Get Coverage</a>
    </div>
</div>

<!-- Ultimate Insurance Package -->
<div class="col-md-4">
    <div class="insurance-package">
        <h2>Ultimate Coverage</h2>
        <div class="price">
            <span class="currency">RM</span>
            <span class="amount">99</span>
        </div>
        <ul class="features">
            <li>Full Coverage Insurance</li>
            <li>Premium Coverage</li>
            <li>Family Plan</li>
            <li>24/7 Customer Support</li>
        </ul>
        <a href="#loginform" class="btn">Get Coverage</a>
    </div>
</div>


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