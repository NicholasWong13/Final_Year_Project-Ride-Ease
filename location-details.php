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
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Ride Ease | Location Details</title>
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

<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Location Details</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Location Details</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay">
  </div>
</section>

<section class="dealer_profile inner_pages">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-4">
        <div class="dealer_logo"> <img src="assets/images/222x172.jpg" alt="image"> </div>
      </div>
      <div class="col-md-6 col-sm-5 col-xs-8">
        <div class="dealer_info">
          <h4>Ride Ease - <?php echo htmlentities($result->LocationName);?> Branch</h4>
          <p>P.1225 N Broadway Ave <br>
            Oklahoma City, OK  1234-5678-090</p>
          <ul class="dealer_social_links">
            <li class="facebook-icon"><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li class="twitter-icon"><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li class="linkedin-icon"><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            <li class="google-plus-icon"><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="dealer_contact_info gray-bg">
          <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</h6>
          <a href="mailto:contact@example.com">penang@rideease.com</a> </div>
        <div class="dealer_contact_info gray-bg">
          <h6><i class="fa fa-phone" aria-hidden="true"></i> Phone Number</h6>
          <a href="tel:61-1234-5678-09">+61-1234-5678-09</a> </div>
      </div>
    </div>
    <div class="space-60"></div>
    <div class="row">
      <div class="col-md-9">
        <div class="dealer_more_info">
          <h5 class="gray-bg info_title"> About <?php echo htmlentities($result->LocationName);?></h5>
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
          <div class="dealer_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361315.424069386!2d-113.75658747371207!3d36.241096924675375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1483614660041" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          
          <div class="comment_form">
            <h6>Leave a Comment</h6>
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group">
                <textarea rows="5" class="form-control" placeholder="Comments"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn" value="Submit Comment">
              </div>
            </form>
          </div>
        </div>
      </div>
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i> Message to Branch</h5>
          </div>
          <form action="#">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-block">
            </div>
          </form>
        </div>
      </aside>
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