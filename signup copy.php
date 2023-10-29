<?php
include_once "header.php";
?>
<div class="container-fluid" id="wrapper-admin">
    <div class="container">
        <div class="row">
            <!-- Form Start -->
            <div class="col-md-12 login_pg">
                <?php
                include_once "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['logo'] == "") {
                            echo '<a href="index.php" class="logo"><h1>' . $row['websitename'] . '</h1></a>';
                        } else {
                            echo '<img class="logo" src="admin/upload/setting/' . $row['logo'] . '" alt="Logo">';
                        }
                ?>
                <?php }
                } ?>
                <h3 class="heading">Registration</h3>
                <form id="add-form" action="signup_save.php" autocomplete="off" method="POST" enctype="multipart/form-data">
                    <!-- <div class="errorMsg alert alert-danger" id="dbErr"></div> -->
                    <div class="errorMsg alert alert-danger" id="nameErr"></div>
                    <label for="n">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter your Name" name="name" id="name" onkeypress="return !(event.charCode >= 33 && event.charCode <= 45 || event.charCode >= 47 && event.charCode <= 64) && value.length < 20">

                    <div class="errorMsg alert alert-danger" id="userErr"></div>
                    <label for="n">Username:</label>
                    <input type="text" id="user" name="user" class="form-control" placeholder="Enter your Username" onkeypress="return !(event.charCode >= 33 && event.charCode <= 47) && value.length < 10">

                    <div class="errorMsg alert alert-danger" id="emailErr"></div>
                    <label for="n">Email:</label>
                    <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email">

                    <div class="errorMsg alert alert-danger" id="passErr"></div>
                    <i class="text-danger">Make a Strong Password*</i><br>
                    <label for="n">Password:</label>
                    <input type="password" placeholder="Enter password" class="form-control" name="pass" id="pass" onkeypress="return value.length < 12">

                    <div class="errorMsg alert alert-danger" id="conpassErr"></div>
                    <label for="n">Confirm Password:</label>
                    <input type="password" placeholder="Enter Confirm password" class="form-control" name="conpass" id="conpass" onkeypress="return value.length < 12">

                    <div class="errorMsg alert alert-danger" id="userImgErr"></div>
                    <label for="n">Upload Your Profile Image:</label>
                    <input type="file" class="form-control" name="user_image" id="user_image">

                    <div class="errorMsg alert alert-danger" id="UserTypeErr"></div>
                    <label>Login As:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="usertype" id="user_type" value="0">
                        <label class="form-check-label">
                            Student
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="usertype" id="user_type" value="1">
                        <label class="form-check-label">
                            Teacher
                        </label>
                    </div>
                    <div class="aaaa">
                        <input type="submit" class="btn btn-primary" value="Sign Up" id="signup">
                        <input type="reset" class="btn btn-danger" id="reset">
                        <span class="mt-3" id="register_btn">Have an account?<a style=" display:inline;" href="login.php">Log in</a></span>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<script src=" js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#wrapper-admin').focus();
        $(window).scrollTop($('#wrapper-admin').position().top);
        let pattern = {
            name: /^[A-Za-z\s.]{3,20}$/,
            username: /^[a-zA-Z0-9_]{6,10}$/,
            email: /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,10}$/,
            pass: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/
        }
        var nameTrue = true;
        var userTrue = true;
        var emailTrue = true;
        var passTrue = true;
        var conPassTrue = true;
        var UserTypeErr = true;
        var userImgTrue = true;

        $("#dbErr").hide();
        $("#nameErr").hide();
        $("#userErr").hide();
        $("#emailErr").hide();
        $("#passErr").hide();
        $("#conpassErr").hide();
        $("#UserTypeErr").hide();
        $("#userImgErr").hide();

        // name
        function nameCheck() {
            var name = $("#name").val();
            if (name == '') {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Enter Name**");
                nameTrue = false;
                return false;
            } else if (!pattern.name.test(name)) {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Invalid Name**");
                nameTrue = false;
                return false;
            } else {
                $("#nameErr").hide();
            }
        }

        function emailCheck() {
            var email = $("#email").val();
            if (email == '') {
                $("#emailErr").show().css({
                    "color": "red"
                }).html("**Enter Email**");
                emailTrue = false;
                return false;
            }
            if (!pattern.email.test(email)) {
                $("#emailErr").show().css({
                    "color": "red"
                }).html("**Invalid Email Please Check Your Email.**");
                emailTrue = false;
                return false;
            } else {
                $("#emailErr").hide();
            }
        }
        // Username
        function usernameCheck() {
            var username = $("#user").val();
            if (username == '') {
                $("#userErr").show().css({
                    "color": "red"
                }).html("**Enter Username**");
                userTrue = false;
                return false;
            } else if (!pattern.username.test(username)) {
                $("#userErr").show().css({
                    "color": "red"
                }).html("**Username must be 6 to 10 digits & Only Letter And Number Are Allow**");
                userTrue = false;
                return false;
            } else {
                $("#userErr").hide()
            }
        }
        // Password
        function passCheck() {
            var pass = $("#pass").val();
            if (pass == '') {
                $("#passErr").show().css({
                    "color": "red"
                }).html("**Enter Password**");
                passTrue = false;
                return false;
            } else if (!pattern.pass.test(pass)) {
                $("#passErr").show().css({
                    "color": "red"
                }).html("**Password must be 8 To 12 Characters & \n  Capital And Small Letter are Must & \nLetters,Numbers And Special characters Are Must**");
                passTrue = false;
                return false;
            } else {
                $("#passErr").hide();
            }
        }
        // Confirm Password
        function conpassCheck() {
            pass = $("#pass").val();
            var conpass = $("#conpass").val();
            if (conpass == '') {
                $("#conpassErr").show().css({
                    "color": "red"
                }).html("**Enter Confirm Password**");
                conPassTrue = false;
                return false;
            } else if (conpass != pass) {
                $("#conpassErr").show().css({
                    "color": "red"
                }).html("**Confirm Password not Matched**");
                conPassTrue = false;
                return false;
            } else {
                $("#conpassErr").hide();
            }
        }

        function usertypeCheck() {
            var usertype = $('input[name=usertype]:checked').val();
            if (usertype == null) {
                $("#UserTypeErr").show().css({
                    "color": "red"
                }).html("**Please Check At List One Option**");
                UserTypeTrue = false;
                return false;
            } else {
                $("#UserTypeErr").hide();
            }
        }

        function userImgCheck() {
            var user_img = $('#user_image').val();
            if (user_img == "") {
                $("#userImgErr").show().css({
                    "color": "red"
                }).html("**Select Image**");
                userImgErr = false;
                return false;
            } else {
                $("#userImgErr").hide();
            }
        }
        // Click Function
        $("#signup").click(function() {
            nameTrue = true;
            userTrue = true;
            emailTrue = true;
            passTrue = true;
            conPassTrue = true;
            UserTypeTrue = true;
            userImgTrue = true;
            nameCheck();
            emailCheck();
            usernameCheck();
            passCheck();
            conpassCheck();
            usertypeCheck();
            userImgCheck();
            name = $("#name").val();
            email = $("#email").val();
            username = $("#user").val();
            conpass = $("#conpass").val();
            pass = $("#pass").val();
            usertype = $('input[name=user_type]:checked').val();
            user_img = $('#user_image').val();
            if ((userTrue == true) && (nameTrue == true) && (passTrue == true) && (emailTrue == true) && (conPassTrue == true) && (UserTypeTrue == true) && (userImgTrue == true)) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
<?php include_once "footer.php"; ?>