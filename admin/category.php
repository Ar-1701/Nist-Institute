<?php $active_page = 'category';
include_once 'config.php';
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <?php
                $limit = 5;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM  category ORDER BY category_id DESC Limit {$offset},{$limit}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $table = '<table class="tables content-table" border="2">';
                    $table .= '<thead>
                                 <tr>
                                    <th>S.No.</th>
                                    <th>Category Name</th>
                                    <th>No. of Posts</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody>';
                    $serial = $offset + 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $table .= "<tr>
                            <td data-label='S.No.' class='id'>{$serial}</td>
                            <td data-label='Category Name'>{$row["category_name"]}</td>
                            <td data-label='No. of Posts'>{$row["post"]}</td>
                            <td data-label='Edit' class='edit'><a href='add-category.php?id={$row['category_id']}' ><i class='bi bi-pencil-square'></i></a></td>
                            <td data-label='Delete' class='delete'><a href='delete-category.php?id={$row['category_id']}' onclick = 'return dlt()'><i class='bi bi-trash text-danger'></i></a></td>
                        </tr>";
                        $serial++;
                    }
                    $table .= '</tbody></table>';
                    echo $table;
                } else {
                    echo "<h3>No Results Found.</h3>";
                }
                $sql1 = "SELECT COUNT(category_id) FROM category";
                $result_1 = mysqli_query($conn, $sql1);
                $row_db = mysqli_fetch_row($result_1);
                $total_record = $row_db[0];
                $to_page = ($total_record / $limit);
                echo "<ul class='pagination admin-pagination'>";
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='category.php?page=" . ($page - 1) . "'>&laquo;</a></li>";
                }
                if ($total_record > $limit) {
                    for ($i = 1; $i < $to_page; $i++) {
                        if ($i == $page) {
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        echo "<li class='page-item {$active}'><a class='page-link' href='category.php?page=" . $i . "'>$i</a></li>";
                    }
                }
                if ($to_page > $page) {
                    echo "<li class='page-item'> <a class='page-link' href='category.php?page=" . ($page + 1) . "'>&raquo;</a></li>";
                }
                echo "</ul>";
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>