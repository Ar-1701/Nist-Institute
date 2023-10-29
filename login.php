<?php $active_page = 'login';
if (isset($_SESSION["username"])) {
    header("Location:{$hostname}index.php");
}
include_once "config.php";
include_once "header.php";
?>
<div class="container" id="wrapper-admin">
    <div class="row">
        <!-- Form Start -->
        <div id="login_pg" class="col-md-12 login_pg">
            <?php
            $sql = "SELECT * FROM settings";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['logo'] == "") {
                        echo '<a href="index.php" class="logo"><h1>' . $row['websitename'] . '</h1></a>';
                    } else {
                        echo '<img class="logo" src="admin/upload/setting/' . $row['logo'] . '" alt="Logo">';
                    }
                }
            } ?>
            <h3 class="heading">Login</h3>
            <form>
                <div class="errorMsg alert alert-danger" id="userErr"></div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                </div>
                <div class="errorMsg alert alert-danger" id="passErr"></div>
                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" onkeypress="return value.length <= 12">
                </div>
                <div class="aaaa">
                    <input type="submit" name="login" id="login" class="btn btn-primary" value="Login" />
                    <a href="forget_pass.php" id="forget_pass" class="btn btn-danger">Forget Password</a>
                    <span class="mt-2" id="register_btn">Don't have an account?<a style=" display:inline;" href="signup.php">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#wrapper-admin').focus();
        $(window).scrollTop($('#wrapper-admin').position().top);
        let pattern = {
            username: /^[a-zA-Z0-9_]{6,10}$/,
            pass: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/
        }
        var userTrue = true;
        var passTrue = true;
        $("#userErr").hide();
        $("#passErr").hide();

        function usernameCheck() {
            var username = $("#username").val();
            if (username == '') {
                $("#userErr").show().css({
                    "color": "red"
                }).html("**Enter Username**");
                userTrue = false;
                return false;
            }
            if (!pattern.username.test(username)) {
                $("#userErr").show().css({
                    "color": "red"
                }).html("**Invalid Username**");
                userTrue = false;
                return false;
            } else {
                $("#userErr").hide();
            }
        }

        function passCheck() {
            var pass = $("#password").val();
            if (pass == '') {
                $("#passErr").show().css({
                    "color": "red"
                }).html("**Enter Password**");
                passTrue = false;
                return false;
            }
            if (!pattern.pass.test(pass)) {
                $("#passErr").show().css({
                    "color": "red"
                }).html("**Invalid Password**");
                passTrue = false;
                return false;
            } else {
                $("#passErr").hide();
            }
        }
        $("#login").click(function(e) {
            e.preventDefault();
            userTrue = true;
            passTrue = true;
            usernameCheck();
            passCheck();
            username = $("#username").val();
            pass = $("#password").val();
            if ((userTrue == true) && (passTrue == true)) {
                $.ajax({
                    url: "login_save.php",
                    type: "POST",
                    data: {
                        username: username,
                        pass: pass
                    },
                    success: function(data) {
                        if ($.trim(data) == "done") {
                            $("#userErr").show().css({
                                "color": "green"
                            }).html("**Login Successfully**");
                            setTimeout(() => {
                                window.location = "index.php";
                            }, 1000);
                        } else if ($.trim(data) == "notdone") {
                            $("#userErr").show().css({
                                "color": "red"
                            }).html("**Invalid Username Or Password**");
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