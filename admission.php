<?php $active_page = 'addmission';
include_once "header.php";
include_once "config.php"; ?>
<!-- Main-content -->
<div class="container add_content">
    <div id="errorMsg"></div>
    <div class="row">
        <div class="col">
            <form action="final_submit.php" enctype="multipart/form-data" method="post" id="final_submit" autocomplete="off">
                <div id="addmission_pg_1" class="row p-2">
                    <h2 class="add_heading">Addmission form </h2>
                    <span class="text-danger">*All Fields Are Mandatory to fill.</span>
                    <div class="row">
                        <label class="form-label">Full Name:</label>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="hidden" name="stuId" value="<?php echo $_SESSION["user_id"]; ?>" />
                            <input type="text" class="form-control" placeholder="First name" name="firstName" id="firstName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="Last name" name="lastName" id="lastName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label">D.O.B.:</label>
                        <input type="date" class="form-control" name="dob" id="dob">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" placeholder="Enter phone Number" name="mobile" id="mobile" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 10">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label">Email:</label>
                        <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Course:</label>
                        <select class="form-control form-select" name="course" id="course">
                            <option disabled selected value="">Please Select Course</option>
                            <?php
                            $sql = "SELECT * FROM course";
                            $result = mysqli_query($conn, $sql) or die("Query Failed.");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <option value='<?php echo $row['id']; ?>'>
                                        <?php echo $row['course_name']; ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="add_fees" id="add_fees" autocomplete="off">
                    <input type="hidden" class="form-control" name="fees" id="fees" autocomplete="off">
                    <input type="hidden" class="form-control" name="otherfee" id="otherfee" autocomplete="off">
                    <input type="hidden" class="form-control" name="totalFee" id="totalFee" autocomplete="off">
                    <div class="col-md-6 mb-2 col-sm-12">
                        <label class="form-group">Gender:</label>
                        <div class="form-check form-check-inline mx-3">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                    </div>
                    <p class="form-label text-center mb-3 h4"><u>Parent's Details</u></p>
                    <div class="row">
                        <label class="form-label">Father's / Gaurdian's Name:</label>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="First name" name="fatherFirstName" id="fatherFirstName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="Last name" name="fatherLastName" id="fatherLastName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label">Mother's Name:</label>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="First name" name="motherFirstName" id="motherFirstName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <input type="text" class="form-control" placeholder="Last name" name="motherLastName" id="motherLastName" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Father's / Guardian's Occupation:</label>
                        <input type="text" placeholder="Enter Occupation" class="form-control" name="fatherOccupation" id="fatherOccupation" autocomplete="off" onkeypress="return !(event.charCode >= 33 && event.charCode <= 64 || event.charCode >=91  && event.charCode <= 96|| event.charCode >=123  && event.charCode <= 126)||event.charCode == 46">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Father's / Guardian's Phone:</label>
                        <input type="text" class="form-control" placeholder="Enter phone Number" name="fatherNumber" id="fatherNumber" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 10">
                    </div>

                    <p class="form-label text-center m-3 h4"><u>Address</u></p>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Permanent Address:</label>
                        <input type="text" placeholder="Enter Full Address" class="form-control" name="perAddress" id="perAddress" autocomplete="off">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Street Address Line 2:</label>
                        <input type="text" placeholder="Enter Street Full Address" class="form-control" name="address2" id="address2" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">City:</label>
                        <input type="text" placeholder="Enter City" class="form-control" name="city" id="city" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">State / Province:</label>
                        <input type="text" placeholder="Enter State" class="form-control" name="state" id="state" autocomplete="off">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Pincode:</label>
                        <input type="text" placeholder="Enter Pincode" class="form-control" name="pincode" id="pincode" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57  && value.length < 6">
                    </div>
                    <div class="col-md-12 text-end">
                        <input type="submit" class="btn btn-success" id="nextbtn" value="Next" />
                    </div>
                </div>

                <!-- --------------------- FORM 2 ---------------------------------------- -->
                <div class="row p-2" id="addmission_pg_2">
                    <p class="form-label text-center mb-4 h3 "><u>Education</u></p>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Upload Your Photo:</label>
                        <input type="file" class="form-control image-input" id="stuImg" name="stuImg" accept="image/jpeg,image/png,jpg|png">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">High School Marksheet:</label>
                        <input type="file" class="form-control image-input" id="highschool" name="highschool" accept="image/jpeg,image/png,jpg|png">
                    </div>
                    <div class="col-md-6 mb-2"><label class="form-label">Intermediate Marksheet:</label>
                        <input type="file" class="form-control image-input" id="interMarksheet" name="interMarksheet" accept="image/jpeg,image/png,jpg|png">
                    </div>
                    <div class="col-md-6 mb-2"><label class="form-label">Aadhar Card Image:</label>
                        <input type="file" class="form-control image-input" id="aadharcard" name="aadharcard" accept="image/jpeg,image/png,jpg|png">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">percentage Of 12<sup>th</sup></label>
                        <input type="text" class="form-control" name="percent12" id="percent12" onkeypress="return value.length < 2">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Year Of Passing</label>
                        <input type="text" class="form-control" name="yearOfPass" id="yearOfPass" placeholder="Enter 12th passing Year" onkeypress="return event.charCode >= 48 && event.charCode <= 57  && value.length < 4">
                    </div>
                    <div class="col-md-12 d-flex justify-content-between">
                        <input type="button" class="btn btn-primary" id="back" value="Back">
                        <input type="submit" class="btn btn-success" id="nextbtn2" value="Next" on>
                    </div>
                </div>
                <!-- ------------------------------- FORM 3 ---------------------------------------- -->
                <div class="row p-2" id="addmission_pg_3">
                    <p class="form-label h3">Application Fee</p>
                    <span>Payment is due 3 days prior to the start of the class</span>
                    <hr class="hr" />
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" id="cardBtn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <img src="image/credit-card.png" class="payment_img" />Credit/Debit/ATM Card
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 m-3">
                                            <div class="form-floating mb-1">
                                                <input type="text" class="form-control" id="floatingInputCardNumber" placeholder="name@example.com" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 16">
                                                <label for="floatingInputCardNumber">Enter Card Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12 mb-2 ms-3">
                                            <label class="form-label">Exp Month</label>
                                            <input type="text" class="form-control" placeholder="01" name="expMonth" id="expMonth" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 2" oninput="exp_month()">
                                        </div>
                                        <div class="col-md-2 col-sm-12 mb-2">
                                            <label class="form-label">Exp Year</label>
                                            <input type="text" class="form-control" placeholder="2022" name="expYear" id="expYear" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 4" oninput="exp_year()">
                                        </div>
                                        <div class="col-md-1 col-sm-12 mb-2">
                                            <label class="form-label">CVV</label>
                                            <input type="password" class="form-control" placeholder="CVV" name="CVV" id="CVV" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 3">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ms-3 mb-2">
                                        <input type="submit" class="btn btn-success" id="byCard" name="byCard" value="PAY">
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
                                                    <div class="col-md-4">
                                                        <input type="submit" class="btn btn-success" id="phonePe" name="phonePe" value="PAY">
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
                                                    <div class="col-md-8">
                                                        <div class="form-floating m-1">
                                                            <input type="text" class="form-control" id="floatingInputUpi" placeholder="">
                                                            <label for="floatingInputUpi">Your UPI ID</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="submit" class="btn btn-success" id="upiId" name="upiId" value="PAY">
                                                    </div>
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
<!-- footer -->
<script src="js/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addmission_pg_1').focus();
        $(window).scrollTop($('#addmission_pg_1').position().top);
        var pattern = {
            name: /^[A-Za-z\s.]{3,15}$/,
            lname: /^[A-Za-z]{3,}$/,
            email: /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,10}$/,
            percentage: /^[0-9]{2}$/
        }
        // Form -1 Button
        $("#nextbtn").click(function(e) {
            e.preventDefault();
            var stuName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var dob = $("#dob").val();
            var gender = $('input[id=gender]:checked').val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();
            var course = $("#course").val();
            var fatherFirstName = $("#fatherFirstName").val();
            var fatherLastName = $("#fatherLastName").val();
            var motherFirstName = $("#motherFirstName").val();
            var motherLastName = $("#motherLastName").val();
            var fatherOccupation = $("#fatherOccupation").val();
            var fatherNumber = $("#fatherNumber").val();
            var perAddress = $("#perAddress").val();
            var address2 = $("#address2").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var pincode = $("#pincode").val();

            if (stuName == "") {
                $('#firstName').addClass('addError');
                $("#errorMsg").html("Please Fill Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#firstName').focus();
                $(window).scrollTop($('#firstName').position().top);
                return false;
            } else if (!pattern.name.test(stuName)) {
                $('#firstName').addClass('addError');
                $("#errorMsg").html("Invalid Name.<br>Number & Special Character Are Not Allowed").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#firstName').focus();
                $(window).scrollTop($('#firstName').position().top);
                return false;
            } else if (lastName == '') {
                $('#lastName').addClass('addError');
                $("#errorMsg").html("Please Fill Last Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#lastName').focus();
                $(window).scrollTop($('#lastName').position().top);
                return false;
            } else if (!pattern.lname.test(lastName)) {
                $('#lastName').addClass('addError');
                $("#errorMsg").html("Invalid Last Name.<br> Spaces Are Not Allow").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#lastName').focus();
                $(window).scrollTop($('#lastName').position().top);
                return false;
            } else if (dob == '') {
                $('#dob').addClass('addError');
                $("#errorMsg").html("Please Select DOB.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#dob').focus();
                $(window).scrollTop($('#dob').position().top);
                return false;
            } else if (mobile == '') {
                $('#mobile').addClass('addError');
                $("#errorMsg").html("Please Fill Mobile Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#mobile').focus();
                $(window).scrollTop($('#mobile').position().top);
                return false;
            } else if (mobile.length != 10) {
                $('#mobile').addClass('addError');
                $("#errorMsg").html("Please Fill 10 Digit Mobile Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#mobile').focus();
                $(window).scrollTop($('#mobile').position().top);
                return false;
            } else if (email == '') {
                $('#email').addClass('addError');
                $("#errorMsg").html("Please Fill Email Id.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#email').focus();
                $(window).scrollTop($('#email').position().top);
                return false;
            } else if (!pattern.email.test(email)) {
                $('#email').addClass('addError');
                $("#errorMsg").html("Invalid Email Id.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#email').focus();
                $(window).scrollTop($('#email').position().top);
                return false;
            } else if (course == null) {
                $('#course').addClass('addError');
                $("#errorMsg").html("Please Select Course.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#course').focus();
                $(window).scrollTop($('#course').position().top);
                return false;
            } else if (gender == null) {
                $('#gender').addClass('addError');
                $("#errorMsg").html("Please Check atleast One Gender.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#gender').focus();
                $(window).scrollTop($('#gender').position().top);
                return false;
            } else if (fatherFirstName == '') {
                $('#fatherFirstName').addClass('addError');
                $("#errorMsg").html("Please Fill Father's Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherFirstName').focus();
                $(window).scrollTop($('#fatherFirstName').position().top);
                return false;
            } else if (!pattern.name.test(fatherFirstName)) {
                $('#fatherFirstName').addClass('addError');
                $("#errorMsg").html("Invalid Father's Name.<br>Number & Special Character Are Not Allowed").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherFirstName').focus();
                $(window).scrollTop($('#fatherFirstName').position().top);
                return false;
            } else if (fatherLastName == '') {
                $('#fatherLastName').addClass('addError');
                $("#errorMsg").html("Please Fill Father's Last Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherLastName').focus();
                $(window).scrollTop($('#fatherLastName').position().top);
                return false;
            } else if (!pattern.lname.test(fatherLastName)) {
                $('#fatherLastName').addClass('addError');
                $("#errorMsg").html("Invalid Father's Last Name.<br> Spaces Are Not Allow").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherLastName').focus();
                $(window).scrollTop($('#fatherLastName').position().top);
                return false;
            } else if (motherFirstName == '') {
                $('#motherFirstName').addClass('addError');
                $("#errorMsg").html("Please Fill Mother's Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#motherFirstName').focus();
                $(window).scrollTop($('#motherFirstName').position().top);
                return false;
            } else if (!pattern.name.test(motherFirstName)) {
                $('#motherFirstName').addClass('addError');
                $("#errorMsg").html("Invalid Mother's Name.<br>Number & Special Character Are Not Allowed").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#motherFirstName').focus();
                $(window).scrollTop($('#motherFirstName').position().top);
                return false;
            } else if (motherLastName == '') {
                $('#motherLastName').addClass('addError');
                $("#errorMsg").html("Please Fill Mother's Last Name.<br> Spaces Are Not Allow").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#motherLastName').focus();
                $(window).scrollTop($('#motherLastName').position().top);
                return false;
            } else if (!pattern.lname.test(motherLastName)) {
                $('#motherLastName').addClass('addError');
                $("#errorMsg").html("Invalid Mother's Last Name.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#motherLastName').focus();
                $(window).scrollTop($('#motherLastName').position().top);
                return false;
            } else if (fatherOccupation == '') {
                $('#fatherOccupation').addClass('addError');
                $("#errorMsg").html("Please Fill Father's Occupation.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherOccupation').focus();
                $(window).scrollTop($('#fatherOccupation').position().top);
                return false;
            } else if (fatherNumber == '') {
                $('#fatherNumber').addClass('addError');
                $("#errorMsg").html("Please Fill Parent's Mobile Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherNumber').focus();
                $(window).scrollTop($('#fatherNumber').position().top);
                return false;
            } else if (fatherNumber.length != 10) {
                $('#fatherNumber').addClass('addError');
                $("#errorMsg").html("Please Fill 10 Digit Mobile Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherNumber').focus();
                $(window).scrollTop($('#fatherNumber').position().top);
                return false;
            } else if (fatherNumber == mobile) {
                $('#fatherNumber').addClass('addError');
                $("#errorMsg").html("Please Fill Another Number").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#fatherNumber').focus();
                $(window).scrollTop($('#fatherNumber').position().top);
                return false;
            } else if (perAddress == '') {
                $('#perAddress').addClass('addError');
                $("#errorMsg").html("Please Fill Permanent Address").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#perAddress').focus();
                $(window).scrollTop($('#perAddress').position().top);
                return false;
            } else if (address2 == '') {
                $('#address2').addClass('addError');
                $("#errorMsg").html("Please Fill Permanent Address").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#address2').focus();
                $(window).scrollTop($('#address2').position().top);
                return false;
            } else if (city == '') {
                $('#city').addClass('addError');
                $("#errorMsg").html("Please Fill City").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#city').focus();
                $(window).scrollTop($('#city').position().top);
                return false;
            } else if (state == '') {
                $('#state').addClass('addError');
                $("#errorMsg").html("Please Fill State").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#state').focus();
                $(window).scrollTop($('#state').position().top);
                return false;
            } else if (pincode == '') {
                $('#pincode').addClass('addError');
                $("#errorMsg").html("Please Fill Pincode").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#pincode').focus();
                $(window).scrollTop($('#pincode').position().top);
                return false;
            } else if (pincode.length != 6) {
                $('#pincode').addClass('addError');
                $("#errorMsg").html("Please Fill 6 digit Pincode").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#pincode').focus();
                $(window).scrollTop($('#pincode').position().top);
                return false;
            } else {
                $("#addmission_pg_1").hide();
                $("#addmission_pg_3").hide();
                $("#addmission_pg_2").show();
                $("#addmission_pg_2").css({
                    "display": "flex"
                });
                $("#back").click(function() {
                    $("#addmission_pg_1").show();
                    $("#addmission_pg_2").hide();
                    $("#addmission_pg_3").hide();
                });
            }
        });
        // Form -2 Fields
        $("#nextbtn2").click(function(e) {
            e.preventDefault();
            var stuImg = $("#stuImg");
            var highschool = $("#highschool");
            var interMarksheet = $("#interMarksheet");
            var aadharcard = $("#aadharcard");
            var percent12 = $("#percent12").val();
            var yearOfPass = $("#yearOfPass").val();
            var date = '<?php echo Date('Y') ?>';
            var lessPer = 45;
            if (stuImg.val() == '') {
                $('#stuImg').addClass('addError');
                $("#errorMsg").html("Please Upload Your Image").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#stuImg').focus();
                $(window).scrollTop($('#stuImg').position().top);
                return false;
            } else if (!(/\.(jpg|jpeg|png|JPG|JPEG|PNG)$/i).test(stuImg.val())) {
                $('#stuImg').addClass('addError');
                $("#errorMsg").html("This extension file not allowed,\n Please choose a JPG,JPEG & PNG file.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#stuImg').focus();
                $(window).scrollTop($('#stuImg').position().top);
                return false;
            } else if (highschool.val() == '') {
                $('#highschool').addClass('addError');
                $("#errorMsg").html("Please Upload Your highschool Marksheet").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#highschool').focus();
                $(window).scrollTop($('#highschool').position().top);
                return false;
            } else if (!(/\.(jpg|jpeg|png|JPG|JPEG|PNG)$/i).test(highschool.val())) {
                $('#highschool').addClass('addError');
                $("#errorMsg").html("This extension file not allowed,\n Please choose a JPG,JPEG & PNG file.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#highschool').focus();
                $(window).scrollTop($('#highschool').position().top);
                return false;
            } else if (interMarksheet.val() == '') {
                $('#interMarksheet').addClass('addError');
                $("#errorMsg").html("Please Upload Your Inter Marksheet").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#interMarksheet').focus();
                $(window).scrollTop($('#interMarksheet').position().top);
                return false;
            } else if (!(/\.(jpg|jpeg|png|JPG|JPEG|PNG)$/i).test(interMarksheet.val())) {
                $('#interMarksheet').addClass('addError');
                $("#errorMsg").html("This extension file not allowed,\n Please choose a JPG,JPEG & PNG file.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#interMarksheet').focus();
                $(window).scrollTop($('#interMarksheet').position().top);
                return false;
            } else if (aadharcard.val() == '') {
                $('#aadharcard').addClass('addError');
                $("#errorMsg").html("Please Upload Your Adhar Card").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#aadharcard').focus();
                $(window).scrollTop($('#aadharcard').position().top);
                return false;
            } else if (!(/\.(jpg|jpeg|png|JPG|JPEG|PNG)$/i).test(aadharcard.val())) {
                $('#aadharcard').addClass('addError');
                $("#errorMsg").html("This extension file not allowed,\n Please choose a JPG,JPEG & PNG file.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#aadharcard').focus();
                $(window).scrollTop($('#aadharcard').position().top);
                return false;
            } else if (percent12 == '') {
                $('#percent12').addClass('addError');
                $("#errorMsg").html("Please Fill Your 12th Percentage").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#percent12').focus();
                $(window).scrollTop($('#percent12').position().top);
                return false;
            } else if (percent12 < lessPer) {
                $('#percent12').addClass('addError');
                $("#errorMsg").html("You are not Eligible For This Course.<br> Your Percentage is Below 45%").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#percent12').focus();
                $(window).scrollTop($('#percent12').position().top);
                return false;
            } else if (!pattern.percentage.test(percent12)) {
                $('#percent12').addClass('addError');
                $("#errorMsg").html("Please Enter % mark").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#percent12').focus();
                $(window).scrollTop($('#percent12').position().top);
                return false;
            } else if (yearOfPass == '') {
                $('#yearOfPass').addClass('addError');
                $("#errorMsg").html("Please Fill Your 12th Passing Year").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#yearOfPass').focus();
                $(window).scrollTop($('#yearOfPass').position().top);
                return false;
            } else if (yearOfPass > date) {
                $('#yearOfPass').addClass('addError');
                $("#errorMsg").html("Please Enter Correct Passing Year Of 10 Or 12.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#yearOfPass').focus();
                $(window).scrollTop($('#yearOfPass').position().top);
                return false;
            } else if (yearOfPass.length != 4) {
                $('#yearOfPass').addClass('addError');
                $("#errorMsg").html("Please Fill Valid Date").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#yearOfPass').focus();
                $(window).scrollTop($('#yearOfPass').position().top);
                return false;
            } else {
                $("#addmission_pg_1").hide();
                $("#addmission_pg_2").hide();
                $("#addmission_pg_3").show();
                $("#addmission_pg_3").css({
                    "display": "flex"
                });
                $("#back1").click(function() {
                    $("#addmission_pg_1").hide();
                    $("#addmission_pg_3").hide();
                    $("#addmission_pg_2").show();
                    $("#addmission_pg_2").css({
                        "display": "flex"
                    });
                });
            }
        });
        // Payment Method
        $("#byCard").click(function() {
            var cardNumber = $("#floatingInputCardNumber").val();
            var expMonth = $("#expMonth").val();
            var expYear = $("#expYear").val();
            var cvv = $("#CVV").val();
            if (cardNumber == "") {
                $('#floatingInputCardNumber').addClass('addError');
                $("#errorMsg").html("Please Fill Card Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#floatingInputCardNumber').focus();
                $(window).scrollTop($('#floatingInputCardNumber').position().top);
                return false;
            } else if (cardNumber.length != 16) {
                $('#floatingInputCardNumber').addClass('addError');
                $("#errorMsg").html("Please Fill 16 digit Card Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#floatingInputCardNumber').focus();
                $(window).scrollTop($('#floatingInputCardNumber').position().top);
                return false;
            } else if (expMonth == "") {
                $('#expMonth').addClass('addError');
                $("#errorMsg").html("Please Fill expiry Month.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#expMonth').focus();
                $(window).scrollTop($('#expMonth').position().top);
                return false;
            } else if (expYear == "") {
                $('#expYear').addClass('addError');
                $("#errorMsg").html("Please Fill Expiry Year.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#expYear').focus();
                $(window).scrollTop($('#expYear').position().top);
                return false;
            } else if (cvv == "") {
                $('#CVV').addClass('addError');
                $("#errorMsg").html("Please Fill 3 digit cvv Number.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#CVV').focus();
                $(window).scrollTop($('#CVV').position().top);
                return false;
            }
        });
        $("#upiId").click(function() {
            stuName = $("#firstName").val();
            var floatingInputUpi = $("#floatingInputUpi").val();
            if (floatingInputUpi == "") {
                $('#floatingInputUpi').addClass('addError');
                $("#errorMsg").html("Please Fill Valid UPI ID.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#floatingInputUpi').focus();
                $(window).scrollTop($('#floatingInputUpi').position().top);
                return false;
            }
        });
        $("#course").change(function() {
            var fee = $("#course").val();
            $.ajax({
                url: "fetchFee.php",
                type: "POST",
                data: {
                    fee: fee
                },
                success: function(data) {
                    var fees = data.split(',');
                    $('#fees').val(fees[0]);
                    $('#otherfee').val(fees[2]);
                    $('#add_fees').val(fees[3]);
                    var total_fee = Number(fees[0]) + Number(fees[2]) + Number(fees[3]);
                    $('#upiId').val("PAY " + total_fee);
                    $('#totalFee').val(total_fee);
                    $('#byCard').val("PAY " + total_fee);
                    $('#phonePe').val("PAY " + total_fee);
                }
            });
        });
    });
</script>
<script>
    function exp_month() {
        var expMonth = $('#expMonth').val();
        if (expMonth < 1) {
            $('#expMonth').addClass('addError');
            $("#errorMsg").html("Please Fill Correct Month like 01 to 12.").slideDown();
            $("#errorMsg").fadeOut(5000);
            $('#expMonth').focus();
            $(window).scrollTop($('#expMonth').position().top);
            return false;
        } else if (expMonth > 12) {
            $('#expMonth').addClass('addError');
            $("#errorMsg").html("Please Fill Correct Month like 01 to 12.").slideDown();
            $("#errorMsg").fadeOut(5000);
            $('#expMonth').focus();
            $(window).scrollTop($('#expMonth').position().top);
            return false;
        }
    }

    function exp_year() {
        var expYear = $('#expYear').val();
        var length = expYear.length;
        var date = '<?php echo Date('Y') ?>';
        if (length == 4) {
            if (expYear < date) {
                $('#expYear').addClass('addError');
                $("#errorMsg").html("Please Enter the Correct Year above the cuhrrent Year.").slideDown();
                $("#errorMsg").fadeOut(5000);
                $('#expYear').focus();
                $(window).scrollTop($('#expYear').position().top);
                return false;
            }
        }
    }
</script>
<?php include_once "footer.php"; ?>