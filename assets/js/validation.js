$(document).ready(function () {
    $('#fullname').on('input', function () {
        checkname();
    });
    $('#username').on('input', function () {
        checkuser();
    });
    $('#emailid').on('input', function () {
        checkemailid();
    });
    $('#password').on('input', function () {
        checkpass();
    });
    $('#cpassword').on('input', function () {
        checkcpass();
    });
    $('#mobile').on('input', function () {
        checkmobile();
    });

    $('#submit').click(function () {

        if (!checkname() && !checkuser() && !checkemailid() && !checkmobile() && !checkpass() && !checkcpass()) {
            console.log("er1");
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
        } else if (!checkname() || !checkuser() || !checkemailid() || !checkmobile() || !checkpass() || !checkcpass()) {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
            console.log("er");
        }
        else {
            console.log("ok");
            $("#message").html("");
            var form = $('#signupform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "process.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#submit').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    $('#submit').attr("disabled", true);
                    $('#submit').css({ "border-radius": "50%" });
                },

                success: function (data) {
                    $('#message').html(data);
                },
                complete: function () {
                    setTimeout(function () {
                        $('#signupform').trigger("reset");
                        $('#submit').html('Submit');
                        $('#submit').attr("disabled", false);
                        $('#submit').css({ "border-radius": "4px" });
                    }, 200);
                }
            });
        }
    });
});

function checkuser() {
    var pattern = /^[A-Za-z0-9]+$/;
    var user = $('#username').val();
    var validuser = pattern.test(user);
    if ($('#username').val().length < 4) {
        $('#username_err').html('Username length is too short');
        return false;
    } else if (!validuser) {
        $('#username_err').html('Username should be a-z ,A-Z only');
        return false;
    } else {
        $('#username_err').html('');
        return true;
    }
}

function checkpass() {
    console.log("sass");
    var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pass = $('#password').val();
    var validpass = pattern2.test(pass);

    if (pass == "") {
        $('#password_err').html('Password can not be empty');
        return false;
    } else if (!validpass) {
        $('#password_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character.');
        return false;

    } else {
        $('#password_err').html("");
        return true;
    }
}
function checkcpass() {
    var pass = $('#password').val();
    var cpass = $('#cpassword').val();
    if (cpass == "") {
        $('#cpassword_err').html('Confirm password cannot be empty');
        return false;
    } else if (pass !== cpass) {
        $('#cpassword_err').html('Confirm password did not match');
        return false;
    } else {
        $('#cpassword_err').html('');
        return true;
    }
}

function checkmobile() {
    if (!$.isNumeric($("#mobile").val())) {
        $("#mobile_err").html("Only number is allowed");
        return false;
    } else if (mobileValue.length < 10 || mobileValue.length > 11) {
        $("#mobile_err").html("Mobile Number must be 10 or 11 digits");
        return false;
    }
    else {
        $("#mobile_err").html("");
        return true;
    }
}


