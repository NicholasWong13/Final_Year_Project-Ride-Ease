<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <a href="index.php"><img src="assets/images/logo.png" width="50" height="75" alt="logo"/></a> 
        <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Mail Us : </p>
              <a href="mailto:info@rideease.com">info@rideease.com</a> 
              <a href="mailto:support@rideease.com">support@rideease.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Call Us : </p>
              <a href="tel:6018888222">+6018 888 2222</a> <br>
              <a href="tel:6018888222">+6019 888 2222</a> </div>
              <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Locate Us (Head Office) : </p>
              <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.904025007885!2d100.31036697961282!3d5.43154732085301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac307f105d4d7%3A0x2d3bda55d253024f!2s48%2C%20Jalan%20Kelawai%2C%20George%20Town%2C%2010250%20George%20Town%2C%20Pulau%20Pinang!5e0!3m2!1sen!2smy!4v1691075649104!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>48, Jalan Kelawai,<br>10250 GeorgeTown</a> </div>
  
              <meta namespace="referrer" content="no-referrer-when-downgrade">
              <!--Start of Tawk.to Script-->
              <script type="text/javascript">
              var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
              (function(){
              var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
              s1.async=true;
              s1.src='https://embed.tawk.to/6535feefa84dd54dc4840aa7/1hddenmlc';
              s1.charset='UTF-8';
              s1.setAttribute('crossorigin','*');
              s0.parentNode.insertBefore(s1,s0);
              })();
              </script>
              <!--End of Tawk.to Script-->

  <?php   
  if(strlen($_SESSION['login'])==0)
	{	
  ?>
  <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
  <?php }
  else{ 

  echo "Welcome To Ride Ease";
  } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
    
    <?php 
    $email=$_SESSION['login'];
    $sql ="SELECT FullName FROM users WHERE EmailId=:email ";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
      {

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
            <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
            <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <!--
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>-->
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <ul class="nav navbar-nav">
          <li class="dropdown"><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Discover Ride Ease</a>
          	 <ul class="dropdown-menu">
              <li><a href="about-us.php">About Us</a></li>
              <li><a href="location.php">Location List</a></li>
              <li><a href="careers.php">Careers</a></li>
            </ul>
          </li>
        <ul class="nav navbar-nav">
          <li class="dropdown"><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">What We Offer</a>
          	 <ul class="dropdown-menu">
              <li><a href="services.php">Services</a></li>
              <li><a href="pricing.php">Pricing</a></li>
              <li><a href="promotion.php">Promotion</a></li>
            </ul>
          </li>
          <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li class="dropdown"><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vehicles</a>
          	 <ul class="dropdown-menu">
              <li><a href="car-listing.php">Car Listing</a></li>
              <li><a href="compare-vehicle.php">Compare Vehicles</a></li>
              <li><a href="recently-vehicle.php">Recently Listed Vehicles</a></li>
            </ul>
          </li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <ul class="nav navbar-nav">
          <li class="dropdown"><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Support</a>
          	 <ul class="dropdown-menu">
              <li><a href="faq.php">F.A.Q.</a></li>
              <li><a href="page.php?type=terms">Terms & Conditions</a></li>
              <li><a href="page.php?type=privacy">Privacy Policy</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> 
  
</header>