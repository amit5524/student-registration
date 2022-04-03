<?php 
	require '../include/db.php';
    require 'CourseController.php';
?>

<?php 

if (isset($_POST['register'])) {
	$course_name = htmlspecialchars(strip_tags($_POST['course_name']));
	$course_details = htmlspecialchars(strip_tags($_POST['course_details']));

	if (!empty($course_name) && !empty($course_details)) {
		$course = new CourseController;
		$course->add($course_name,$course_details);
		header('location:index.php?added');
	}
}

if (isset($_POST['update'])) {
	$course_name = htmlspecialchars(strip_tags($_POST['course_name']));
	$course_details = htmlspecialchars(strip_tags($_POST['course_details']));
	$id = htmlspecialchars(strip_tags($_POST['id']));
	
	if (!empty($course_name) && !empty($course_details)) {
		$course = new CourseController;
		$course->update($course_name,$course_details,$id);
		header('location:index.php?updated');
	}
}

if (isset($_GET['id'])) {
	$course = new CourseController();
	$result = $course->delete($_GET['id']);
	header("location:index.php?deleted");
}


