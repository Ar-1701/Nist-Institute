<?php $active_page = 'add_notice';
include_once 'header.php'; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_GET['id'])) { ?>
                    <h1 class="admin-heading">Update Notice</h1>
                <?php } else { ?>
                    <h1 class="admin-heading">Add New Notice</h1>
                <?php } ?>

            </div>
            <div class="col-md-12 d-flex justify-content-center">

                <?php
                include "config.php";
                if (isset($_GET['id'])) {
                    $notice_id = $_GET['id'];
                    $sql = "SELECT * FROM notice WHERE notice_id = {$notice_id}";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <form>
                                <div class="form-group">
                                    <input type="hidden" name="notice_id" id="notice_id" class="form-control" value="<?php echo $row['notice_id']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="post_title" class="form-control" id="post_title" value="<?php echo $row['notice_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="postdesc" id="postdesc" class="form-control" rows="5"><?php echo trim($row['description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option disabled> Select Category</option>
                                        <?php include "config.php";
                                        $sql1 = "SELECT * FROM category";
                                        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                                        if (mysqli_num_rows($result1) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                if ($row['category'] == $row1['category_id']) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                echo "<option {$selected} value='{$row1['category_id']}'> {$row1['category_name']} </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="old_category" id="old_category" value="<?php echo $row['category']; ?>">
                                </div>
                                <input type="submit" name="notice_submit" id="notice_submit" class="btn btn-primary" value="Update" />
                            </form>
                    <?php
                        }
                    }
                } else { ?>
                    <form id="add-form">
                        <div class="form-group">
                            <label for="post_title">Title</label>
                            <input type="text" name="post_title" id="post_title" class="form-control inputField" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Description</label>
                            <textarea name="postdesc" id="postdesc" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled> Select Category</option>
                                <?php include_once "config.php";
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['category_id']}'> {$row['category_name']} </option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" name="notice_submit" id="notice_submit" class="btn btn-primary" value="Save" />
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function() {

        $("#notice_submit").on("click", function(e) {
            e.preventDefault();
            var notice_id = $("#notice_id").val();
            var old_category = $("#old_category").val();
            var post_title = $("#post_title").val();
            var postdesc = $("#postdesc").val();
            var category = $("#category").val();
            if (post_title == "") {
                alert("Fill Notice Title");
            } else if (postdesc == "") {
                alert("Fill notice Description");
            } else if (category == null) {
                alert("Select Category");
            } else {
                $.ajax({
                    url: "save-notice.php",
                    type: "POST",
                    data: {
                        notice_id: notice_id,
                        old_category: old_category,
                        post_title: post_title,
                        postdesc: postdesc,
                        category: category
                    },
                    success: function(data) {
                        $("#add-form").trigger("reset");
                        window.location = "notice.php";
                    }
                });
            }
        });
    });
</script>
<?php include_once "footer.php"; ?>