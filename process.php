<?php
  error_reporting(0);
  if(isset($_POST['signup']))
  {
  $fullname=$_POST['fullname']
  $username=$_POST['username'];
  $email=$_POST['emailid']; 
  $mobile=$_POST['mobile'];
  $password=md5($_POST['password']); 
  $sql="INSERT INTO users(FullName,Username,EmailId,Mobile,Password) VALUES(:fullname,:username,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fullname',$fname,PDO::PARAM_STR);
  $query->bindParam(':username',$fname,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
  echo "<script>alert('Registration successfull. Now you can login');</script>";
  }
  else 
  {
  echo "<script>alert('Something went wrong. Please try again');</script>";
  }
  }
  
$name = htmlspecialchars(trim($_POST['username']));
$email = htmlspecialchars(trim($_POST['email']));
$pass = htmlspecialchars(trim($_POST['password']));
$cpass = htmlspecialchars(trim($_POST['cpassword']));
$mobile = htmlspecialchars(trim($_POST['mobile']));

if (empty($name) || empty($email) || empty($pass) || empty($mobile)) {
    echo '<div class="alert alert-success">please fill all required field</div>';
} else {
    $sql = "INSERT INTO users(Fullname,Username,EmailId,Mobile,Password) VALUES(:fullname,username,:email,:mobile,:password)";
    if ($res = mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">data successfully inserted</div>';
    } else {
        echo '<div class="alert alert-warning">data not inserted</div>';
    }
}

?>

