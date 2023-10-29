<?php include_once 'config.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmission Billing</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <a href="index.php" class="m-5" id="backBtn1">Back</a>
    <div class="card" id="fee_receipt">
        <p class="form-label text-center mb-4 h3"><u>Addmission Fee Receipt</u></p>
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
        $sql = "SELECT cr.*,add_bill.* FROM addmission_billing as add_bill JOIN course as cr ON add_bill.course = cr.id WHERE registerId ={$_SESSION["user_id"]} 
        ORDER BY add_bill.id DESC LIMIT 1";
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
                    <label class="form-label">Addmission Fee:</label>
                    <input type="text" class="form-control" readonly value="<?php echo $row['add_fees']; ?>">
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
        <input type="button" id="print" class="btn btn-info  m-auto mb-3" onclick="printpage()" value="Print" />
    </div>
    <script src="js/jquery.js"></script>
    <script>
        function printpage() {
            var pr = document.getElementById("fee_receipt");
            var pr1 = document.getElementById("print");
            var pr2 = document.getElementById("backBtn1");
            pr1.style.visibility = 'hidden';
            pr2.style.visibility = 'hidden';
            window.print();
        }
    </script>
</body>

</html>