<?php $active_page = 'gallery';
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">Gallery</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add_gallery.php">add Gallery</a>
            </div>
            <div class="col-md-12">
                <?php
                include_once "config.php";
                $limit = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM gallery ORDER BY gal_id DESC LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) { ?>
                    <table class="tables content-table" border="2">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td data-label="S.No."><?php echo $serial; ?></td>
                                    <td data-label="Image"><img src="upload/gallery/<?php echo $row['gal_title']; ?>" alt="gallery-image" srcset="">
                                    </td>
                                    <td data-label="Delete" class='delete'><a href='delete-gallery.php?galid=<?php echo $row["gal_id"]; ?>' onclick="return confirm('<?php echo 'Are You Sure To Delete ' . $row['gal_title']; ?>')"><i class='bi bi-trash text-danger'></i></a></td>
                                </tr>
                            <?php $serial++;
                            } ?>
                        </tbody>
                    </table>
                <?php
                    $sql1 = "SELECT COUNT(gal_id) FROM gallery";
                    $result_1 = mysqli_query($conn, $sql1);
                    $row_db = mysqli_fetch_row($result_1);
                    $total_record = $row_db[0];
                    $to_page = ($total_record / $limit);
                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="gallery-list.php?page=' . ($page - 1) . '">&laquo;</a></li>';
                    }
                    for ($i = 1; $i < $to_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . ' page-item"><a class="page-link" href ="gallery-list.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($to_page > $page) {
                        echo '<li class="page-item"><a class="page-link" href="gallery-list.php?page=' . ($page + 1) . '">&raquo;</a></li>';
                    }
                    echo '</ul>';
                } else {
                    echo "<h4 style='color:red';>No Record Found.</h4>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>