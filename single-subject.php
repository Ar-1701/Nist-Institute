<?php $active_page = 'subject';
include_once "header.php";
include_once "config.php";
$sub_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql  = "SELECT course.id,course.course_name,course.seat,course.fees,subjects.eligible,subjects.syllabus,
	subjects.about,subjects.objective FROM course
	 JOIN subjects
	ON course.id = subjects.id
	WHERE course.id = {$sub_id}";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
?>
		<!-- Main-content -->
		<div class="container">
			<h1 class="sub"><?php echo $row['course_name']; ?></h1>
		</div>
		<div class="container subject img-rounded">
			<h1 class="subName"><?php echo $row['course_name']; ?></h1>
			<ul class="sublist">
				<?php echo $row['about']; ?>
				<li>Fees: <?php echo $row['fees']; ?></li>
				<li>Seat : <?php
							$sql1 = "SELECT course.id,course.seat,admission.course FROM admission	
					JOIN course
					ON admission.course = course.id
					WHERE admission.course={$sub_id}";
							$query = mysqli_query($conn, $sql1);
							if ($row1 = mysqli_num_rows($query) > 0) {
								$fetch_data = mysqli_fetch_assoc($query);
								echo $fetch_data['seat'];
							} else {
								echo $row['seat'];
							} ?>
				</li>
			</ul>
			<h1 class="subName">Eligibility Criteria </h1>
			<ul>
				<li style="font-style: normal;font-family: sans-serif;font-weight: bold;
				font-size: large;list-style: none; color: #111">
					<?php echo $row['eligible']; ?>
				</li>
			</ul>
			<h1 class="subName">About the Programme </h1>
			<p style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 900;color: #111">Fast growing information technology and communication systems have become critical components of almost every company’s plan. All the companies leverage on the new information technologies and communication systems require expert professionals, who can apply computer science principles to solve problems and to interface between business and technology.
				<br> This six semester long undergraduate program creates skilled, adaptable graduates who are able to design computer-based solutions to address the need of various industry, commerce, science, entertainment and the public sector.
				<br> In this program students are exposed to foundations of computers & IT as well various languages for computer applications development including the latest developments in the industry so that students develop themselves as an application software developer for Desktop, Network based, Web based or mobile applications.
			</p>
			<h1 class="subName">Sllybus</h1>
			<ul>
				<?php echo $row['syllabus']; ?>
			</ul>
			<h1 class="subName">Career path you can choose after the course </h1>
			<ul>
				<?php echo $row['objective']; ?>
			</ul>
		</div>
<?php  }
} ?>
<br>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function() {
		$('.sub').focus();
		$(window).scrollTop($('.sub').position().top);
	});
</script>
<!-- footer -->
<?php include_once "footer.php"; ?>