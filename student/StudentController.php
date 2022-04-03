<?php 
  require '../include/db.php'; 

class StudentController{

  public function add($firstname,$lastname,$dob,$contact){
    try {
      global $pdo;
      $query = $pdo->prepare('INSERT INTO students (firstname,lastname,dob,contact) VALUES (?,?,?,?)');
      $query->execute([$firstname,$lastname,$dob,$contact]);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }
  
  public function update($firstname,$lastname,$dob,$contact,$id){
    try {
      global $pdo;
      $query = $pdo->prepare('UPDATE students SET firstname=?,lastname=?,dob=?,contact=? WHERE student_id=?');
      $query->execute([$firstname,$lastname,$dob,$contact,$id]);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }

  public function delete($id){
    try {
      global $pdo;
      $pdo->beginTransaction();
      $query = $pdo->prepare('DELETE FROM course_subscription WHERE student_id=?');
      $query->execute([$id]);

      $query = $pdo->prepare('DELETE FROM students WHERE student_id=?');
      $query->execute([$id]);

      $pdo->commit();
    }catch (Exception $e) {
      $pdo->rollBack();
      error_log("Caught $e");
    }
  }

  public function all($fetchType = PDO::FETCH_OBJ){
    try {
      global $pdo;
      $query = $pdo->prepare('SELECT student_id, firstname, lastname, dob, contact FROM students ORDER BY student_id DESC');
      $query->execute();
      return $query->fetchAll($fetchType);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  }  
  
  public function byId($id){
    try {
      global $pdo;
      $query = $pdo->prepare('SELECT student_id, firstname, lastname, dob, contact FROM students  WHERE student_id=?');
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_OBJ);
    }catch (Exception $e) {
      error_log("Caught $e");
    }
  } 
}

?>