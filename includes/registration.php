<?php
  error_reporting(0);
  if(isset($_POST['signup']))
  {
  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $email=$_POST['emailid']; 
  $mobile=$_POST['mobile'];
  $password=md5($_POST['password']); 

  $sql="INSERT INTO users(FullName,Username,EmailId,Mobile,Password) VALUES(:fullname,:username,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
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

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>


<style>
   .password-input {
            display: inline-block;
            margin-right: 5px;
   }
        .error input {
            border-color: red;
            border-width: 2px;
        }

        .success input {
            border-color: green;
            border-width: 2px;
        }

        .error span {
            color: red;
        }

        .success span {
            color: green;
        }

        span.error {
            color: red;
        }

        i {
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
        }
    </style>

<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        var email = $("#emailid").val();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'emailid=' + email,
            type: "POST",
            success: function (data) {
                $("#user-availability-status").html(data);

                if (isValidEmailDomain(email)) {
                    $("#loaderIcon").hide();
                } else {
                    $("#user-availability-status").html("Invalid Email Domain");
                    $("#loaderIcon").hide();
                }
            },
            error: function () { }
        });
    }

    function isValidEmailDomain(email) {
        var validDomains = ["gmail.com", "yahoo.com", "outlook.com", "hotmail.com", "icloud.com"]; 
        var domain = email.split('@')[1];
        return validDomains.includes(domain);
    }

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleButton = document.getElementById("togglePassword");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }

    function toggleconfirmPasswordVisibility() {
        var passwordField = document.getElementById("cpassword");
        var toggleButton = document.getElementById("toggleconfirmPassword");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>

 
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Register</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" method="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="signup" onSubmit="return valid();">
              <div class="row">
                    <div class="form-group col-md-6">
                        <label for="username">
                            Full Name (As per IC / Passport):
                        </label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required="required">
                        <span class="error" id="fullname_err"> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">
                            Username:
                        </label>
                        <input type="text" name="username" id="username" onBlur="checkAvailability()" class="form-control" placeholder="Username" required="required">
                        <span class="error" id="username_err"> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile">
                            Mobile Number:
                        </label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required="required">
                        <span class="error" id="mobile_err"> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">
                            Email:
                        </label>
                        <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                        <span id="user-availability-status" style="font-size:12px;"></span> 
                        <span class="error" id="email_err"> </span>
                    </div>

                    <div class="form-group col-md-8 password-container">
                      <label for="password">Password:</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
                      <br/><button type="button" id="togglePassword" onclick="togglePasswordVisibility()">Show</button>
                      <span class="error" id="password_err"> </span>
                  </div>

                  <div class="form-group col-md-8 password-container">
                        <label for="confirmpassword">
                            Confirm Password:
                        </label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" required="required">
                        <br/><button type="button" id="toggleconfirmPassword" onclick="toggleconfirmPasswordVisibility()">Show</button>
                        <span class="error" id="cpassword_err"> </span>
                    </div>

                    <div class="form-group checkbox col-md-12">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="Terms & Conditions.pdf" target="_blank">Terms and Conditions</a></label>
                </div>
                  
                    <div class="col-md-12">
                    <input type="submit" value="Register" name="signup" id="submit" class="btn btn-block">
                    </div>
              </form>
            </div> 
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already have an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/validation.js"></script>

