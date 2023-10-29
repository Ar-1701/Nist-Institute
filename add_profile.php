<?php include_once 'header.php';
include_once 'config.php'; ?>
<section class="" style="margin:10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <?php
                    $userId = $_SESSION["user_id"];
                    $sql1 = "SELECT approval FROM teacher_profile WHERE userId = {$userId}";
                    $result1 = mysqli_query($conn, $sql1) or die("SQL FAILED");
                    if (mysqli_num_rows($result1) > 0) {
                        $row1 = mysqli_fetch_assoc($result1);
                        if ($row1['approval'] == 1) { ?>
                            <div class="card-header d-flex justify-content-between">
                                <h4 class='card-title'>Edit Profile</h4>
                            </div>
                        <?php } else { ?>
                            <div class="card-header d-flex justify-content-between">
                                <h4 class='card-title'>Add Profile</h4>
                            </div>
                        <?php
                        }
                    }
                    $sql = "SELECT * FROM teacher_profile WHERE userId = {$userId}";
                    $result = mysqli_query($conn, $sql) or die("SQL FAILED");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $aa = $row['tutoring_sub'];
                            $sub = explode(",", $aa);
                        ?>
                            <form method="post" action="save_profile.php" enctype="multipart/form-data">
                                <div class="card-body admin-profile-aligment">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="user-detail-input-box">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Mobile Number:</label>
                                                            <input type="hidden" class="form-control" id="id" value="<?php echo $userId ?>" name="id">
                                                            <input type="text" class="form-control" id="number" value="<?php echo $row['number']; ?>" name="number" placeholder="Enter Your Whatsapp Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label">Street Address:</label>
                                                        <input type="text" placeholder="Enter Permanent Address" value="<?php echo $row['address1']; ?>" class="form-control" id="address1" name="address1" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label">Street Address Line 2:</label>
                                                        <input type="text" placeholder="Enter Street Address" value="<?php echo $row['address2']; ?>" class="form-control" id="address2" name="address2" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label">City:</label>
                                                        <input type="text" placeholder="Enter City" value="<?php echo $row['city']; ?>" class="form-control" id="city" name="city" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label">State / Province:</label>
                                                        <input type="text" placeholder="Enter State" value="<?php echo $row['state']; ?>" class="form-control" id="state" name="state" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label class="form-label">Pincode:</label>
                                                        <input type="text" placeholder="Enter Pincode" value="<?php echo $row['pincode']; ?>" class="form-control" id="pincode" name="pincode" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Tutoring Subjects:&emsp;</label>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="c/c++" <?php
                                                                                                                                                if (in_array("c/c++", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">C/C++</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value=".NET" <?php
                                                                                                                                                if (in_array(".NET", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">.NET</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="web designing" <?php
                                                                                                                                                        if (in_array("web designing", $sub)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        };
                                                                                                                                                        ?>>
                                                            <label class="form-check-label" for="sub">Web Designing</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="data structure" <?php
                                                                                                                                                            if (in_array("data structure", $sub)) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            };
                                                                                                                                                            ?>>
                                                            <label class="form-check-label" for="sub">Data Structure</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="dbms/rdbms" <?php
                                                                                                                                                        if (in_array("dbms/rdbms", $sub)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        };
                                                                                                                                                        ?>>
                                                            <label class="form-check-label" for="sub">DBMS / RDBMS</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="sql/mysql" <?php
                                                                                                                                                    if (in_array("sql/mysql", $sub)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    };
                                                                                                                                                    ?>>
                                                            <label class="form-check-label" for="sub">SQL / MYSQL</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="android" <?php
                                                                                                                                                    if (in_array("android", $sub)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    };
                                                                                                                                                    ?>>
                                                            <label class="form-check-label" for="sub">ANDROID</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="php" <?php
                                                                                                                                                if (in_array("php", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">PHP</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="java" <?php
                                                                                                                                                if (in_array("java", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">JAVA</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="python" <?php
                                                                                                                                                    if (in_array("python", $sub)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    };
                                                                                                                                                    ?>>
                                                            <label class="form-check-label" for="sub">Python</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="ccc" <?php
                                                                                                                                                if (in_array("ccc", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">CCC</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="o-level" <?php
                                                                                                                                                    if (in_array("o-level", $sub)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    };
                                                                                                                                                    ?>>
                                                            <label class="form-check-label" for="sub">O-LEVEL</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="other" <?php
                                                                                                                                                if (in_array("other", $sub)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                };
                                                                                                                                                ?>>
                                                            <label class="form-check-label" for="sub">Other</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label>Upload Graduation Degree:</label>
                                                            <input type="file" name="new-degree" class="form-control">
                                                            <img src="admin/upload/teacher/<?php echo $_SESSION["username"] . "/" . $row['graduation_degree']; ?>" width="100px" height="100px" alt="uploaded file">
                                                            <input type="hidden" name="old-degree" value="<?php echo $row['graduation_degree']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label>Upalod Resume:</label>
                                                            <input type="file" name="new-resume" class="form-control">
                                                            <img src="admin/upload/teacher/<?php echo $_SESSION["username"] . "/" . $row['resume']; ?>" width="100px" height="100px" alt="uploaded file">
                                                            <input type="hidden" name="old-resume" value="<?php echo $row['resume']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label>Upload Aadhar Card:</label>
                                                            <input type="file" name="new-adharcard" class="form-control">
                                                            <img src="admin/upload/teacher/<?php echo $_SESSION["username"] . "/" . $row['adharcard']; ?>" width="100px" height="100px" alt="uploaded file">
                                                            <input type="hidden" name="old-adharcard" value="<?php echo $row['adharcard']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" id="submit" class="btn btn-primary" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php }
                    } else { ?>
                        <form method="post" action="save_profile.php" enctype="multipart/form-data">
                            <div class="card-body admin-profile-aligment">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user-detail-input-box">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile Number:</label>
                                                        <input type="text" class="form-control" id="number" name="number" placeholder="Enter Your Whatsapp Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 10">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Street Address:</label>
                                                    <input type="text" placeholder="Enter Permanent Address" class="form-control" id="address1" name="address1" autocomplete="off">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Street Address Line 2:</label>
                                                    <input type="text" placeholder="Enter Street Address" class="form-control" id="address2" name="address2" autocomplete="off">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">City:</label>
                                                    <input type="text" placeholder="Enter City" class="form-control" id="city" name="city" autocomplete="off">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">State / Province:</label>
                                                    <input type="text" placeholder="Enter State" class="form-control" id="state" name="state" autocomplete="off">
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <label class="form-label">Pincode:</label>
                                                    <input type="text" placeholder="Enter Pincode" class="form-control" id="pincode" name="pincode" autocomplete="off">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Tutoring Subjects:&emsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="c/c++">
                                                        <label class="form-check-label" for="sub">C/C++</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value=".NET">
                                                        <label class="form-check-label" for="sub">.NET</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="web designing">
                                                        <label class="form-check-label" for="sub">Web Designing</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="data structure">
                                                        <label class="form-check-label" for="sub">Data STRUCTURE</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="dbms/rdbms">
                                                        <label class="form-check-label" for="sub">DBMS / RDBMS</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="sql/mysql">
                                                        <label class="form-check-label" for="sub">SQL / MYSQL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="android">
                                                        <label class="form-check-label" for="sub">ANDROID</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="php">
                                                        <label class="form-check-label" for="sub">PHP</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="java">
                                                        <label class="form-check-label" for="sub">JAVA</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="python">
                                                        <label class="form-check-label" for="sub">Python</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="ccc">
                                                        <label class="form-check-label" for="sub">CCC</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="o-level">
                                                        <label class="form-check-label" for="sub">O-LEVEL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="sub" name="sub[]" value="other">
                                                        <label class="form-check-label" for="sub">Other</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label>Upload Graduation Degree:</label>
                                                        <input type="file" name="degree" id="degree" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label>Upalod Resume:</label>
                                                        <input type="file" name="resume" id="resume" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label>Upload Aadhar Card:</label>
                                                        <input type="file" name="adharcard" id="adharcard" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="submit" id="submit" class="btn btn-primary" value="Submit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('section .container').focus();
        $(window).scrollTop($('section .container').position().top);
        $("#submit").click(function() {

            let num = $("#number").val();
            let address1 = $("#address1").val();
            let address2 = $("#address2").val();
            let city = $("#city").val();
            let state = $("#state").val();
            let pincode = $("#pincode").val();
            let degree = $("#degree").val();
            let resume = $("#resume").val();
            let adharcard = $("#adharcard").val();

            if (num == "") {
                alert("Fill valid Mobile Number");
                $('#number').focus();
                return false;
            } else if (address1 == "") {
                alert("Fill Street Address Line 1");
                $('#address1').focus();
                return false;
            } else if (address2 == "") {
                alert("Fill Street Address Line 2");
                $('#address2').focus();
                return false;
            } else if (city == "") {
                alert("Fill City");
                $('#city').focus();
                return false;
            } else if (state == "") {
                alert("Fill State");
                $('#state').focus();
                return false;
            } else if (pincode == "") {
                alert("Fill Pincode");
                $('#pincode').focus();
                return false;
            } else if (!$("input[id=sub]").is(":checked")) {
                alert("Select Subject You Want To Teach.");
                return false;
            } else if (degree == "") {
                alert("Upload Graduation Degree");
                $('#degree').focus();
                return false;
            } else if (resume == "") {
                alert("Upload Resume.");
                $('#resume').focus();
                return false;
            } else if (adharcard == "") {
                alert("upload Aadhar Card");
                $('#adharcard').focus();
                return false;
            }
        });
    });
</script>
<?php include_once 'footer.php'; ?>