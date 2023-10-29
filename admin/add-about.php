<?php $active_page = 'add_about';
include_once "config.php";
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['id'])) {
                ?>
                    <h1 class="admin-heading">Update About</h1>
                <?php } else { ?>
                    <h1 class="admin-heading">Add About</h1>
                <?php } ?>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <!-- Form -->
                <?php
                if (isset($_GET['id'])) {
                    $post_id = $_GET['id'];
                    $sql = "SELECT * FROM about WHERE about_id = {$post_id}";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <form action="save-about.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <input type="hidden" name="about_id" class="form-control" value="<?php echo $row['about_id']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTile">Title</label>
                                    <input type="text" name="about_title" class="form-control" id="about_title" value="<?php echo $row['about_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Description</label>
                                    <textarea name="about_description" class="form-control" id="about_desc" rows="5"><?php echo trim($row['about_description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">About image</label>
                                    <input type="file" name="new-image" id="about_img">
                                    <br>
                                    <img src="upload/about/<?php echo $row['about_img']; ?>" width="150px" height="100px" alt="uploaded file">
                                    <input type="hidden" name="old-image" value="<?php echo $row['about_img']; ?>">
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                            </form>
                    <?php }
                    }
                } else { ?>
                    <form id="add-form1" method="POST" action="save-about.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="about_title" id="about_title" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <textarea name="about_desc" id="about_desc" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>About image</label>
                            <input type="file" name="fileToUpload" class="form-control" id="about_img">
                        </div>
                        <input type="submit" name="about-submit" id="about_submit" class="btn btn-primary" value="Save" />
                    </form>
                    <!--/Form -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script>
    $("#about_submit").on("click", function() {
        let about_title = $("#about_title").val();
        let about_desc = $("#about_desc").val();
        var about_img = $('#about_img').val();

        if (about_title == "") {
            alert("Fill About Title");
            return false;
        } else if (about_desc == "") {
            alert("Fill About Description");
            return false;
        } else if (about_img == "") {
            alert("Select Image");
            return false;
        }
    });
</script>
<?php include_once "footer.php"; ?>