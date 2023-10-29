<?php $active_page = 'teacher';
include_once "header.php";
include_once "config.php"; ?>
<!-- Main-content -->
<div class="container">
    <h1 class="sub">--&#9733;TEACHER'S&#9733;--</h1>
</div>
<div class="container content">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT tp.id as teacher_profile_id,tp.userId,tp.number,tp.address1,tp.address2,tp.city,tp.state,tp.pincode,tp.tutoring_sub,
                    tp.graduation_degree,tp.resume,tp.adharcard,tp.approval,u.id as teacher_id,u.name,u.email,u.username,u.img,u.usertype FROM user as u 
                    JOIN teacher_profile as tp ON u.id=tp.userId WHERE u.usertype=1 and tp.approval=1";
        $result = mysqli_query($conn, $sql) or die("connection Failed");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col">
                    <div class="card teacher_list" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['teacher_id']; ?>">
                        <img src="admin/upload/user-image/<?php echo $row['img']; ?>" class="card-img-top mt-2" alt="teacherImg">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $row['name']; ?></h3>
                            <label class="form-label form-inline">Email:</label>
                            <h6 class="card-title"><?php echo $row['email']; ?></h6><br>
                            <label class="form-label">Subjects:</label>
                            <h6 class="card-title"><?php echo $row['tutoring_sub']; ?></h6>
                        </div>
                    </div>
                </div>
        <?php }
        } else {
            echo "<div class='text-danger'>No Teacher's Found</div>";
        } ?>
    </div>
</div>
<!-- footer -->
<?php include_once "footer.php";
$sql = "SELECT tp.id as teacher_profile_id,tp.userId,tp.number,tp.address1,tp.address2,tp.city,tp.state,tp.pincode,tp.tutoring_sub,
tp.graduation_degree,tp.resume,tp.adharcard,tp.approval,u.id as teacher_id,u.name,u.email,u.username,u.img,u.usertype FROM user as u 
JOIN teacher_profile as tp ON u.id=tp.userId";
$result = mysqli_query($conn, $sql) or die("connection Failed");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="modal fade" data-bs-backdrop="static" id="exampleModal<?php echo $row['teacher_id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $row['name']; ?></h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" id="addmission_pg_1" autocomplete="off">
                            <div class="row align-items-center">
                                <div class="col-md-3 card-body">
                                    <img src="admin/upload/user-image/<?php echo $row['img']; ?>" class="img-fluid rounded-circle" alt="user image">
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label">Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <label class="form-label">Number:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['number']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">City:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['city']; ?>" readonly>
                                </div>
                                <div class="col-md-12 ">
                                    <label class="form-label">State:</label>
                                    <input type="text" value="<?php echo $row['state']; ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">tutoring Subject:</label>
                                    <input type="text" class="form-control" value="<?php echo $row['tutoring_sub']; ?>" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.sub').focus();
        $(window).scrollTop($('.sub').position().top);
    });
</script>