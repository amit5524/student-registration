<?php 
  require '../include/db.php'; 

class CourseController{

  // To add the course
  public function add($course_name,$course_details){
    try {
      global $pdo;
      $query = $pdo->prepare('INSERT INTO courses (course_name,course_details) VALUES (?,?)');
      $query->execute([$course_name,$course_details]);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }
  
  // To update the course
  public function update($course_name,$course_details,$id){
    try {
      global $pdo;
      $query = $pdo->prepare('UPDATE courses SET course_name=?,course_details=? WHERE course_id=?');
      $query->execute([$course_name,$course_details,$id]);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }

  // To delete the course
  public function delete($id){
    try {
      global $pdo;
      $pdo->beginTransaction();
      $query = $pdo->prepare('DELETE FROM course_subscription WHERE course_id=?');
      $query->execute([$id]);

      $query = $pdo->prepare('DELETE FROM courses WHERE course_id=?');
      $query->execute([$id]);
      $pdo->commit();
    }catch (Exception $e) {
      $pdo->rollBack();
      error_log("Caught $e");
    }
  }

  // To get all the records of course
  public function all($fetchType = PDO::FETCH_OBJ){
    try {
      global $pdo;
      $query = $pdo->prepare('SELECT course_id, course_name, course_details FROM courses ORDER BY course_id DESC');
      $query->execute();
      return $query->fetchAll($fetchType);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }  
  
  // To get a specific record of course
  public function byId($id){
    try {
      global $pdo;
      $query = $pdo->prepare('SELECT course_id, course_name, course_details FROM courses  WHERE course_id=?');
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_OBJ);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }

}

?>