<?php $active_page = 'notice';
include_once "config.php";
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Notice</h1>
            </div>
            <div class="col-md-2 text-right">
                <a class="add-new" href="add-notice.php">add Notice</a>
            </div>
            <div class="col-md-12">
                <?php
                $limit = 10;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    // $pages = 1;
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = " SELECT * FROM notice
                LEFT JOIN category
                ON notice.category = category.category_id
                ORDER BY notice_id DESC
                LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) { ?>
                    <table class=" tables content-table" border="2">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $serial = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr id="table-data">
                                    <td data-label="S.No." class='id'><?php echo $serial; ?></td>
                                    <!-- <td data-label="S.No." class='id'><?php echo $page; ?></td> -->
                                    <td data-label="Title"><?php echo $row['notice_title']; ?></td>
                                    <td data-label="Description"><?php $aa = $row['description'];
                                                                    echo substr($aa, 0, 300), "....";
                                                                    ?></td>
                                    <td data-label="Category"><?php echo $row['category_name']; ?></td>
                                    <td data-label="Date"><?php echo $row['notice_date']; ?></td>
                                    <td data-label="Edit" class='edit'><a href='add-notice.php?id=<?php echo $row["notice_id"]; ?>'><i class="bi bi-pencil-square"></i></a></td>
                                    <td data-label="Delete" class='delete'><a href='delete-notice.php?id=<?php echo $row["notice_id"]; ?>&cat_id=<?php echo $row["category_id"]; ?>' onclick="return confirm('<?php echo 'Are You Sure To Delete ' . $row['notice_title']; ?>')"><i class='bi bi-trash text-danger'></i></a></td>
                                </tr>
                            <?php $serial++;
                            } ?>

                        </tbody>
                    </table>
                <?php
                } else {
                    echo "<h4 style='color:red';>No Record Found.</h4>";
                }
                $sql1 = "SELECT COUNT(notice_id) FROM notice";
                $result_1 = mysqli_query($conn, $sql1);
                $row_db = mysqli_fetch_row($result_1);
                $total_record = $row_db[0];
                $to_page = ($total_record / $limit);
                echo '<ul class="pagination admin-pagination">';
                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="notice.php?page=' . ($page - 1) . '">&laquo;</a></li>';
                }
                for ($i = 1; $i < $to_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="' . $active . ' page-item"><a class="page-link" href ="notice.php?page=' . $i . '">' . $i . '</a></li>';
                }
                if ($to_page > $page) {
                    echo '<li class="page-item"><a class="page-link" href="notice.php?page=' . ($page + 1) . '">&raquo;</a></li>';
                }
                echo '</ul>';
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>