<?php $active_page = 'profile';
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Profile</h1>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <?php
                include_once "config.php";
                $sql = "SELECT * FROM admin WHERE id ={$_SESSION['admin_id']}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <form action="update-profile.php" method="POST">
                            <div class="form-group">
                                <label for="website_name">Name</label>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="website_name">Username</label>
                                <input type="text" name="username" value="<?php echo $row['ad_user']; ?>" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="website_name">Old Password</label>
                                <input type="text" name="old_pass" value="" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="website_name">New Password</label>
                                <input type="text" name="pass" value="" class="form-control" autocomplete="off" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                        </form>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>