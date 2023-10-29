<?php
include_once "header.php";
include_once "config.php";
?>
<div class="container-fluid" id="wrapper-admin">
    <div class="container">
        <div class="row">
            <!-- Form Start -->
            <div class="col-md-12 login_pg">
                <h3 class="heading">Forget Password</h3>
                <form id="add-form" autocomplete="off">
                    <div class="errorMsg alert alert-danger" id="emailErr"></div>
                    <label for="n">Email:</label>
                    <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email">
                    <div class="errorMsg alert alert-danger" id="passErr"></div>
                    <label for="n">Old Password:</label>
                    <input type="password" placeholder="Enter password" class="form-control" name="old_pass" id="pass">
                    <div class="errorMsg alert alert-danger" id="conpassErr"></div>
                    <i class="text-danger">Make a Strong Password*</i><br>
                    <label for="n">New Password:</label>
                    <input type="password" placeholder="Enter New password" class="form-control" name="new_pass" id="conpass">
                    <input type="submit" class="btn btn-primary mt-1" value="Forget Password" name="submit" id="signup">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#wrapper-admin').focus();
        $(window).scrollTop($('#wrapper-admin').position().top);
        let pattern = {
            email: /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,10}$/,
            password: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/
        }
        var emailTrue = true;
        var passTrue = true;
        var conPassTrue = true;
        $("#emailErr").hide();
        $("#passErr").hide();
        $("#conpassErr").hide();

        function emailCheck() {
            var email = $("#email").val();
            if (email == '') {

                $("#emailErr").show().css({
                    "color": "red"
                }).html("**Enter Email**").fadeOut(5000);
                emailTrue = false;
                return false;
            }
            if (!pattern.email.test(email)) {
                $("#emailErr").show().css({
                    "color": "red"
                }).html("**Invalid Email Please Check Your Email.**").fadeOut(5000);
                emailTrue = false;
                return false;
            } else {
                $("#emailErr").hide();
            }
        }

        function passCheck() {
            var pass = $("#pass").val();
            if (pass == '') {
                $("#passErr").show().css({
                    "color": "red"
                }).html("**Enter Password**").fadeOut(5000);
                passTrue = false;
                return false;
            }
        }

        function conpassCheck() {
            pass = $("#pass").val();
            var conpass = $("#conpass").val();
            if (conpass == '') {
                $("#conpassErr").show().css({
                    "color": "red"
                }).html("**Enter Confirm Password**").fadeOut(5000);
                conPassTrue = false;
                return false;
            }
            if (!pattern.password.test(conpass)) {
                $("#conpassErr").show().css({
                    "color": "red"
                }).html("**Password must be 8 to 10 digits & \n Capital And Small Letter are Must & \nLetters,Numbers And Special characters Are Must**");
                passTrue = false;
                return false;
            } else {
                $("#conpassErr").hide()
            }
        }
        $("#signup").click(function(e) {
            e.preventDefault();
            emailTrue = true;
            passTrue = true;
            conPassTrue = true;
            emailCheck();
            passCheck();
            conpassCheck();
            email = $("#email").val();
            conpass = $("#conpass").val();
            pass = $("#pass").val();
            if ((passTrue == true) && (emailTrue == true) && (conPassTrue == true)) {
                $.ajax({
                    url: "save-forgetPass.php",
                    type: "POST",
                    data: {
                        email: email,
                        new_pass: conpass,
                        old_pass: pass
                    },
                    success: function(data) {
                        if ($.trim(data) == "Not_match") {
                            var a = "Email is Not Match";
                            $('#emailErr').show().html(a).fadeOut(5000);
                        } else if ($.trim(data) == "error") {
                            var a = "This password is used by You as old password";
                            $('#emailErr').show().html(a).fadeOut(5000);
                        } else if ($.trim(data) == "done") {
                            var a = "Password Change Successfully Done";
                            $('#emailErr').show().html(a).fadeOut(5000);
                            setTimeout(() => {
                                window.location = "login.php";
                            }, 3000);
                        }
                    }
                });
                return true;
            } else {
                return false;
            }
        });
    });
</script>
<?php include_once "footer.php"; ?>