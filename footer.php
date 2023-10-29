<!-- footer -->
<?php ?>
<div class="footer-dark dark1">
    <footer>
        <div class="container">
            <div class="row">
                <div class=" col-md-4 item">
                    <h3>&#9733;-ACADEMY-&#9733;</h3>
                    <ul>
                        <li><a href="course.php">COURSE</a></li>
                        <li><?php
                            if (isset($_SESSION['user_id'])) {
                                $sql = "SELECT * FROM admission WHERE stuId={$_SESSION['user_id']}";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            if (isset($_SESSION['user_id']) && isset($row['stuId'])) { ?>
                            <?php } else if (isset($_SESSION['user_id']) && !isset($row['stuId']) && $_SESSION["usertype"] == 0) { ?>
                                <a class="nav-link" href="admission.php">Addmission</a>
                            <?php } else if (isset($_SESSION['user_id']) && $_SESSION["usertype"] == 1) { ?>
                            <?php } else { ?>
                                <a class="nav-link" href="login.php">Addmission</a>
                            <?php } ?>
                        </li>
                        <li> <a href="notice.php">NOTICE</a></li>
                        <li><a href="teacher_list.php">TEACHER'S</a></li>
                    </ul>
                </div>
                <div class=" col-md-4 item">
                    <h3> &nbsp;&#9733;-ABOUT-&#9733;</h3>
                    <ul>
                        <li><a href="about.php">ABOUT </a></li>
                        <li><?php if (!isset($_SESSION["username"])) { ?>
                                <a href='login.php'>PROFILE</a>
                        </li>
                    <?php
                            } else { ?>
                        <li><a href="profile.php" title="profile">PROFILE</li>
                    <?php  }
                    ?></a>
                    <li><a href="gallery.php">GALLERY</a></li>
                    </ul>
                </div>
                <div class="col-md-4 item text">
                    <div class="m">
                        <h3>&#9733;-CONTACT US-&#9733;</h3>
                        Address:-Nistha Institute Of Science & Technology Bhawarnath Azamgarh Uttar
                        Pradesh<br> PinCode:-276001<br>
                        Email Us:-<a href="contact.php" id="footer-email">nist1234@gmail.com</a><br>
                        Mobile No.:9709346206
                    </div>
                </div>
                <?php
                include_once "config.php";
                $sql = "SELECT * FROM settings";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <p id="copyright"><?php echo $row['footerdesc']; ?></p>
                <?php }
                } ?>
            </div>
        </div>
    </footer>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-arrow-up"></i></button>
<script src="js/jquery.js"></script>
<script>
    // use of media query in js
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            mybutton.style.display = "block";
        } else if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            dropdownMenu.style.display = "none";
        } else {
            mybutton.style.display = "none";
        }


    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    // toggle class
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    // login button
    function loginFocus() {
        $('#username').focus();
        $(window).scrollTop($('#username').position().top);
    }

    var dropdownToggle = document.querySelector('.dropdown-toggle');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', () => {
        dropdownMenu.classList.toggle('show');
    });
</script>
</body>

</html>