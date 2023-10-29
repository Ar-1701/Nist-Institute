<?php session_start();
if (isset($_SESSION["ad_user"])) {
    header("Location:{$hostname}dashboard.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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
                                echo '<img class="logo" src="upload/setting/' . $row['logo'] . '" alt="Logo">';
                            }
                    ?>
                    <?php }
                    } ?>
                    <h3 class="heading">Admin-Login</h3>
                    <form>
                        <div class="errorMsg alert alert-danger" id="userErr"></div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                        </div>
                        <div class="errorMsg alert alert-danger" id="passErr"></div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" onkeypress="return value.length <= 12">
                        </div>
                        <input type="submit" name="login" id="login" class="btn btn-primary" value="Login" />
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            let pattern = {
                username: /^[a-zA-Z0-9_]{6,15}$/,
                pass: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/
            }
            var userTrue = true;
            var passTrue = true;
            $("#userErr").hide();
            $("#passErr").hide();

            function usernameCheck() {
                username = $("#username").val();
                if (username == '') {
                    $("#userErr").show();
                    $("#userErr").css({
                        "color": "red"
                    }).html("**Enter Username**");
                    userTrue = false;
                    return false;
                }
                if (!pattern.username.test(username)) {
                    $("#userErr").show();
                    $("#userErr").css({
                        "color": "red"
                    }).html("**Invalid Username**");
                    userTrue = false;
                    return false;
                } else {
                    $("#userErr").css({
                        "color": "green"
                    }).html("**Valid Username**");
                }
            }

            function passCheck() {
                let pass = $("#password").val();
                if (pass == '') {
                    $("#passErr").show();
                    $("#passErr").css({
                        "color": "red"
                    }).html("**Enter Password**");
                    passTrue = false;
                    return false;
                } else if (!pattern.pass.test(pass)) {
                    $("#passErr").show();
                    $("#passErr").css({
                        "color": "red"
                    }).html("**Password Must be Capital & small letter**");
                    passTrue = false;
                    return false;
                } else {
                    $("#passErr").css({
                        "color": "green"
                    }).html("**valid Password**");
                }
            }
            $("#login").click(function(e) {
                e.preventDefault();
                userTrue = true;
                passTrue = true;
                usernameCheck();
                passCheck();
                pass = $("#password").val();
                username = $("#username").val();
                if ((userTrue == true) && (passTrue == true)) {
                    $.ajax({
                        url: "login.php",
                        type: "POST",
                        data: {
                            username: username,
                            pass: pass
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#userErr").show();
                                $("#userErr").css({
                                    "color": "green"
                                }).html("**Username And Password Are Matched**");
                                window.location = "dashboard.php";
                            } else {
                                $("#userErr").show();
                                $("#userErr").css({
                                    "color": "red"
                                }).html("**Username Or Password Not Matched**");
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
</body>

</html>