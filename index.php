<?php $active_page = 'home';
include_once "header.php";
include_once "config.php";
//  carousel-start 
include_once "slider.php"; ?>
<!-- carousel-close -->
<br>
<!-- MAin Content -->
<h1 class="sub">Notice</h1>
<div class="container" id="main-content">
    <div class="row">
        <div class="col-4 a1">
            <label class="t">Notice</label>
            <?php
            $sql = "SELECT * FROM notice WHERE category = 1";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) { ?>
                <marquee class="mark1" direction="down" scrollamount="3" onmouseover="stop()" onmouseout="start()">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="../nist/single-notice.php?id=<?php echo $row['notice_id']; ?>">
                            <span class="time">
                                <?php echo $row['notice_date']; ?>
                            </span>
                            <?php echo $row['notice_title']; ?>
                        </a><br>
                        <hr>
                    <?php } ?>
                </marquee>
                <?php
            }
            $sql2 = "SELECT * FROM category WHERE category_id = 1";
            $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
            if (mysqli_num_rows($result2)) {
                while ($row = mysqli_fetch_assoc($result2)) { ?>
                    <span class="detail-notice"><a class=" btn btn-dark" href="notice_list.php?pid=<?php echo $row['category_id']; ?>">Show</a></span>
            <?php }
            } ?>
        </div>
        <div class="col-4 a1">
            <label class="t"> Notification For Students</label>
            <?php
            $sql = "SELECT * FROM notice WHERE category = 2";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) { ?>
                <marquee class="mark1" direction="down" scrollamount="3" onmouseover="stop()" onmouseout="start()">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="../nist/single-notice.php?id=<?php echo $row['notice_id']; ?>">
                            <span class="time">
                                <?php echo $row['notice_date']; ?>
                            </span>
                            <?php echo $row['notice_title']; ?>
                        </a><br>
                        <hr>
                    <?php } ?>
                </marquee>
                <?php
            }
            $sql2 = "SELECT * FROM category WHERE category_id = 2";
            $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
            if (mysqli_num_rows($result2)) {
                while ($row = mysqli_fetch_assoc($result2)) {
                ?>
                    <span class="detail-notice"><a class=" btn btn-dark" href="notice_list.php?pid=<?php echo $row['category_id']; ?>">Show</a></span>
            <?php }
            } ?>
        </div>
        <div class="col-4 a1">
            <label class="t">Notification Related To Examination</label>
            <?php
            $sql = "SELECT * FROM notice WHERE category = 19";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) { ?>
                <marquee class="mark1" direction="down" scrollamount="3" onmouseover="stop()" onmouseout="start()">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <a href="../nist/single-notice.php?id=<?php echo $row['notice_id']; ?>">
                            <span class="time">
                                <?php echo $row['notice_date']; ?>
                            </span>
                            <?php echo $row['notice_title']; ?>
                        </a><br>
                        <hr>
                    <?php } ?>
                </marquee>
            <?php
            }
            $sql2 = "SELECT * FROM category WHERE category_id = 19";
            $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
            $row = mysqli_fetch_assoc($result2);
            ?>
            <span class="detail-notice"><a class=" btn btn-dark" href="notice_list.php?pid=<?php echo $row['category_id']; ?>">Show</a></span>
        </div>
    </div>
</div>
<!-- Gallery Section -->
<h1 class="sub">Gallery</h1>
<div class="container gall_cont_outer bg-light shadow p-3 mt-2 mb-2 bg-body-tertiary rounded border border-dark">
    <?php include_once "config.php";
    $sql = "SELECT * FROM gallery ORDER BY gal_id DESC LIMIT 4";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="container gal_container shadow-sm">
                <div class="img-container">
                    <div class="box">
                        <div class="box-img">
                            <img src="admin/upload/gallery/<?php echo $row['gal_title']; ?>" class="img-fluid" alt="gallery-image">
                        </div>
                    </div>
                </div>
            </div>
    <?php  }
    } ?>
</div>
<!-- about section -->
<div class="container ">
    <?php
    $sql = "SELECT * FROM about";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="container about-container">
                <div class="box">&emsp14;
                    <h1>
                        <?php echo $row['about_title']; ?>
                    </h1>
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
    <?php  }
    } ?>
</div>
<br>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<?php include "footer.php"; ?>
<!-- ---script--- -->