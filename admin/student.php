<?php $active_page = 'student';
include_once "header.php";
include_once "config.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Student Profile</h1>
            </div>
            <div class="col-md-12">
                <?php
                $limit = 10;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT tp.id as stu_profile_id,tp.stuId,tp.stu_name,tp.number,tp.perAddress,tp.address2,tp.city,tp.state,tp.pincode,
                        tp.aadharcard,tp.stuImg,tp.highschool,tp.interMarksheet,tp.aadharcard,u.id as teacher_id,u.name,u.email,u.username,u.img,u.usertype FROM user as u 
                        JOIN admission as tp ON u.id=tp.stuId LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="tables content-table">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Pincode</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $_SESSION['stu_Id'] = $row['stuId'];
                            ?>
                                <tr>
                                    <input type="hidden" id="u" value="<?php echo $row['stuId']; ?>" />
                                    <td data-label='S.No.'><?php echo $serial; ?> </td>
                                    <td data-label='Name'><?php echo $row['stu_name']; ?> </td>
                                    <td data-label='Number'><?php echo $row['number']; ?></td>
                                    <td data-label='Address'><?php echo $row['perAddress']; ?></td>
                                    <td data-label='City'><?php echo $row['city']; ?> </td>
                                    <td data-label='State'><?php echo $row['state']; ?> </td>
                                    <td data-label='Pincode'><?php echo $row['pincode']; ?> </td>
                                    <td data-label="View" class='edit'><a href='view-student.php?id=<?php echo $row['stuId']; ?>'><i class="bi bi-eye-fill h3"></i></a></td>
                                    <td data-label="Delete" class='delete'><a href='delete-student.php?id=<?php echo $row["stu_profile_id"] ?>&name=<?php echo $row['name']; ?>' onclick="return confirm('<?php echo 'Are You Sure To Delete ' . $row['name']; ?>')"><i class='bi bi-trash text-danger h3'></i></a></td>
                                </tr>
                            <?php $serial++;
                            } ?>
                        </tbody>
                    </table>
                <?php
                    $sql1 = " SELECT COUNT(id) FROM admission";
                    $result_1 = mysqli_query($conn, $sql1);
                    $row_db = mysqli_fetch_row($result_1);
                    $total_record = $row_db[0];
                    $to_page = ($total_record / $limit);
                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="student.php?page=' . ($page - 1) . '">&laquo;</a></li>';
                    }
                    for ($i = 1; $i < $to_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . ' page-item"><a class="page-link" href ="student.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($to_page > $page) {
                        echo '<li class="page-item"><a class="page-link" href="student.php?page=' . ($page + 1) . '">&raquo;</a></li>';
                    }
                    echo '</ul>';
                } else {
                    echo "Record Not Found";
                } ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script>
    function change_status(teacher_id) {
        var check = $('#flexSwitchCheckDefault').val();
        var u = teacher_id;
        $.ajax({
            url: "save-teacher.php",
            type: "POST",
            data: {
                check: check,
                u: u
            },
            success: function(data) {
                // document.write(data);
                location.reload();
            }
        });
    }
</script>
<?php include_once "footer.php"; ?>