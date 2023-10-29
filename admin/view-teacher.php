<?php $active_page = 'teacher';
include_once "header.php";
include_once "config.php"; ?>
<section class="" style="margin:10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header d-flex">
                        <h4 class="card-title"><b>Profile</h4>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT tp.id as teacher_profile_id,tp.userId,tp.number,tp.address1,tp.address2,tp.city,tp.state,tp.pincode,tp.tutoring_sub,
                    tp.graduation_degree,tp.resume,tp.adharcard,tp.approval,u.id as teacher_id,u.name,u.email,u.username,u.img,u.usertype FROM user as u 
                    JOIN teacher_profile as tp ON u.id=tp.userId WHERE u.id={$id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $row) { ?>
                            <form class="w-100" id="view_Teacher" autocomplete="off">
                                <div class="row align-items-center">
                                    <div class="col-md-3 card-body">
                                        <img src="upload/user-image/<?php echo $row['img']; ?>" class="img-fluid rounded-circle" alt="user image">
                                    </div>
                                    <div class="col-md-9">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">username:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 ">
                                        <label class="form-label">Number:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['number']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Permanent Address:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['address1']; ?>" readonly>
                                    </div>
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
                                <div class="col-md-12">
                                    <label class="form-label">tutoring Subject:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['tutoring_sub']; ?>" readonly>
                                </div>

                                <div class="col-md-12 doc">
                                    <label class="form-label h3">Graduation Degree:</label>
                                    <img src="upload/teacher/<?php echo $row['name'] . "/" . $row['graduation_degree']; ?>" class="img-fluid rounded" alt="user image">
                                </div>
                                <div class="col-md-12 doc">
                                    <label class="form-label h3">Resume:</label>
                                    <img src="upload/teacher/<?php echo $row['name'] . "/" . $row['resume']; ?>" class="img-fluid rounded " alt="user image">
                                </div>
                                <div class="col-md-12 doc">
                                    <label class="form-label h3">Aadhar Card:</label>
                                    <img src="upload/teacher/<?php echo $row['name'] . "/" . $row['adharcard']; ?>" class="img-fluid rounded" alt="user image">
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