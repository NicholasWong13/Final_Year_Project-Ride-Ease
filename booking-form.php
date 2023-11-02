<?php
session_start();
include('includes/config.php');
error_reporting(0);

// After processing the booking form, set the bookingID in the session
$_SESSION['bookingID'] = $bookingID;

// Generate a unique booking number
$uniqueBookingNumber = generateUniqueBookingNumber();

function generateUniqueBookingNumber() {
    global $dbh;

    // Define a prefix for your booking numbers
    $prefix = 'RE'; // You can change this prefix as needed

    $isUnique = false;
    $bookingNumber = '';

    // Loop until a unique booking number is generated
    while (!$isUnique) {
        // Generate a random 6-digit number
        $randomPart = mt_rand(100000, 999999);

        // Combine the prefix and random part to create the booking number
        $bookingNumber = $prefix . $randomPart;

        // Check if the booking number is unique
        $checkSql = "SELECT id FROM booking WHERE BookingNumber = :bookingNumber";
        $query = $dbh->prepare($checkSql);
        $query->bindParam(':bookingNumber', $bookingNumber, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() === 0) {
            // Booking number is unique
            $isUnique = true;
        }
    }

    return $bookingNumber;
}
// Fetch the price per day based on the selected vehicle ID
if (isset($_GET['vhid'])) {
  $vhid = $_GET['vhid'];
  $pricePerDay = getVehiclePricePerDay($vhid);
} else {
  // Handle the case where 'vhid' is not set.
  // You can redirect the user to an error page or perform other actions.
}

// Function to get the price per day for a vehicle
function getVehiclePricePerDay($vhid) {
  global $dbh;
  $sql = "SELECT PricePerDay FROM vehicles WHERE id = :vhid"; // Replace 'vehicles' with your actual table name
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_INT);
  $query->execute();

  if ($query->rowCount() > 0) {
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result['PricePerDay'];
  }

}

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $mobile = $_POST['mobile'];
  $age = $_POST['age'];
  $passenger = $_POST['no_of_passenger'];
  $fromdate = $_POST['fromdate'];
  // Combine the selected hours and minutes for FromTime
  $fromtime = $_POST['fromhour'] . ":" . $_POST['fromminute'] . ":00";
  
  $returndate = $_POST['returndate'];
  
  // Combine the selected hours and minutes for ReturnTime
  $returntime = $_POST['returnhour'] . ":" . $_POST['returnminute'] . ":00";

  $uploadDirectory = 'uploads/';  // Directory where you want to store uploaded files
  $licenseTempFile = $_FILES['license']['tmp_name'];
  $licenseFileName = $_FILES['license']['name'];
  $licenseFileLocation = $uploadDirectory . $licenseFileName;

  // Move the uploaded file to the desired directory
  if (move_uploaded_file($licenseTempFile, $licenseFileLocation)) {
      // File upload was successful
  } else {
      // File upload failed
      echo "<script>alert('File upload failed. Please try again.');</script>";
  }
  
  $pickuplocation = $_POST['pickuplocation'];
  $returnlocation = $_POST['returnlocation'];
  $message = $_POST['message'];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];

  // Check if the user is at least 21 years old
  if ($age < 21) {
      echo "<script>alert('You must be at least 21 years old to book a vehicle.');</script>";
  } else {
      $checksql = "SELECT id FROM booking WHERE VehicleId = :vhid AND ((FromDate <= :returndate AND ReturnDate >= :fromdate) OR (FromDate <= :fromdate AND ReturnDate >= :returndate)) AND (status = 1 OR status = 0)";
      $query = $dbh->prepare($checksql);
      $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
      $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
      $query->bindParam(':returndate', $returndate, PDO::PARAM_STR);
      $query->execute();

      if ($query->rowCount() > 0) {
          echo "<script>alert('Booking schedule already taken; please choose another one.');</script>";
      } else {
          if ($returndate < $fromdate) {
              echo "<script>alert('Booking schedule is invalid. Please choose a sensible date.');</script>";
          } else {
              $sql = "INSERT INTO booking(BookingNumber, fullname, mobile, userEmail, age, passenger, VehicleId, FromDate, FromTime, ReturnDate, ReturnTime, License, PickupLocation, ReturnLocation, message, Status) VALUES(:bookingNumber, :fullname, :mobile, :useremail, :age, :passenger, :vhid, :fromdate, :fromtime, :returndate, :returntime, :license, :pickuplocation, :returnlocation, :message, :status)";
              $query = $dbh->prepare($sql);
              $query->bindParam(':bookingNumber', $uniqueBookingNumber, PDO::PARAM_STR);
              $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
              $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
              $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
              $query->bindParam(':age', $age, PDO::PARAM_STR);
              $query->bindParam(':passenger', $passenger, PDO::PARAM_STR);
              $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
              $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
              $query->bindParam(':fromtime', $fromtime, PDO::PARAM_STR);
              $query->bindParam(':returndate', $returndate, PDO::PARAM_STR);
              $query->bindParam(':returntime', $returntime, PDO::PARAM_STR);
              $query->bindParam(':license', $licenseFileLocation, PDO::PARAM_STR);
              $query->bindParam(':pickuplocation', $pickuplocation, PDO::PARAM_STR);
              $query->bindParam(':returnlocation', $returnlocation, PDO::PARAM_STR);
              $query->bindParam(':message', $message, PDO::PARAM_STR);
              $query->bindParam(':status', $status, PDO::PARAM_STR);
              $query->execute();
              $lastInsertId = $dbh->lastInsertId();

              if ($lastInsertId) {
                  $_SESSION['renter_notification_message'] = 'Another user has booked one of your vehicles';
                  // Redirect to the booking confirmation page without displaying the success message
                  header("Location: booking-confirmation.php?bookingNumber=$uniqueBookingNumber");
                  exit();
              } else {
                  echo "<script>alert('Something went wrong. Please try again');</script>";
              }
          }
      }
  }
}

