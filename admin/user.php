<?php $active_page = 'user';
include "header.php";
include "config.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Users</h1>
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
                $sql = "SELECT * FROM user
                LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) { ?>
                    <table class="tables content-table" border="2">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>username</th>
                                <th>User Type</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $serial = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td data-label='S.No.'><?php echo $serial; ?> </td>
                                    <td data-label='Title'><?php echo $row['name']; ?></td>
                                    <td data-label='email'><?php echo $row['email']; ?></td>
                                    <td data-label='username'><?php echo $row['username']; ?> </td>
                                    <td data-label='usertype'><?php
                                                                if ($row['usertype'] == 1) {
                                                                    echo "Teacher";
                                                                } else {
                                                                    echo "Student";
                                                                }
                                                                ?> </td>
                                    <td data-label="Delete" class='delete'><a href='delete-user.php?id=<?php echo $row["id"]; ?>' onclick="return confirm('<?php echo 'Are You Sure To Delete ' . $row['name']; ?>')"><i class='bi bi-trash text-danger'></i></a></td>
                                </tr>
                            <?php $serial++;
                            } ?>
                        </tbody>
                    </table>
                <?php
                    $sql1 = " SELECT COUNT(id) FROM user";
                    $result_1 = mysqli_query($conn, $sql1);
                    $row_db = mysqli_fetch_row($result_1);
                    $total_record = $row_db[0];
                    $to_page = ($total_record / $limit);
                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="user.php?page=' . ($page - 1) . '">&laquo;</a></li>';
                    }
                    for ($i = 1; $i < $to_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . ' page-item"><a class="page-link" href ="user.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($to_page > $page) {
                        echo '<li class="page-item"><a class="page-link" href="user.php?page=' . ($page + 1) . '">&raquo;</a></li>';
                    }
                    echo '</ul>';
                } else {
                    echo "Record Not Found";
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>