<?php
$active_page = 'dashboard';
include_once "header.php";
include_once "config.php"; ?>
<div class="container dash_Content">
    <div class="container dash-box">
        <h5 class="card-title bg-success">No. Of User</h5>
        <?php
        $sql = "SELECT id FROM user";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='user.php'><h1>$row</h1></a>";
        ?>
    </div>

    <div class="container dash-box">
        <h5>No. Of Notice</h5>
        <?php
        $sql1 = "SELECT notice_id FROM notice";
        $query = mysqli_query($conn, $sql1);
        $row1 = mysqli_num_rows($query);
        echo "<a href='notice.php'><h1>$row1</h1></a>";
        ?>
    </div>
    <div class="container dash-box">
        <h5 class="">No. Of Course</h5>
        <?php
        $sql = "SELECT id FROM course";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='course-list.php'><h1>$row</h1></a>";
        ?>
    </div>
    <div class="container dash-box">
        <h5>No. Of Carousel</h5>
        <?php
        $sql = "SELECT carousel_id FROM carousel";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='carousel-list.php'><h1>$row</h1></a>";
        ?>
    </div>
    <div class="container dash-box">
        <h5>No. Of Category</h5>
        <?php
        $sql = "SELECT category_id FROM category";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='category.php'><h1>$row</h1></a>";
        ?>
    </div>
    <div class="container dash-box">
        <h5>Gallery</h5>
        <?php
        $sql = "SELECT gal_id FROM gallery";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='gallery-list.php'><h1>$row</h1></a>";
        ?>
    </div>
    <div class="container dash-box">
        <h5>About</h5>
        <?php
        $sql = "SELECT about_id FROM about";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo "<a href='about-list.php'><h1>$row</h1></a>";
        ?>
    </div>
</div>
<?php include_once "footer.php"; ?>