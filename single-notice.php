<?php $active_page = "notice";
include_once "header.php";
include_once "config.php";
$notice_id = $_GET['id'];
$sql = "SELECT * FROM notice WHERE notice_id = {$notice_id}";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card notice_single">
            <div class="card-body">
                <p class="card-text"><?php echo $row['notice_title']; ?> <span class="bg-info"><?php echo $row['notice_date']; ?></span></p>
                <p class="card-text"><?php echo $row['description']; ?></p>
            </div>
        </div>
<?php }
}
include_once "footer.php"; ?>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.notice_single').focus();
        $(window).scrollTop($('.notice_single').position().top);
    });
</script>