<?php $active_page = 'student';
include_once "header.php";
include_once "config.php"; ?>
<section class="" style="margin:10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header d-flex">
                        <h4 class="card-title">Profile</h4>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT tp.id as teacher_profile_id,tp.stuId,tp.stu_name,tp.stu_fname,tp.stu_gender,tp.stu_dob,tp.stu_mname,tp.number,tp.parentNumber,tp.stu_email,tp.perAddress,tp.address2,tp.city,tp.state,tp.pincode,tp.course,
                        tp.percent,tp.yearOfPass,tp.aadharcard,tp.stuImg,cs.course_name,tp.highschool,tp.interMarksheet,tp.aadharcard,u.id as teacher_id,u.name,u.email,u.username,u.img,u.usertype FROM user as u 
                        JOIN admission as tp ON u.id=tp.stuId
                        JOIN course as cs ON tp.course=cs.id
                         WHERE tp.stuId ={$id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $row) { ?>
                            <form class="w-100" id="addmission_pg_1" autocomplete="off">
                                <div class="row align-items-center">
                                    <div class="col-md-3 card-body">
                                        <img src="upload/addmission/<?php echo $row['stu_name'] . "/" . $row['stuImg']; ?>" class="img-fluid rounded-circle" alt="student Image">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_name']; ?>" readonly>
                                    </div><br>
                                    <div class="col-md-4">
                                        <label class="form-label">username:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Father's Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_fname']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label class="form-label">Mother's Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_mname']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Date Of Birth:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_dob']; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gender:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_gender']; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Course:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['course_name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Number:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['number']; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Parent's Number:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['parentNumber']; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['stu_email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">12<sup>th</sup> Percentage:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['percent']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Passing Year:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['yearOfPass']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Permanent Address:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['perAddress']; ?>" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Street Address:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['address2']; ?>" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">City:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['city']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pincode:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['pincode']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">State:</label>
                                    <input type="text" value="<?php echo $row['state']; ?>" class="form-control" readonly>
                                </div>

                                <div class="col-md-12 doc">
                                    <label class="form-label h3">High School Marksheet:</label>
                                    <img src="upload/addmission/<?php echo $row['stu_name'] . "/" . $row['highschool']; ?>" class="img-fluid rounded" alt="user image">
                                </div>
                                <div class="col-md-12 doc">
                                    <label class="form-label h3">intermediate Marksheet:</label>
                                    <img src="upload/addmission/<?php echo $row['stu_name'] . "/" . $row['interMarksheet']; ?>" class="img-fluid rounded " alt="user image">
                                </div>
                                <div class="col-md-12 doc">
                                    <label class="form-label h3">Aadhar Card:</label>
                                    <img src="upload/addmission/<?php echo $row['stu_name'] . "/" . $row['aadharcard']; ?>" class="img-fluid rounded" alt="user image">
                                </div>
                            </form>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>