<?php $active_page = 'contacts';
include_once "config.php";
include_once "header.php";

?>
<!-- Main-content -->
<div class="container bg-white contact_pg">
    <h1 class="text-center">CONTACT</h1>
    <div class="row">
        <div class="col-md-6 mt-5 contact_info">
            <form id="form-data" autocomplete="0ff">
                <table class="table table-bordered bg-info ">
                    <tr>
                        <th>
                            <label>Your Name:</label>
                        </th>
                        <td>
                            <div class="errMsg" id="nameErr"></div>
                            <input type="text" id="name" class="form-control" onkeypress="return !(event.charCode >= 33 && event.charCode <= 45 || event.charCode >= 47 && event.charCode <= 64) && value.length < 20">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label>Email:</label>
                        </th>
                        <td>
                            <div class="errMsg" id="emailErr"></div>
                            <input type="text" id="email" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label>Message:</label>
                        </th>
                        <td>
                            <div class="errMsg" id="msgErr"></div>
                            <textarea id="message" class="form-control" style="height:150px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-success">
                            <input id="" type="reset" value="Reset" class="btn btn-danger">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col">
            <div class="vl"></div>
            <div class="container contact">
                <p>
                    For Order and Inquiries Please Call: <br> <b>9170618798</b> <br> Or you can visit us at: <b> <br>Nistha Institute Of Science & Technology Bhawarnath Azamgarh Uttar Pradesh<br>Azamgarh</b> <br> Or just Email us instead at: <b class="email"><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-10 link-underline-opacity-75-hover" href="#">
                    nist1234@gmail.com
                        </a></b>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<script src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.contact_pg').focus();
        $(window).scrollTop($('.contact_pg').position().top);
        let pattern = {
            name: /^[A-Za-z\s.]{3,20}$/,
            email: /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,10}$/
        }
        var nameTrue = true;
        var emailTrue = true;
        var msgTrue = true;

        $("#nameErr").hide();
        $("#emailErr").hide();
        $("#msgErr").hide();
        // Name
        function nameCheck() {
            let name = $("#name").val();
            if (name == '') {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Enter Name**");
                nameTrue = false;
                return false;
            }
            if (!pattern.name.test(name)) {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Invalid Name**");
                nameTrue = false;
                return false;
            } else {
                $("#nameErr").hide();
            }
        }
        // Email

        function emailCheck() {
            let email = $("#email").val();
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
                }).html("**Invalid Email**");
                emailTrue = false;
                return false;
            } else {
                $("#emailErr").hide();
            }
            if (!pattern.email.test(email) == "@") {
                $("#emailErr").show().css({
                    "color": "red"
                }).html("**@ is not Found**");
                emailTrue = false;
                return false;
            } else {
                $("#emailErr").hide();
            }
        }
        // Message
        function msgCheck() {
            let message = $("#message").val();
            if (message == '') {
                $("#msgErr").show().css({
                    "color": "red"
                }).html("**Enter Message**");
                msgTrue = false;
                return false;
            } else {
                $("#msgErr").hide();
            }
        }

        $("#submit").click(function(e) {
            e.preventDefault();
            nameTrue = true;
            emailTrue = true;
            msgTrue = true;

            nameCheck();
            emailCheck();
            msgCheck();
            name = $("#name").val()
            email = $("#email").val();
            message = $("#message").val();

            if ((nameTrue == true) && (emailTrue == true) && (msgTrue == true)) {
                $.ajax({
                    url: "contact_save.php",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        message: message
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#form-data").trigger("reset");
                            alert("Your Message has been Send Successfully.")
                        } else {
                            alert("Your Message Has Not Been Send Successfully.");
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