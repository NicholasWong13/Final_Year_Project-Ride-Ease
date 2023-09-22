<?php 
  session_start();
  include('includes/config.php');
  error_reporting(0);
?> 

<?php

// Query to retrieve data from the "vehicles" table
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start outputting HTML
    echo '<!DOCTYPE html>
<html>
<head>
    <!-- Add your head content here -->
</head>
<body>
    <!-- Listing -->
    <section class="listing-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <!-- Car listings -->
                    ';
    
    // Loop through the results and display car listings
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-listing-m gray-bg">';
        // Display car details here, for example:
        echo '<h5>' . $row['VehiclesTitle'] . '</h5>';
        echo '<p class="list-price">$' . $row['PricePerDay'] . ' per day</p>';
        echo '<div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '</span></div>';
        // Add more details as needed
        echo '</div>';
    }
    
    // Continue with the rest of your HTML
    echo '
                    <!-- Pagination -->
                    <div class="pagination">
                        <ul>
                            <!-- Add pagination links here -->
                        </ul>
                    </div>
                </div>
                <!-- Add the sidebar content here (col-md-3) -->
            </div>
        </div>
    </section>
    <!-- Add your footer content here -->
</body>
</html>';
    
    // Close the database connection
    $conn->close();
} else {
    echo "No cars found in the database.";
}
?>

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