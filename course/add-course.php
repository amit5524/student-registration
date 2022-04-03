<?php require '../include/header.php'; ?>

<div class="card mt-5">
	<div class="card-header">
		<h2>Add Course Details</h2>
	</div>
	<div class="card-body">
		<form class="cmxform" action="actions.php" method="POST" id="courseForm">
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" name="course_name" minlength="1" class="form-control" placeholder="Enter course name" required>
			</div>
			<div class="form-group">
				<label for="course_details">Course Details</label>
				<textarea type="text" name="course_details" minlength="3" class="form-control" placeholder="Enter course detail" required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="register" class="btn btn-outline-primary" value="Submit" />
			</div>
		</form>
	</div>
</div>

<?php require '../include/footer.php'; ?>