<?php $active_page = 'add_category';
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['id'])) {
                ?>
                    <h1 class="admin-heading">Update Category</h1>
                <?php } else { ?>
                    <h1 class="admin-heading">Add New Category</h1>

                <?php } ?>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <!-- Form Start -->
                <?php
                if (isset($_GET['id'])) {
                    include_once 'config.php';
                    $cat_id = $_GET['id'];
                    $sql = "SELECT * FROM category WHERE category_id ={$cat_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <form action="category-save.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="cat_id" id="cat_id1" class="form-control" value="<?php echo $row['category_id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>category Name</label>
                                    <input type="text" name="cat_name" id="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>">
                                </div>
                                <input type="submit" name="submit" id="update_category" class="btn btn-primary" value="Update" />
                            </form>
                    <?php  }
                    }
                } else { ?>
                    <form id="add-form">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" id="category" class="form-control" placeholder="Category Name">
                        </div>
                        <input type="submit" id="cat_save" class="btn btn-primary" value="Submit">
                    </form>
                <?php } ?>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script>
    $("#cat_save").on("click", function(e) {
        e.preventDefault();
        let cat_save = $("#category").val();
        if (cat_save.length == 0) {
            alert("Please Fill Category")
        } else {
            $.ajax({
                url: "category-save.php",
                type: "POST",
                data: {
                    cat_save: cat_save
                },
                success: function(data) {
                    $("#add-form").trigger("reset");
                    window.location = "category.php";
                }
            })
        }
    });
</script>
<?php include_once "footer.php"; ?>