<?php
include_once 'header.php';
include_once 'config.php';
$user_id = $_SESSION['user_id']; ?>
<section class="" style="margin:10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">My Profile</h4>
                        <?php
                        if ($_SESSION['usertype'] == 1) { ?>
                            <a href="add_profile.php" class="btn btn-danger" title="Complete Your Profile">Set Profile</a>
                        <?php } ?>
                    </div>
                    <?php
                    $sql = "SELECT * FROM user WHERE id = {$user_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        foreach ($result as $row) { ?>
                            <form method="post" action="update_profile.php" enctype="multipart/form-data">
                                <div class="card-body admin-profile-aligment">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="user-admin-profile-img">
                                                <div class="form-group imgprofile">
                                                    <img src="admin/upload/user-image/<?php echo $row['img']; ?>" class="center img-fluid">
                                                </div>
                                                <div class="form-group form-control-file">
                                                    <input type="file" name="new-image" class="form-control " id="exampleFormControlFile1" accept="image/*">
                                                    <input type="hidden" name="old-image" value="<?php echo $row['img']; ?>">
                                                </div>
                                                <span id="imggg" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="user-detail-input-box">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Name</label>
                                                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="<?php echo $row['id']; ?>">
                                                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $row['name']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control " id="exampleInputEmail1" value="<?php echo $row['email']; ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" name="username" class="form-control " value="<?php echo $row['username']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                } ?>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary" fdprocessedid="1y6ag">Submit</button>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    });
</script>
<?php include_once 'footer.php'; ?>