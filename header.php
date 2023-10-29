<?php
session_start();
include_once "config.php";
// page title
$pages = basename($_SERVER['PHP_SELF']);
switch ($pages) {
    case 'gallery.php':
        $page_title = "Gallery Page";
        break;
    case 'course.php':
        $page_title = "Course Page";
        break;
    case 'about.php':
        $page_title = "About Page";
        break;
    case 'contact.php':
        $page_title = "Contact Page";
        break;
    case 'notice.php':
        $page_title = "Notice Page";
        break;
    case 'admission.php':
        $page_title = "Admission Page";
        break;
    case 'login.php':
        $page_title = "Login Page";
        break;
    case 'signup.php':
        $page_title = "Registration Page";
        break;
    case 'teacher_list.php':
        $page_title = "Teacher Page";
        break;
    case 'notice_list.php':
        if ($_GET['pid']) {
            $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['pid']}";
            $result_title = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['category_name'];
        } else {
            $page_title = "Not Found";
            header("Location:{$hostname}pagenot.php");
        }
        break;
    case 'single-notice.php':
        if ($_GET['id']) {
            $sql_title = "SELECT * FROM notice WHERE notice_id = {$_GET['id']}";
            $result_title = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['notice_title'];
        } else {
            $page_title = "Not Found";
            header("Location:{$hostname}pagenot.php");
        }
        break;
    case 'single-subject.php':
        if ($_GET['id']) {
            $sql_title = "SELECT * FROM course WHERE id = {$_GET['id']}";
            $result_title = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['course_name'];
        } else {
            $page_title = "Not Found";
            header("Location:{$hostname}pagenot.php");
        }
        break;
    default:
        $sql_title = "SELECT websitename FROM settings";
        $result_title = mysqli_query($conn, $sql_title) or die("Title Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['websitename'];
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Free Websites For All">
    <meta name="keywords" content="HTML, CSS, JavaScript , PHP, MySQL">
    <meta name="author" content="Rohan Maurya">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link rel="icon" type="image/x-icon" href="Image/logo.ico">
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>

<body id="body-color">
    <!-- NAVE BAR START -->
    <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="index.php" id="nist_logo_name">NIST</a>
        <a class="nav-link <?php if ($active_page == 'home') {
                                echo 'active';
                            } ?>" href="index.php">Home</a>

        <a class="nav-link <?php if ($active_page == 'gallery') {
                                echo 'active';
                            } ?>" href="gallery.php"> gallery</a>

        <a class="nav-link <?php if ($active_page == 'course' || $active_page == 'subject') {
                                echo 'active';
                            } ?>" href="course.php"> course</a>
        <?php
        if (isset($_SESSION['user_id'])) {
            $sql = "SELECT * FROM admission WHERE stuId={$_SESSION['user_id']}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        if (isset($_SESSION['user_id']) && isset($row['stuId'])) { ?>
        <?php } else if (isset($_SESSION['user_id']) && !isset($row['stuId']) && $_SESSION["usertype"] == 0) { ?>
            <a class="nav-link <?php if ($active_page == 'addmission') {
                                    echo 'active';
                                } ?>" href="admission.php">Addmission</a>
        <?php } else if (isset($_SESSION['user_id']) && $_SESSION["usertype"] == 1) { ?>
        <?php } else { ?>
            <a class="nav-link" href="login.php">Addmission</a>
        <?php } ?>
        <a class="nav-link <?php if ($active_page == 'notice') {
                                echo 'active';
                            } ?>" href="notice.php">notice</a>

        <a class="nav-link <?php if ($active_page == 'teacher') {
                                echo 'active';
                            } ?>" href="teacher_list.php">teacher</a>
        <?php if (isset($_SESSION['user_id'])) { ?>
            <a class="nav-link <?php if ($active_page == 'contacts') {
                                    echo 'active';
                                } ?>" href="contact.php">contact</a>
        <?php } else { ?>
            <a class="nav-link <?php if ($active_page == 'contacts') {
                                    echo 'active';
                                } ?>" href="login.php">contact</a>
        <?php } ?>
        <a class="nav-link <?php if ($active_page == 'about') {
                                echo 'active';
                            } ?>" href="about.php">about</a>
        <div class="dropdown">
            <?php if (isset($_SESSION["username"])) { ?>
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent;">
                    <img class="img-xs rounded-circle" src="admin/upload/user-image/<?php echo $_SESSION["user_img"]; ?>" width="32" height="32" alt="ProImg">
                </button>
            <?php } else { ?>
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent;">
                    <img class="img-xs rounded-circle" src="image/face8.jpg" width="32" height="32" alt="ProImg">
                </button>
            <?php } ?>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                if (isset($_SESSION["username"]) && $_SESSION["usertype"] == 0) { ?>
                    <a class="dropdown-item" href="profile.php" title="Student's profile"> <?php echo $_SESSION["username"]; ?></a>
                    <?php if (isset($row['stuId'])) { ?>
                        <a class="dropdown-item" href="fee.php">fee</a>
                    <?php } ?>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                <?php } elseif (isset($_SESSION["username"]) && $_SESSION["usertype"] == 1) { ?>
                    <a class="dropdown-item" href="profile.php" title="Teacher's profile"> <?php echo $_SESSION["username"]; ?></a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                <?php } else { ?>
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="signup.php">SignUp</a>
                <?php } ?>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <div class="container-fluid Outer">
        <div class=" row">
            <main>
                <section>
                    <h3>welcome to</h3>
                    <div id="logo">
                        <?php
                        $sql = "SELECT * FROM settings";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['logo'] == "") {
                                    echo '<a href="index.php"><h1>' . $row['websitename'] . '</h1></a>';
                                } else {
                                    echo '<a href="index.php"><img src="admin/upload/setting/' . $row['logo'] . '" alt="logo"></a>';
                                }
                            }
                        } ?>
                    </div>
                    <h2>nist azamgarh</h2>
                    <p>work is worship</p>
                </section>
            </main>
        </div>
    </div>
    <!-- Dropdown -->