<?php $active_page = 'course';
include_once "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Course</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-course.php">add Course</a>
      </div>
      <div class="col-md-12">
        <?php
        include_once "config.php";
        $limit = 3;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT course.id,course.course_name,subjects.id,subjects.eligible,subjects.syllabus,
                 subjects.about FROM course
                 LEFT JOIN subjects
                 ON course.id = subjects.id
                 ORDER BY course.id DESC
                 LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
        ?>
          <table class=" tables content-table" border="2">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>Eligible</th>
                <th>Syllabus</th>
                <th>Duration</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $serial = $offset + 1;
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr id="table-data">
                  <td data-label="S.No." class='id'><?php echo $serial; ?></td>
                  <td data-label="Title"><?php echo $row['course_name']; ?></td>
                  <td data-label="Eligible"><?php echo $row['eligible']; ?></td>
                  <td data-label="Syllabus"><?php $aa = $row['syllabus'];
                                            echo substr($aa, 0, 250), "...."; ?></td>
                  <td data-label="Duration"><?php echo $row['about']; ?></td>
                  <td data-label="Edit" class='edit'><a href='add-course.php?id=<?php echo $row['id']; ?>'><i class="bi bi-pencil-square"></i></a></td>
                  <td data-label="Delete" class='delete'><a href='delete-course.php?id=<?php echo $row["id"]; ?>&subId=<?php echo $row["id"]; ?>' onclick="return confirm('<?php echo 'Are You Sure To Delete ' . $row['course_name']; ?>')"><i class='bi bi-trash text-danger'></i></a></td>
                </tr>
              <?php $serial++;
              } ?>
            </tbody>
          </table>
        <?php } else {
          echo "<h4 style='color:red';>No Record Found.</h4>";
        }
        $sql1 = "SELECT COUNT(id) FROM course";
        $result_1 = mysqli_query($conn, $sql1);
        $row_db = mysqli_fetch_row($result_1);
        $total_record = $row_db[0];
        $to_page = ($total_record / $limit);
        echo '<ul class="pagination admin-pagination">';
        if ($page > 1) {
          echo '<li class="page-item"><a class="page-link" href="course-list.php?page=' . ($page - 1) . '">&laquo;</a></li>';
        }
        for ($i = 1; $i < $to_page; $i++) {
          if ($i == $page) {
            $active = "active";
          } else {
            $active = "";
          }
          echo '<li class="' . $active . ' page-item"><a class="page-link" href ="course-list.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($to_page > $page) {
          echo '<li class="page-item"><a class="page-link" href="course-list.php?page=' . ($page + 1) . '">&raquo;</a></li>';
        }
        echo '</ul>'; ?>
      </div>
    </div>
  </div>
</div>
<?php include_once "footer.php"; ?>