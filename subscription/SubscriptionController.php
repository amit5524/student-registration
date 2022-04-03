<?php 
  require '../include/db.php'; 

class SubscriptionController{

  public function add($student_id,$course_id){
    try {
      global $pdo;
      $query = $pdo->prepare('INSERT INTO course_subscription (student_id,course_id) VALUES (?,?)');
      $query->execute([$student_id,$course_id]);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }
  
  public function all($fetchType = PDO::FETCH_OBJ){
    try {
      global $pdo;
      $query = $pdo->prepare('SELECT * FROM course_subscription
      LEFT JOIN students ON course_subscription.student_id = students.student_id
      LEFT JOIN courses ON course_subscription.course_id = courses.course_id 
      ORDER BY subscription_id DESC');
      $query->execute();
      return $query->fetchAll($fetchType);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }  
  
}

?>
