<?php 
	require '../include/db.php';
    require 'SubscriptionController.php';

// Action to add a subscription
if (isset($_POST['add'])) {
	$student_id = $_POST['student_id'];
	$course_id = $_POST['course_id'];

	if (!empty($student_id) && !empty($course_id)) {
		$subscription = new SubscriptionController;
		$subscription->add($student_id,$course_id);
		header('location:index.php?added');
	}
}

?>