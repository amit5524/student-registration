<?php 
	require '../include/header.php'; 
	require 'StudentController.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$student = new StudentController;
		$studentData = $student->byId($id);
	}
?>

<div class="card mt-5">
	<div class="card-header">
		<h2>Update Student Details</h2>
	</div>
	<div class="card-body">
		<form class="cmxform" action="actions.php" method="POST" id="studentForm">
			<input type="hidden" name="id" class="form-control" value="<?php echo $studentData->student_id; ?>">
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" minlength="3" maxlength="16"  class="form-control" placeholder="Enter first name" value="<?php echo $studentData->firstname; ?>" required>
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname"  minlength="1" maxlength="16"  class="form-control" placeholder="Enter last name" value="<?php echo $studentData->lastname; ?>" required>
			</div>
			<div class="form-group">
				<label for="dob">DOB</label>
				<input type="date" name="dob" class="form-control" value="<?php echo $studentData->dob; ?>" required>
			</div>
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" minlength="10" class="form-control" placeholder="Enter contact number" value="<?php echo $studentData->contact; ?>" required>
			</div>
			<div class="form-group">
				<input type="submit" name="update" class="btn btn-outline-primary" value="Update" />
			</div>
		</form>
	</div>
</div>

<?php require '../include/footer.php'; ?>