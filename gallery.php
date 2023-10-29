<?php $active_page = 'gallery';
include_once "header.php"; ?>
<div class="container gall_cont_outer">
    <?php include_once "config.php";
    $sql = "SELECT * FROM gallery ORDER BY  gal_id DESC";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="container gal_container">
                <div class="img-container">
                    <div class="box">
                        <div class="box-img">
                            <img src="admin/upload/gallery/<?php echo $row['gal_title']; ?>" class="img-fluid" alt="gallery-image">
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>
<!-- footer -->
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.gall_cont_outer').focus();
        $(window).scrollTop($('.gall_cont_outer').position().top);
    });
</script>
<?php include_once "footer.php"; ?>