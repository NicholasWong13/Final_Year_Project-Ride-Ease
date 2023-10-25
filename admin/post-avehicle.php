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
	$vehicletitle=$_POST['vehicletitle'];
	$brand=$_POST['brandname'];
	$vehicleoverview=$_POST['vehicleoverview'];
	$priceperday=$_POST['priceperday'];
	$fueltype=$_POST['fueltype'];
	$modelyear=$_POST['modelyear'];
	$seatingcapacity=$_POST['seatingcapacity'];
	$vimage1=$_FILES["img1"]["name"];
	$vimage2=$_FILES["img2"]["name"];
	$vimage3=$_FILES["img3"]["name"];
	$vimage4=$_FILES["img4"]["name"];
	$vimage5=$_FILES["img5"]["name"];
	$airconditioner=$_POST['airconditioner'];
	$powerdoorlocks=$_POST['powerdoorlocks'];
	$antilockbrakingsys=$_POST['antilockbrakingsys'];
	$brakeassist=$_POST['brakeassist'];
	$powersteering=$_POST['powersteering'];
	$driverairbag=$_POST['driverairbag'];
	$passengerairbag=$_POST['passengerairbag'];
	$powerwindow=$_POST['powerwindow'];
	$cdplayer=$_POST['cdplayer'];
	$centrallocking=$_POST['centrallocking'];
	$crashcensor=$_POST['crashcensor'];
	$leatherseats=$_POST['leatherseats'];
	move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
	move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
	move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
	move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
	move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);

	$sql="INSERT INTO vehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
	$query->bindParam(':brand',$brand,PDO::PARAM_STR);
	$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
	$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
	$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
	$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
	$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
	$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
	$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
	$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
	$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
	$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
	$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
	$query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
	$query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
	$query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
	$query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
	$query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
	$query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
	$query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
	$query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
	$query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
	$query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
	$query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
	$msg="Vehicle posted successfully";
	}
	else 
	{
	$error="Something went wrong. Please try again";
	}

	}

?>

<!DOCTYPE HTML>
  <html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<title>Ride Ease | Admin Post Vehicle</title>

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
						<h4 class="widget-title">Post A Vehicle</h4>
					</header>
					<hr class="widget-separator">
					<div class="widget-body">
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="selectpicker" name="brandname" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicleoverview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="selectpicker" name="fueltype" required>
<option value=""> Select </option>

<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="Electric">Electric</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Reg No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="regno" class="form-control" required>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in MYR)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" required>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" required>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Vehicles Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
<label for="powerdoorlocks"> Power Door Locks </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
<label for="antilockbrakingsys"> AntiLock Braking System </label>
</div>
</div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
<label for="brakeassist"> Brake Assist </label>
</div>
</div>

<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<label for="inlineCheckbox5"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
<label for="driverairbag">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
<label for="passengerairbag"> Passenger Airbag </label>
</div>
</div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
<label for="powerwindow"> Power Windows </label>
</div>
</div>


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
<label for="cdplayer"> CD Player </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox h checkbox-inline">
<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
<label for="centrallocking">Central Locking</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
<label for="crashcensor"> Crash Sensor </label>
</div>
</div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
<label for="leatherseats"> Leather Seats </label>
</div>
</div>
</div>


	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-default" type="reset">Cancel</button>
			<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
		</div>
	</div>

	</form>
		</div>
								</div>
							</div>
						</div>
						

					</div>
				</div>
				
			

			</div>
		</div>
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
<?php } ?>