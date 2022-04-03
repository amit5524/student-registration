<?php 
	try {
		$pdo = new PDO ('mysql:host=localhost; dbname=student_registration','root','');
	} catch (PDOException $e) {
		error_log("Caught $e");
	}
?>