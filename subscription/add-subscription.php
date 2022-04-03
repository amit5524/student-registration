<?php 
	require '../include/header.php'; 
	require '../student/StudentController.php';
	require '../course/CourseController.php';
?>

<div class="card mt-5">
	<div class="card-header">
		<h2>Add Subscription</h2>
	</div>
	<div class="card-body">
		<form class="cmxform" action="actions.php" method="POST" id="subscriptionForm">
			<div class="form-group">
				<label for="student_name">Student Name</label>
				<select name="student_id" class="form-control" required>
					<option value="">Select Student</option>
					<?php 
						$students = new StudentController;
						$studentData = $students->all();
						foreach($studentData as $student):
					?>
					<option value="<?php echo $student->student_id; ?>">
						<?php echo $student->firstname.' '. $student->lastname; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<select name="course_id" class="form-control" required>
					<option value="">Select Course</option>
					<?php 
						$courses = new CourseController;
						$courseData = $courses->all();
						foreach($courseData as $course):
					?>
					<option value="<?php echo $course->course_id; ?>">
						<?php echo $course->course_name; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="add" class="btn btn-outline-primary" value="Submit" />
			</div>
		</form>
	</div>
</div>

<?php require '../include/footer.php'; ?>