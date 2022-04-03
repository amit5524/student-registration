<?php 
	require '../include/header.php'; 
	require 'CourseController.php';
?>

<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$course = new CourseController;
		$courseData = $course->byId($id);
	}
?>

<div class="card mt-5">
	<div class="card-header">
		<h2>Update Course Details</h2>
	</div>

	<div class="card-body">
		<form class="cmxform" action="actions.php" method="POST" id="courseForm">
			<input type="hidden" name="id" class="form-control" value="<?php echo $courseData->course_id; ?>">
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" name="course_name" class="form-control" value="<?php echo $courseData->course_name; ?>" required>
			</div>
			<div class="form-group">
				<label for="course_details">Course Details</label>
				<input type="text" name="course_details" class="form-control" value="<?php echo $courseData->course_details; ?>" required>
			</div>
			<div class="form-group">
				<input type="submit" name="update" class="btn btn-outline-primary" value="Update" />
			</div>
		</form>
	</div>
</div>

<?php require '../include/footer.php'; ?>