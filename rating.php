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
  <title>Ride Ease | Rating </title>
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  
  <body>

  <?php include('includes/colorswitcher.php');?>
        
  <?php include('includes/header.php');?>

  <section class="page-header rating_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Rating</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Rating</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">
<div class="rate">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1"></label>
    </div>
</div>
    <div class="overall-rating">
        (Average Rating <span id="avgrat">0</span>
        Based on <span id="totalrat">0</span> Rating)</span>
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
  <script src="assets/js/rating.js"></script> 
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
