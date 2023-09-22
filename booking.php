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
  <title>Ride Ease | Booking </title>
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

<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Booking Form</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Booking Form</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="booking section-padding">
<div class="bookingform">
  <form action="submit_booking_form.php" method="post">
    <div class="col-50">
      <label class="control-label">Full Name</label>
      <input type="text" id="fullname" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text" required/>
    </div>
    <div class="col-50">
    <label class="control-label">Email Address</label> 
    <input class="text" id="emailid" name="emailid" type="text" required/>
    </div>
    <div class="col-50">
    <label class="control-label">Mobile Number</label>
    <input type="number" id="mobile" name="mobile" required />
    </div>
    <div class="col-50">
    <label class="control-label">No of Passenger</label>
    <input type="number" id="no_of_passenger" name="no_of_passenger" placeholder="No Of Passenger" />
    </div>
    <div class="col-50">
    <label class="control-label">From Date</label>
      <input type="datetime-local" id="from_date" name="from_date" />
    </div>
   <div class="col-50">
    <label class="control-label">Return Date</label>
      <input type="datetime-local" id="return_date" name="return_date" />
    </div>
    <input type="submit" value="Submit" class="btn">
  </form>
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
<script src="assets/js/validation.js"></script>
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