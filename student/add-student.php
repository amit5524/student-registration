<?php require '../include/header.php'; ?>

<div class="card mt-5">
	<div class="card-header">
		<h2>Add Student Details</h2>
	</div>
	<div class="card-body">
		<form class="cmxform" action="actions.php" method="POST" id="studentForm">
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" minlength="3" maxlength="16"  class="form-control" placeholder="Enter first name" required>
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname"  minlength="1" maxlength="16"  class="form-control" placeholder="Enter last name" required>
			</div>
			<div class="form-group">
				<label for="dob">DOB</label>
				<input type="date" name="dob" class="form-control" placeholder="Select DOB" required>
			</div>
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" minlength="10" class="form-control" placeholder="Enter contact number" required>
			</div>
			<div class="form-group">
				<input type="submit" name="register" class="btn btn-outline-primary" value="Submit" />
			</div>
		</form>
	</div>
</div>

<?php require '../include/footer.php'; ?>