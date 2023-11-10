<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$id=$_GET['loctid'];
$loctname=$_POST['locationname'];
$address=$_POST['address'];	
$cnumber=$_POST['contactno'];

$sql="update location set LocationName=:loctname,Address=:address,ContactNumber=:cnumber where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':loctname',$wpname,PDO::PARAM_STR);
$query->bindParam(':address',$wpaddress,PDO::PARAM_STR);
$query->bindParam(':cnumber',$wpcnumber,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

 echo "<script>alert('Location updated successfully');</script>";
 echo "<script>window.location.href ='manage-locations.php'</script>";
}



?>

<!DOCTYPE HTML>
  <html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<title>Ride Ease | Admin Manage Locations  </title>

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>

</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">

<?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>

<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
					<h4 class="widget-title">Edit Location</h4>
					</header>
						<div class="row">
							<div class="col-md-10">
								<div class="panel-body">
									<form method="post" name="location" class="form-horizontal" onSubmit="return valid();">
  	        	  					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
									<?php } else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

								<?php 
								$id=$_GET['id'];
								$sql = "SELECT * from location where id='$id'";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);

								foreach($results as $result)
								{				
								?>	
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="locationname" id="locationname" value="<?php echo htmlentities($result->LocationName);?>" required>
									</div>
								</div>
									
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="address" id="address" placeholder="Address" required rows="4"><?php echo htmlentities($result->Address);?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo htmlentities($result->ContactNumber);?>" required>
									</div>
								</div>	

								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="submit" class="btn-primary btn">Update</button>
									</div>
								</div>
							</div>
							</form>
								<?php } ?>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
	<?php include_once('includes/footer.php');?>
</main>

	<?php include_once('includes/customizer.php');?>

	
	<!-- build:js assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>
</body>
</html>
<?php }  ?>