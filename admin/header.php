<?php
include "config.php";
session_start();

if (!isset($_SESSION["ad_user"])) {
    header("Location:{$hostname}");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Websites For All">
    <meta name="keywords" content="HTML, CSS, JavaScript , PHP, MySQL">
    <meta name="author" content="Rohan Maurya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Panel</title>
    <link rel="icon" type="image/x-icon" href="../Image/logo.ico">
    <link rel="stylesheet" href="css/bootstrap5.2.0.min.css">
    <script src="css/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.bundle.min.js">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- LOGO -->
        <div class="logo_cont">
            <?php
            $sql = "SELECT * FROM settings";

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['logo'] == "") {
                        echo '<a href="index.php" class="logo"><h1>' . $row['websitename'] . '</h1></a>';
                    } else {
                        echo '<a href="index.php"><img class="logo" src="upload/setting/' . $row['logo'] . '" alt="Logo"></a>';
                    }
            ?>
            <?php }
            } ?>
        </div>
        <div class="logout_cont">
            <a href="logout.php" class="admin_logout_btn btn"><i><?php echo $_SESSION['name']; ?></i class="text">-logout</a>
        </div>
        <!-- /LOG-Out -->
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="topnav" id="myTopnav">
            <a class="nav-show <?php if ($active_page == 'dashboard') {
                                    echo 'active';
                                } ?>" href="dashboard.php">Dashboard</a>

            <a class="nav-show <?php if (($active_page == 'notice' || $active_page == 'add_notice')) {
                                    echo 'active';
                                } ?>" href="notice.php">Notice</a>

            <a class="nav-show <?php if (($active_page == 'about' || $active_page == 'add_about')) {
                                    echo 'active';
                                } ?>" href="about-list.php">about</a>

            <a class="nav-show <?php if (($active_page == 'category' || $active_page == 'add_category')) {
                                    echo 'active';
                                } ?>" href="category.php">Category</a>

            <a class="nav-show <?php if (($active_page == 'course' || $active_page == 'add_course')) {
                                    echo 'active';
                                } ?>" href="course-list.php">course</a>

            <a class="nav-show <?php if (($active_page == 'carousel' || $active_page == 'add_carousel')) {
                                    echo 'active';
                                } ?>" href="carousel-list.php">carousel</a>

            <a class="nav-show <?php if (($active_page == 'gallery' || $active_page == 'add_gallery')) {
                                    echo 'active';
                                } ?>" href="gallery-list.php">gallery</a>

            <a class="nav-show <?php if ($active_page == 'contact') {
                                    echo 'active';
                                } ?> " id="contact_notify" href="contact.php">Contact
                <?php $sql = "SELECT * FROM contact WHERE status=0";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                echo "<span class='position-absolute top-1 start-1 translate-middle badge rounded-pill bg-info text-dark'value='$row'>{$row}</span>";
                ?>
            </a>
            <a class="nav-show <?php if ($active_page == 'user') {
                                    echo 'active';
                                } ?>" id="User_notify" href="user.php">Users
                <?php $sql = "SELECT status FROM user WHERE status=0";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                echo "<span class='position-absolute top-1 start-1 translate-middle badge rounded-pill bg-info text-dark'>{$row}</span>";
                ?></a>
            <a class="nav-show <?php if ($active_page == 'student') {
                                    echo 'active';
                                } ?>" id="stu_notify" href="student.php">Student
                <?php $sql = "SELECT status FROM admission WHERE status=0";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                echo "<span class='position-absolute top-1 start-1 translate-middle badge rounded-pill bg-info text-dark' >{$row}</span>";
                ?></a>
            <a class="nav-show <?php if ($active_page == 'teacher') {
                                    echo 'active';
                                } ?>" id="teacher_notify" href="teacher-list.php">teacher
                <?php
                $sql1 = "SELECT approval FROM teacher_profile WHERE approval=0";
                $query = mysqli_query($conn, $sql1);
                $row1 = mysqli_num_rows($query);
                echo "<span class='position-absolute top-1 start-1 translate-middle badge rounded-pill bg-info text-dark'>{$row1}</span>"
                ?></a>
            <a class="nav-show <?php if ($active_page == 'Setting') {
                                    echo 'active';
                                } ?>" href="settings.php">Setting</a>
            <a class="nav-show <?php if ($active_page == 'profile') {
                                    echo 'active';
                                } ?>" href="profile.php">Profile</a>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="bi bi-list"></i>
            </a>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
        $(document).ready(function() {
            $("#contact_notify").click(function() {
                var contact_notify = $("#contact_notify").val();
                $.ajax({
                    url: "header.php",
                    type: "POST",
                    data: {
                        contact_notify: contact_notify
                    },
                    success: function(data) {}
                });
            });
            $("#User_notify").click(function() {
                var User_notify = $("#User_notify").val();
                $.ajax({
                    url: "header.php",
                    type: "POST",
                    data: {
                        User_notify: User_notify
                    },
                    success: function(data) {}
                });
            });
            $("#stu_notify").click(function() {
                var stu_notify = $("#stu_notify").val();
                $.ajax({
                    url: "header.php",
                    type: "POST",
                    data: {
                        stu_notify: stu_notify
                    },
                    success: function(data) {}
                });
            });

        });
    </script>
    <?php
    if (isset($_POST['contact_notify'])) {
        $sql = "UPDATE contact SET status='1' WHERE status = 0";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "not Update";
        }
    } elseif (isset($_POST['User_notify'])) {
        $sql = "UPDATE user SET status='1' WHERE status = 0";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "not Update";
        }
    } elseif (isset($_POST['stu_notify'])) {
        $sql = "UPDATE admission SET status='1' WHERE status = 0";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "not Update";
        }
    } ?>