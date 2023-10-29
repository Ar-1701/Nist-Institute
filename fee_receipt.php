<?php include_once 'config.php';
include_once 'header.php'; ?>
<div class="card" id="fee_receipt">
    <p class="form-label text-center mb-4 h3"><u>Fee Receipt</u></p>
    <div class="card">
        <div id="logo1">
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
        <div class="card-body">
            <div class="card-title">
                <p>Nistha Institute Of Science & Technology Bhawarnath Azamgarh Uttar Pradesh
                    <br> <span>Phone-9170618798</span>
                </p>
            </div>
        </div>
    </div>
    <br>
    <?php
    $sql = "SELECT * FROM fee as f JOIN course as c ON f.course = c.id WHERE registerId ={$_SESSION["user_id"]} ORDER BY f.id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-12 mb-2">
                <label class="form-label ">Registration Id:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['registerId']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label ">Name:</label>
                <input type="text" class="form-control " readonly value="<?php echo $row['name']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Course:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['course_name']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Semester Fee:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['semesterfee']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Other Fee:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['otherfee']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Exam Fee:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['examfee']; ?>">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Total Fee:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['totalfee']; ?>">
            </div>
            <div class="col-md-12 mb-4">
                <label class="form-label">Payment:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row['payment']; ?>">
            </div>
    <?php }
    } ?>
</div>
<?php include_once 'footer.php' ?>