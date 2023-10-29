<?php $active_page = 'course';
include_once "header.php"; ?>
<!-- Main-content -->
<div class="container">
    <h1 class="sub">--&#9733;COURSE&#9733;--</h1>
</div>
<div class="container content">
    <h1 class="sub">
        regular courses
    </h1>
    <div class="card subject_list">
        <?php
        include_once "config.php";
        $sql = "SELECT * FROM course";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <a class="card-body subject_name" href="../nist/single-subject.php?id=<?php echo $row['id']; ?>">
                    <p><?php echo $row['course_name']; ?></p>
                </a>
        <?php }
        } ?>
    </div>
</div>
<br>
<!-- footer -->
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.content').focus();
        $(window).scrollTop($('.content').position().top);
    });
</script>
<?php include_once "footer.php"; ?>