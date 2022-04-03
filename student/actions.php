<?php 
	require '../include/db.php';
    require 'StudentController.php';
?>

<?php 

if (isset($_POST['register'])) {
	$firstname = htmlspecialchars(strip_tags($_POST['firstname']));
	$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
	$dob = htmlspecialchars(strip_tags($_POST['dob']));
	$contact = htmlspecialchars(strip_tags($_POST['contact']));

	if (!empty($firstname) && !empty($lastname) && !empty($dob) && !empty($contact)) {
		$student = new StudentController;
		$student->add($firstname,$lastname,$dob,$contact);
		header('location:index.php?registered');
	}
}

if (isset($_POST['update'])) {
	$firstname = htmlspecialchars(strip_tags($_POST['firstname']));
	$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
	$dob = htmlspecialchars(strip_tags($_POST['dob']));
	$contact = htmlspecialchars(strip_tags($_POST['contact']));
	$id = htmlspecialchars(strip_tags($_POST['id']));

	if (!empty($firstname) && !empty($lastname) && !empty($dob) && !empty($contact)) {
		$student = new StudentController;
		$student->update($firstname,$lastname,$dob,$contact,$id);
		header('location:index.php?updated');
	}
}

if (isset($_GET['id'])) {
	$student = new StudentController();
	$result = $student->delete($_GET['id']);
	header("location:index.php?deleted");
}


