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
  <title>Ride Ease | Payment </title>
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
        <h1>Payment</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Payment</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

  <div class="container">
    <div class="col s12" style="margin-bottom: 50px;">
    </div>
      <form action="payment.php" method="POST" style="margin-left: 50px;">
        <div class="col s8">
          <div class="row">
            <div class="input-field col s6">
              <label class="active cyan-text" for="name">CardHolder Name</label>
              <input id="name" type="text" placeholder="XXX XXX XXX" name="card_name">
              <span class="helper-text grey-text" data-error="CardHolder Name" data-success="CardHolder Name"></span>
            </div>

            <div class="input-field col s6">
              <label class="active cyan-text" for="card_number">Card Number</label>
              <input placeholder="0000 0000 0000 0000" id="card_number" name="card_number" type="text">
              <span class="helper-text grey-text" data-error="Invalid Card Number" data-success="Valid Card Number"></span>
            </div>
          </div>

          <div class="row">
          <div class="input-field col s4">
            <label class="active cyan-text" for="exp_month">Exp Month</label>
            <select id="exp_month" name="exp_month">
              <option value="" disabled selected>Select Month</option>
              <option value="January">01</option>
              <option value="February">02</option>
              <option value="March">03</option>
              <option value="April">04</option>
              <option value="May">05</option>
              <option value="June">06</option>
              <option value="July">07</option>
              <option value="August">08</option>
              <option value="September">09</option>
              <option value="October">10</option>
              <option value="November">11</option>
              <option value="December">12</option>
            </select>
            <span class="helper-text grey-text" data-error="Invalid Exp Month" data-success="Valid Exp Month"></span>
          </div>
            <!--<div class="input-field col s4">
              <label class="active cyan-text" for="exp_month">Exp Month</label>
              <input placeholder="01"id="exp_month" type="tel" name="exp_month">
              <span class="helper-text grey-text" data-error="Invalid Exp Month" data-success="Valid Exp Month"></span>
            </div>-->
            <div class="input-field col s4">
              <label class="active cyan-text" for="exp_year">Exp Year</label>
              <input id="exp_year" type="text" name="exp_year">
              <span class="helper-text grey-text" data-error="Invalid Exp Year" data-success="Valid Exp Year"></span>
            </div>
            <div class="input-field col s4">
              <label class="active cyan-text" for="cvv">CVV</label>
              <input id="cvv" type="text" name="cvv">
              <span class="helper-text grey-text" data-error="Invalid CVV" data-success="Valid CVV"></span>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <label class="active cyan-text" for="phone">Phone Number</label>
              <input id="phone" type="text" name="phone">
              <span class="helper-text grey-text" data-error="Invalid Number" data-success="Valid Number"></span>
            </div>

            <div class="input-field">
              <label class="active cyan-text" for="home">Billing Address</label>
              <textarea placeholder="House No, Street, District, Zip, State" id="home" name="address" type="text"></textarea>
              <span class="helper-text grey-text" data-error="Invalid Address" data-success="Valid Address"></span>
            </div>

            <div class="input-field col s4">
              <label class="active cyan-text" for="state">State</label>
              <select id="state" name="state">
                <option value="" disabled selected>Select State</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Labuan">Labuan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Penang">Penang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Putrajaya">Putrajaya</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
              </select>
              <span class="helper-text grey-text" data-error="Invalid State" data-success="Valid State"></span>
            </div>
          </div>
            <!--<div class="input-field col s4">
              <label class="active cyan-text" for="state">State</label>
              <input id="state" type="text" name="state">
              <span class="helper-text grey-text" data-error="Invalid State" data-success="Valid State"></span>
            </div>-->
          <div class="errormsg">
            <?php
              if (isset($_GET["error"]))
              {
                if ($_GET["error"] == "empty_input")
                  echo "<p>*Fill in all fields!<p>";
              }
            ?>
          </div>
          <button type="submit" name="payment" class="btn" style="margin-bottom: 20px;">Confirm Payment</button>
        </div>
        <div class="col s4">
          <div class="rounded-card tint-glass-black" style="margin-top: 100px;">
            <div class="card-content">
              <label for="cards" style="font-size: 24px;">Accepted Cards</label>
              <div style= 'margin-bottom: 20px; padding: 7px 0; font-size: 40px;'>
                <i class="fa fa-cc-visa payable-cards" style="color: navy;"></i>
                <i class="fa fa-cc-amex payable-cards" style="color: blue;"></i>
                <i class="fa fa-cc-mastercard payable-cards" style="color: red;"></i>
                <i class="fa fa-cc-discover payable-cards" style="color: orange;"></i>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php
  function EmptyInputPayment($name, $number, $month, $year, $cvv, $address, $phone, $state, $zip)
  { return empty($name) || (empty($number)) || (empty($month)) || (empty($year)) || (empty($cvv)) 
    || (empty($address)) || (empty($phone)) || (empty($state)) || (empty($zip)); }

  if (isset($_POST["payment"])) 
  {
    $name = $_POST["card_name"];
    $number = $_POST["card_number"];
    $month = $_POST["exp_month"];
    $year = $_POST["exp_year"];
    $cvv = $_POST["cvv"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    if (EmptyInputPayment($name, $number, $month, $year, $cvv, $address, $phone, $state, $zip))
    {
      $orderID = $_GET["order_id"];
      $memberID = $_GET["member_id"];
      echo("<script>location.href = 'payment.php?error=empty_input&user_id=$userID&view_order=1';</script>");
      exit();
    }

    if (isset($_GET["order_id"]))
    {
      $orderid = $_GET["order_id"];
      $conn = new Dbhandler();

      $itemID = $item->getItemID();
      $item = new Item($itemID);
      $quantityInStock = $item->getQuantityInStock();
      $quantity = $orderItem->getQuantity();

      $item->setQuantityInStock($quantityInStock - $quantity);
      $item->setData();

      $sql = "INSERT INTO Payment(OrderID, PaymentDate)
        VALUES($orderid, CURRENT_TIME)";
      $conn->conn()->query($sql) or die($conn->error);
      
      echo("<script>location.href = 'payment_done.php';</script>");
      exit();
    }
  }
?>

<script>
function validateForm() {
    var cardName = document.getElementById("name").value;
    var cardNumber = document.getElementById("card_number").value;
    var expMonth = document.getElementById("exp_month").value;
    var expYear = document.getElementById("exp_year").value;
    var cvv = document.getElementById("cvv").value;

    // Basic required field validation
    if (cardName.trim() === "" || cardNumber.trim() === "" || expMonth.trim() === "" || expYear.trim() === "" || cvv.trim() === "") {
        alert("Please fill in all fields.");
        return false;
    }

    // Card number format validation (16 digits)
    if (!/^\d{16}$/.test(cardNumber)) {
        alert("Invalid card number format. Please enter 16 digits.");
        return false;
    }

    // Expiration month format validation (01 to 12)
    if (!/^(0[1-9]|1[0-2])$/.test(expMonth)) {
        alert("Invalid expiration month format. Please enter a valid month (01 to 12).");
        return false;
    }

    // Expiration year format validation (current year or later)
    var currentYear = new Date().getFullYear();
    if (!/^\d{4}$/.test(expYear) || parseInt(expYear) < currentYear) {
        alert("Invalid expiration year format. Please enter a valid year.");
        return false;
    }

    // CVV format validation (3 digits)
    if (!/^\d{3}$/.test(cvv)) {
        alert("Invalid CVV format. Please enter 3 digits.");
        return false;
    }

    return true;
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