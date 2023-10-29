<?php $active_page = 'about';
include_once "header.php";
include_once "config.php"; ?>
<div class="container">
    <?php
    $sql = "SELECT * FROM about";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class=" container about-container">
                <div class="box">&emsp14;
                    <h1><?php echo $row['about_title']; ?></h1>
                    <div class="about_box_img">
                        <img class="img-fluid" src="admin/upload/about/<?php echo $row['about_img']; ?>" alt="">
                    </div>
                    <div class="title-desc">
                        <p>
                            <?php echo $row['about_description']; ?>
                        </p>
                        <button type="button" class="btn btn-primary readMore">ReadMore</button>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>
<br><br>
<!-- footer -->
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.about-container').focus();
        $(window).scrollTop($('.about-container').position().top);
    });
</script>
<script src="js/script.js"></script>
<?php include_once "footer.php"; ?>