<?php
session_start();

error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        if (isset($_POST['submit'])) {
            // Update user details
            $username = $_POST['username'];
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            // Add other form fields as needed

            $sql = "UPDATE users SET 
                    Username = :username,
                    FullName = :fullName,
                    EmailId = :email,
                    Mobile = :mobile
                    -- Add other fields here
                    WHERE id = :id";

            $query = $dbh->prepare($sql);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':fullName', $fullName, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            // Add other field bindings

            $query->bindParam(':id', $id, PDO::PARAM_STR);
            
            $query->execute();

            $rowsAffected = $query->rowCount();
            if ($rowsAffected > 0) {
                $msg = "User details updated successfully";
            } else {
                $msg = "No changes made or user not found";
            }
        }

        // Fetch user details for editing
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
    }
?>

<!DOCTYPE HTML>
  <html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<title>Ride Ease | Admin Edit Users</title>

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
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit Users</div>
                            <div class="panel-body">
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlentities($result->Username);?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullName" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="fullName" id="fullName" value="<?php echo htmlentities($result->FullName);?>" required>
                                        </div>
                                    </div>
									<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
        <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($result->EmailId);?>" required>
    </div>
</div>
<div class="form-group">
    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo htmlentities($result->Mobile);?>" required>
    </div>
</div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2" >
                                            <button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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