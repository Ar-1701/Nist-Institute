<?php $active_page = "notice";
include_once "header.php"; ?>
<div class="container content">
    <h1 class="sub">
        <?php echo $row_title['category_name']; ?> </h1>
    <?php include_once "config.php";
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM notice WHERE category = {$pid}";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) { ?>
        <ul id="cg">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <li>
                    <div class="card">
                        <a class="" href="../nist/single-notice.php?id=<?php echo $row['notice_id']; ?>">
                            <div class="card-body ">
                                <p class="card-text "><?php echo $row['notice_title']; ?>&nbsp;
                                    <span class="card-text bg-primary"><?php echo $row['notice_date']; ?></span>
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
            <?php  } ?>
        </ul>
    <?php } ?>
</div>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('.content').focus();
        $(window).scrollTop($('.content').position().top);
    });
</script>
<?php include_once "footer.php"; ?>