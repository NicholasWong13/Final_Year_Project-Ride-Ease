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
  <title>Ride Ease | Careers </title>
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
        <h1>Careers</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Careers</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2>Career <span> Opportunities</span></h2>
      <p>Are you ready to explore opportunities to take your career to the next level? Join us!</p>
    </div>
    <div class="row">
  <button class="accordion">Web Development and Design</button>
  <div class="panel">
  <li><b>Front-end Developer</b>: Responsible for creating the user interface and ensuring a seamless user experience on the website.</li>
  <li><b>Back-end Developer</b>: Focuses on server-side development, database management, and ensuring the website's functionality.</li>
  <li><b>Full-stack Developer</b>: Works on both front-end and back-end development, creating and maintaining the entire web application.</li>
  </div>
  <button class="accordion">Digital Marketing</button>
  <div class="panel">
  <li><b>Digital Marketing Specialist</b>: Manages online advertising campaigns, SEO, content marketing, and social media marketing to attract customers.</li>
  <li><b>Data Analyst</b>: Analyzes customer behavior and website data to make informed marketing decisions.</li>
  </div>
  <button class="accordion">Customer Service and Support</button>
  <div class="panel">
  <li><b>Customer Service Representative</b>: Provides assistance to customers, resolves issues, and ensures a positive experience.</li>
  <li><b>Customer Support Manager</b>: Leads and manages a team of customer service representatives.</li>
  </div>
  <button class="accordion">Operations and Logistics</button>
  <div class="panel">
  <li><b>Fleet Manager</b>: Manages the rental car fleet, including maintenance, scheduling, and procurement.</li>
  <li><b>Operations Manager</b>: Oversees day-to-day operations, ensuring smooth processes for rental transactions and customer service.</li>
  </div>
  <button class="accordion">Legal and Compliance</button>
  <div class="panel">
  <li><b>Legal Counsel</b>: Ensures the company's operations adhere to all relevant laws and regulations, including contracts and agreements.</li>
  </div>
    </div>
    <div class="div_zindex white-text text-center">
    <a href="mailto:hr@rideease.com" class="btn" align-items="center">Join Us Now !</a></h2>
    </div>
  </div>
</section>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

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