?>

<!DOCTYPE HTML>
  <html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Ride Ease | Booking Form </title>

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
  

<section class="listing-detail">
  <div class="container">

  <form method="post" class="booking-form"  enctype="multipart/form-data">
        <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i> Book Now</h5>
          </div>
          <div class="form-group">
      <label class="control-label">Full Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" />
        </div>
    <div class="form-group">
    <label class="control-label">Mobile Number (Malaysian No)</label>
    <input type="number" class="form-control" id="mobile" name="mobile"  placeholder="Mobile Number" />
    </div>
    <div class="form-group">
    <label class="control-label">Age</label>
    <input type="number" class="form-control" id="age" name="age" placeholder="Age" />
    </div>
    <div class="form-group">
    <label class="control-label">No of Passenger</label>
    <input type="number" class="form-control" id="passenger" name="no_of_passenger" placeholder="No Of Passenger" />
    </div>
    <div class="form-group">
    <label class="control-label">Price per Day (MYR)</label>
    <input type="text" class="form-control" value="<?php echo $pricePerDay; ?>" readonly />
    </div>
    <div class="form-group">
    <label class="control-label">From Date</label>
      <input type="date" class="form-control" id="fromdate" name="fromdate" />
    </div>
    <div class="form-group">
    <label class="control-label">From Time</label>
    <div class="form-inline">
        <select class="form-control" name="fromhour">
            <?php
            for ($hour = 0; $hour <= 23; $hour++) {
                printf('<option value="%02d">%02d</option>', $hour, $hour);
            }
            ?>
        </select>
        <span> : </span>
        <select class="form-control" name="fromminute">
            <?php
            for ($minute = 0; $minute <= 30; $minute += 30) {
                printf('<option value="%02d">%02d</option>', $minute, $minute);
            }
            ?>
        </select>
    </div>
</div>                   
    <div class="form-group">
    <label class="control-label">Return Date</label>
      <input type="date" class="form-control" id="returndate" name="returndate" />
    </div>
    <div class="form-group">
    <label class="control-label">Return Time</label>
    <div class="form-inline">
        <select class="form-control" name="returnhour">
            <?php
            for ($hour = 0; $hour <= 23; $hour++) {
                printf('<option value="%02d">%02d</option>', $hour, $hour);
            }
            ?>
        </select>
        <span> : </span>
        <select class="form-control" name="returnminute">
            <?php
            for ($minute = 0; $minute <= 30; $minute += 30) {
                printf('<option value="%02d">%02d</option>', $minute, $minute);
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
   <label class="control-label">Pick Up Location</label>
   <select name="pickuplocation" class="form-control" id="pickuplocation">
      <option value="">Pick Up Location</option>
      <?php
      // Loop through the locations based on LocationID
      foreach ($locations as $location) {
         $locationID = $location['LocationID'];
         $locationName = htmlentities($location['LocationName']);
         $selected = ($_POST['pickuplocation'] == $locationID) ? 'selected' : '';

         echo "<option value='$locationID' $selected>$locationName</option>";
      }
      ?>
   </select>
</div>



    <div class="form-group">
    <label class="control-label">Return Location</label>
    <select name="returnlocation" class="form-control" id="returnlocation">
    <option value="">Return Location</option>
    <?php
    $sql="SELECT * FROM location";
    $stmt=$dbh->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while($row =$stmt->fetch()) { 
      ?>
    <option value="<?php echo $row['ID'];?>"><?php echo $row['LocationName'];?></option>
    <?php }?>
    </select>
    </div>
          <div class="form-group">
          <label class="control-label">Driver License</label>
          <input type="file" id="license" name="license" accept="image/*"/>
          </div>
          <div class="form-group">
            <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
          <input type="submit" class="btn" name="submit" value="Book Now">
          </div>
            <div class="form-group checkbox col-md-12">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">By clicking Book now, you are confirming that you have read, understood and accepted our <a href="Terms & Conditions.pdf" target="_blank"> Terms & Conditions </a>, <a href="Policy Terms.pdf" target="_blank"> Policy Terms </a> and <a href="Rental Terms.pdf" target="_blank"> Rental Terms.</a></label>
          </div>
          <p>Ride Ease will collect a deposit amount <b> RM1000 </b> on you. You could lose your whole deposit if the car is damaged or stolen, but as long as you have our Full Protection, Ride Ease will refund you! (The cover price you see includes all applicable taxes and fees).</p>
        </form>
        
    <div class="space-20"></div>
    <div class="divider"></div>

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
<script src="assets/js/booking-form.js"></script> 
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