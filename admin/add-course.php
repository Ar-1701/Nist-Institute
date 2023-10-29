<?php $active_page = 'add_course';
include_once "config.php";
include_once "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_GET['id'])) { ?>
                    <h1 class="admin-heading">Update Course</h1>
                <?php } else { ?>
                    <h1 class="admin-heading">Add New Course</h1>
                <?php } ?>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <?php
                if (isset($_GET['id'])) {
                    $course_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $sql = "SELECT course.id,course.course_name,course.fees,course.add_fees,course.examfee,course.otherfee,course.seat,subjects.id,subjects.eligible,subjects.syllabus,
                        subjects.about,subjects.objective FROM course
                        LEFT JOIN subjects
                        ON course.id = subjects.id
                        WHERE course.id = $course_id";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <form>
                                <div class="form-group">
                                    <input type="hidden" name="course_id" id="course_id" class="form-control" value="<?php echo $row['id']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTile">Title</label>
                                    <input type="text" name="course_name" class="form-control" id="course_name" value="<?php echo trim($row['course_name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTile">Fee</label>
                                    <input type="text" name="fees" title="Semester Wise Fees" class="form-control" id="fees" value="<?php echo trim($row['fees']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTile">Addmission Fee</label>
                                    <input type="text" name="add_fees" class="form-control" id="add_fees" value="<?php echo trim($row['add_fees']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Exam Fees</label>
                                    <input type="text" name="exam_fees" id="exam_fees" class="form-control" value="<?php echo trim($row['examfee']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Other Fees</label>
                                    <input type="text" name="other_fees" id="other_fees" class="form-control" value="<?php echo trim($row['examfee']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTile">Seat</label>
                                    <input type="text" name="seat" class="form-control" id="seat" value="<?php echo trim($row['seat']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Eligible</label>
                                    <textarea name="course_eligible" id="course_eligible" class="form-control" rows="5"><?php echo trim($row['eligible']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Syllabus</label>
                                    <textarea name="course_sly" id="course_sly" class="form-control" rows="5"><?php echo trim($row['syllabus']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Duration</label>
                                    <textarea name="course_duration" id="course_duration" class="form-control" rows="5"><?php echo trim($row['about']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Objective</label>
                                    <textarea name="objective" id="objective" class="form-control" rows="5"><?php echo trim($row['objective']); ?></textarea>
                                </div>
                                <input type="submit" id="course-submit" class="btn btn-primary" value="Update">
                            </form>
                    <?php }
                    }
                } else { ?>
                    <form id="add-form-course">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="course_name" id="course_name" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Fees</label>
                            <input type="text" name="fees" title="Semester Wise Fees" id="fees" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Addmission Fees</label>
                            <input type="text" name="add_fees" id="add_fees" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Exam Fees</label>
                            <input type="text" name="exam_fees" id="exam_fees" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Other Fees</label>
                            <input type="text" name="other_fees" id="other_fees" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>No Of Seats</label>
                            <input type="text" name="seat" id="seat" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Eligibility</label>
                            <textarea name="course_eligible" id="course_eligible" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">syllabus</label>
                            <textarea name="course_sly" id="course_sly" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Duration</label>
                            <textarea name="course_duration" id="course_duration" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Objective</label>
                            <textarea name=objective" id="objective" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="submit" id="course-submit" class="btn btn-primary" value="Submit">
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.js"></script>
<script>
    // <<<<<<----------INSERT COURSE--------->>>>>>
    $(document).ready(function() {
        $(document).on("click", "#course-submit", function(e) {
            e.preventDefault();
            var course_id = $("#course_id").val();
            var course_name = $("#course_name").val();
            var fees = $("#fees").val();
            var add_fees = $("#add_fees").val();
            var exam_fees = $("#exam_fees").val();
            var other_fees = $("#other_fees").val();
            var seat = $("#seat").val();
            var course_eligible = $("#course_eligible").val();
            var course_sly = $("#course_sly").val();
            var course_duration = $("#course_duration").val();
            var objective = $("#objective").val();
            if (course_name == "") {
                alert("Fill Course Name.");
            } else if (course_eligible == "") {
                alert("Fill Course Eligibility.");
            } else if (fees == "") {
                alert("Fill Fees.");
            } else if (add_fees == "") {
                alert("Fill addmission fees.");
            } else if (exam_fees == "") {
                alert("Fill Exam fees.");
            } else if (other_fees == "") {
                alert("Fill Other fees.");
            } else if (seat == "") {
                alert("Fill Seat.");
            } else if (course_sly == "") {
                alert("Fill Course Slybus.");
            } else if (course_duration == "") {
                alert("Fill Course Duration.");
            } else if (objective == "") {
                alert("Fill Course Duration.");
            }
            // Post Insert
            else {
                $.ajax({
                    url: "save-course.php",
                    type: "POST",
                    data: {
                        course_id: course_id,
                        course_name: course_name,
                        fees: fees,
                        add_fees: add_fees,
                        exam_fees: exam_fees,
                        other_fees: other_fees,
                        seat: seat,
                        objective: objective,
                        course_eligible: course_eligible,
                        course_sly: course_sly,
                        course_duration: course_duration
                    },
                    success: function(data) {
                        $("#add-form-course").trigger("reset");
                        window.location = "course-list.php";
                    }
                });
            }
        }); // submit btn CLosed 

    })
</script>
<?php include_once "footer.php"; ?>