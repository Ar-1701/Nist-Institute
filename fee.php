<?php $active_page = 'login';
include_once "header.php";
include_once "config.php"; ?>
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
            <h3 class="heading">Fees</h3>
            <form>
                <div class="errorMsg alert alert-danger" id="nameErr"></div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                </div>
                <div class="errorMsg alert alert-danger" id="registerErr"></div>
                <div class="form-group mb-2">
                    <label>Registration No.</label>
                    <input type="text" name="register_id" id="register_id" class="form-control" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
                <div class="errorMsg alert alert-danger" id="courseErr"></div>
                <div class="col-md-12">
                    <label for="n">Course:</label>
                    <select class="form-control form-select" name="course" id="course" onchange="fee()">
                        <option disabled selected value="">Select Your Course</option>
                        <?php
                        echo $sql = "SELECT * FROM course ";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value='<?php echo $row['id']; ?>'>
                                    <?php echo $row['course_name']; ?>
                                </option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Semester Fees</label>
                    <input type="text" name="semester_fee" id="semester_fee" class="form-control" readonly>
                </div>
                <div class="form-group mb-2">
                    <label>Other Fees</label>
                    <input type="text" name="other_fee" id="other_fee" class="form-control" readonly>
                </div>
                <div class="form-group mb-2">
                    <label>Examination Fees</label>
                    <input type="text" name="exam_fee" id="exam_fee" class="form-control" readonly>
                </div>

                <div class="form-group mb-2">
                    <label>Total Fees:</label>
                    <input type="text" name="Total_fee" id="Total_fee" class="form-control" readonly>
                </div>
                <div class="errorMsg alert alert-danger" id="paymentErr"></div>
                <div>Payment Method:</div>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" id="cardBtn" value="By Card" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="image/credit-card.png" class="payment_img" />Credit/Debit/ATM Card
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div>
                                <div class="row">
                                    <div class="col-md-6 m-3">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control" id="floatingInputCardNumber" placeholder="name@example.com" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 16">
                                            <label for="floatingInputCardNumber">Enter Card Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 mb-2 ms-3">
                                        <label class="form-label">Exp Month</label>
                                        <input type="text" class="form-control" placeholder="01" name="expMonth" id="expMonth" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 2" oninput="exp_month()">
                                    </div>
                                    <div class="col-md-2 col-sm-12 mb-2">
                                        <label class="form-label">Exp Year</label>
                                        <input type="text" class="form-control" placeholder="2022" name="expYear" id="expYear" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 4" oninput="exp_year()">
                                    </div>
                                    <div class="col-md-2 col-sm-12 mb-2">
                                        <label class="form-label">CVV</label>
                                        <input type="password" class="form-control" placeholder="CVV" name="CVV" id="CVV" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 3">
                                    </div>
                                </div>
                                <div class="col-md-12 ms-3 mb-2">
                                    <input type="button" class="btn btn-success" id="byCard" name="byCard" value="PAY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" id=upiBtn type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="image/phonepe.png" class="payment_img" /> UPI
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-8 mb-4">
                                <label class="form-group col-md-12">Choose An option:</label>
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="payment" id="payment" value="phonePe" data-bs-toggle="collapse" data-bs-target="#collapseExamplePhonePe" aria-expanded="false" aria-controls="collapseExamplePhonePe">
                                    <label class="form-check-label" for="inlineRadio1"><img src="image/phonepe.png" class="payment_img" />PhonePe</label>
                                    <div class="collapse" id="collapseExamplePhonePe">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="button" class="btn btn-success" id="phonePe" name="phonePe" value="PAY">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="payment" id="payment" value="upiId" data-bs-toggle="collapse" data-bs-target="#collapseExampleUPIid" aria-expanded="false" aria-controls="collapseExampleUPIid">
                                    <label class="form-check-label" for="inlineRadio2">Your UPI ID</label>
                                    <div class="collapse" id="collapseExampleUPIid">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-floating m-1">
                                                        <input type="text" class="form-control" id="floatingInputUpi" placeholder="">
                                                        <label for="floatingInputUpi">Your UPI ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <input type="button" class="btn btn-success" id="upiId" name="upiId" value="PAY">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#wrapper-admin').focus();
        $(window).scrollTop($('#wrapper-admin').position().top);
        let pattern = {
            username: /^[A-Za-z\s.]{3,15}$/
        }
        var userTrue = true;
        var registerTrue = true;
        var courseErr = true;
        var paymentErr = true;
        $("#nameErr").hide();
        $("#registerErr").hide();
        $("#courseErr").hide();
        $("#paymentErr").hide();

        function usernameCheck() {
            var username = $("#name").val();
            if (username == '') {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Enter Name**");
                userTrue = false;
                return false;
            }
            if (!pattern.username.test(username)) {
                $("#nameErr").show().css({
                    "color": "red"
                }).html("**Invalid Username**");
                userTrue = false;
                return false;
            } else {
                $("#nameErr").hide();
            }
        }

        function registerCheck() {
            var registerId = $("#register_id").val();
            if (registerId == '') {
                $("#registerErr").show().css({
                    "color": "red"
                }).html("**Enter Registration Id**");
                registerTrue = false;
                return false;
            }
        }

        function courseCheck() {
            var course = $("#course").val();
            if (course == null) {
                $("#courseErr").show().css({
                    "color": "red"
                }).html("**Select Course**");
                courseErr = false;
                return false;
            }
        }

        $('#phonePe, #upiId, #byCard').click(function(event) {
            if ($(event.target).attr('id') == 'phonePe') {
                userTrue = true;
                registerTrue = true;
                courseErr = true;
                paymentErr = true;
                usernameCheck();
                registerCheck();
                courseCheck();
                username = $("#name").val();
                registerId = $("#register_id").val();
                var semester_fee = $("#semester_fee").val();
                var other_fee = $("#other_fee").val();
                var exam_fee = $("#exam_fee").val();
                course = $("#course").val();
                var add = $("#Total_fee").val();
                var payment = "By PhonePe";
                if ((userTrue == true) && (registerTrue == true) && (courseErr == true)) {
                    $.ajax({
                        url: "fee_submit.php",
                        type: "POST",
                        data: {
                            username: username,
                            registerId: registerId,
                            semester_fee: semester_fee,
                            exam_fee: exam_fee,
                            course: course,
                            other_fee: other_fee,
                            payment: payment,
                            add: add
                        },
                        success: function(data) {
                            if (data == 1) {
                                swal({
                                    title: "Thank You!" + username,
                                    text: "Your Fees Has Been Submited Successfully",
                                    icon: "success",
                                    button: "Okay",
                                }).then(function() {
                                    window.location = "fee_receipt.php";
                                });
                            } else {
                                $("#passErr").hide();
                                $("#nameErr").show().css({
                                    "color": "red"
                                }).html("**Fees Not Submitted Successfully.**");
                            }
                        }
                    });
                    return true;
                } else {
                    return false;
                }
            } else if ($(event.target).attr('id') == 'upiId') {
                stuName = $("#firstName").val();
                var floatingInputUpi = $("#floatingInputUpi").val();
                userTrue = true;
                registerTrue = true;
                courseErr = true;
                paymentErr = true;
                usernameCheck();
                registerCheck();
                courseCheck();
                username = $("#name").val();
                registerId = $("#register_id").val();
                var semester_fee = $("#semester_fee").val();
                var other_fee = $("#other_fee").val();
                var exam_fee = $("#exam_fee").val();
                course = $("#course").val();
                var add = $("#Total_fee").val();
                var payment = "By UPI";
                if (floatingInputUpi == "") {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Enter UPI Id**");
                    return false;
                } else {

                    if ((userTrue == true) && (registerTrue == true) && (courseErr == true)) {
                        $.ajax({
                            url: "fee_submit.php",
                            type: "POST",
                            data: {
                                username: username,
                                registerId: registerId,
                                semester_fee: semester_fee,
                                exam_fee: exam_fee,
                                course: course,
                                other_fee: other_fee,
                                payment: payment,
                                add: add
                            },
                            success: function(data) {
                                if (data == 1) {
                                    swal({
                                        title: "Thank You!" + username,
                                        text: "Your Fees Has Been Submited Successfully",
                                        icon: "success",
                                        button: "Okay",
                                    }).then(function() {
                                        window.location = "fee_receipt.php";
                                    });
                                } else {
                                    $("#passErr").hide();
                                    $("#nameErr").show().css({
                                        "color": "red"
                                    }).html("**Fees Not Submitted Successfully.**");
                                }
                            }
                        });
                        return true;
                    } else {
                        return false;
                    }
                }
            } else if ($(event.target).attr('id') == 'byCard') {
                var cardNumber = $("#floatingInputCardNumber").val();
                var expMonth = $("#expMonth").val();
                var expYear = $("#expYear").val();
                var cvv = $("#CVV").val();
                userTrue = true;
                registerTrue = true;
                courseErr = true;
                usernameCheck();
                registerCheck();
                courseCheck();
                username = $("#name").val();
                registerId = $("#register_id").val();
                var semester_fee = $("#semester_fee").val();
                var other_fee = $("#other_fee").val();
                var exam_fee = $("#exam_fee").val();
                course = $("#course").val();
                var add = $("#Total_fee").val();
                var payment = "By Card";
                if (cardNumber == "") {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Please Fill Card Number.**");
                    return false;
                } else if (cardNumber.length != 16) {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Please Fill 16 digit Card Number.**");
                    return false;
                } else if (expMonth == "") {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Please Fill expiry Month.**");
                    return false;
                } else if (expYear == "") {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Please Fill Expiry Year.**");
                    return false;
                } else if (cvv == "") {
                    $("#paymentErr").show().css({
                        "color": "red"
                    }).html("**Please Fill 3 digit cvv Number.**");
                    return false;
                } else {
                    if ((userTrue == true) && (registerTrue == true) && (courseErr == true)) {
                        $.ajax({
                            url: "fee_submit.php",
                            type: "POST",
                            data: {
                                username: username,
                                registerId: registerId,
                                semester_fee: semester_fee,
                                exam_fee: exam_fee,
                                course: course,
                                other_fee: other_fee,
                                payment: payment,
                                add: add
                            },
                            success: function(data) {
                                if (data == 1) {
                                    swal({
                                        title: "Thank You!" + username,
                                        text: "Your Fees Has Been Submited Successfully",
                                        icon: "success",
                                        button: "Okay",
                                    }).then(function() {
                                        window.location = "fee_receipt.php";
                                    });
                                } else {
                                    $("#passErr").hide();
                                    $("#nameErr").show().css({
                                        "color": "red"
                                    }).html("**Fees Not Submitted Successfully.**");
                                }
                            }
                        });
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        });
    });

    function exp_month() {
        var expMonth = $('#expMonth').val();
        if (expMonth < 1) {
            $("#paymentErr").show().css({
                "color": "red"
            }).html("**Please Fill Correct Month like 01 to 12.**");
            return false;
        } else if (expMonth > 12) {
            $("#paymentErr").show().css({
                "color": "red"
            }).html("**Please Fill Correct Month like 01 to 12.**");
            return false;
        }
    }

    function exp_year() {
        var expYear = $('#expYear').val();
        var length = expYear.length;
        var date = '<?php echo Date('Y') ?>';
        if (length == 4) {
            if (expYear < date) {
                $("#paymentErr").show().css({
                    "color": "red"
                }).html("**Please Enter the Correct Year above the cuhrrent Year.**");
                return false;
            }
        }
    }

    function fee() {
        var fee = $("#course").val();
        $.ajax({
            url: "fetchFee.php",
            type: "POST",
            data: {
                fee: fee
            },
            success: function(data) {
                var fees = data.split(',');
                $('#semester_fee').val(fees[0]);
                $('#other_fee').val(fees[1]);
                $('#exam_fee').val(fees[2]);
                var total_fee = Number(fees[0]) + Number(fees[1]) + Number(fees[2]);
                $('#Total_fee').val(total_fee);
                $('#phonePe').val(total_fee);
                $('#upiId').val(total_fee);
                $('#byCard').val(total_fee);
            }
        });
    }
</script>
<?php include_once "footer.php"; ?>