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
  <title>Ride Ease | Home Page</title>

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

<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Find the right car for you.</h1>
            <p>We have more than a thousand cars for you to choose. </p>
            <a href="vehicle-listing.php" class="btn">Available Cars <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section><br/><br/><br/>

<section id="filter_form2">
  <div class="container">
    <div class="main_bg white-text">
      <h3>Find Your Dream Car</h3>
      <div class="row">
        <form action="search-vehicleresult.php" method="post">
          <div class="form-group col-md-4 col-sm-8">
            <div class="select">
              <select class="form-control" name="brand">
                <option>Select Brand</option>
                <?php
                $sql = "SELECT * from brands";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                ?>
                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group col-md-4 col-sm-8">
            <div class="form-group select">
              <select class="form-control" name="fueltype">
                <option>Select Fuel Type</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-3 col-sm-6">
            <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>Car For You</span></h2>
      <p>Welcome to Ride Ease. We are the best car rental in Malaysia. We have done our best to ensure car quality, affordable prices and great discounts.</p>
    </div>
    <div class="row"> 
      
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
<img src="assets/images/vehicle-images/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image">
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
</div>
</div>
<?php }}?>
       
      </div>
    </div>
  </div>
</section>

<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>5</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>2000+</h2>
            <p>Total Cars</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>3000+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-code-branch" aria-hidden="true"></i>14</h2>
            <p>Total Branches</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-overlay">
  </div>
</section>

<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
      <p>"Get closer than ever to your customers. So close that you tell them what they need well before they realize it themselves." </p>
    </div>
    <div class="row">
      <div id="testimonial-slider">
  <?php 
  $tid=1;
  $sql = "SELECT testimonial.Testimonial,users.UserName from testimonial join users on testimonial.UserEmail=users.EmailId where testimonial.status=:tid";
  $query = $dbh -> prepare($sql);
  $query->bindParam(':tid',$tid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>

        <div class="testimonial-m">
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->UserName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
  
      </div>
    </div>
  </div>
  <div class="dark-overlay">
  </div>
</section>

<section id="help" class="section-padding">
	<div class="container">
    	<div class="div_zindex white-text text-center">
            <h2>Need Help ?<br/><br/>
            <a href="contact-us.php" class="btn">Contact Us</a></h2>
        </div>
    </div>
    <div class="dark-overlay">
    </div>
</section>


<?php include('includes/footer.php');?>

<div id="back-top" class="back-top"> 
  <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> 
</div>

<?php include('includes/login.php');?>

<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>

<script>
$(document).ready(function() {
    // Function to track a click for a vehicle
    function trackClick(vehicleId) {
        $.ajax({
            type: "POST",
            url: "track_click.php",
            data: { vehicleId: vehicleId },
            success: function(data) {
                // Reload the vehicle list after tracking a click
                loadVehicleList();
            }
        });
    }

    // Function to load the vehicle list
    function loadVehicleList() {
        $.ajax({
            type: "GET",
            url: "get_most_clicked.php",
            dataType: "json",
            success: function(data) {
                var vehicleList = $("#vehicleList");
                vehicleList.empty();

                $.each(data, function(index, vehicle) {
                    var listItem = $("<li>");
                    listItem.html(
                        '<a href="#" onclick="trackClick(' + vehicle.id + ');">' +
                        vehicle.BrandName + ' ' + vehicle.VehicleName +
                        '</a>'
                    );
                    vehicleList.append(listItem);
                });
            }
        });
    }

    // Initial load of the vehicle list
    loadVehicleList();
});
</script>
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
