<?php
class Student{
    private $user_id;
    private $branch;
    private $division;
    private $roll_no;
    private $conn;
    
    
   
    public function __construct($conn){
        $this->conn = $conn;
    }
    
     function studentsOfDepartment($branch){
    
         $sql = "SELECT user.name , user.email , user.contact, student.branch, student.division,student.roll_no,user.user_id FROM student,user WHERE user.user_id = student.user_id AND user.user_type=2 AND student.deleted=0 AND user.deleted=0 AND student.branch = '$branch'";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    function teachersOfDepartment($branch){
          $sql = "SELECT user.name , user.email , user.contact,teacher.branch,user.user_id FROM teacher,user WHERE user.user_id = teacher.user_id AND user.user_type=3 AND teacher.branch = '$branch'";
         
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
     function labsOfDepartment($branch){
    
        
         $sql = "SELECT user.name , user.email , user.contact, lab_assistant.branch,lab_assistant.lab_assigned, user.user_id FROM lab_assistant,user WHERE user.user_id = lab_assistant.user_id AND user.user_type=4 AND lab_assistant.deleted =0 AND user.deleted=0 AND lab_assistant.branch = '$branch'";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    function deleteStudents($user_id,$branch){
    
         $sql = "UPDATE user,student SET user.deleted =1,student.deleted=1 WHERE user.user_id=student.user_id AND user.user_id={$user_id} AND student.user_id={$user_id} AND student.branch='$branch'";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    function deleteTeachers($user_id,$branch){
    
         $sql = "UPDATE user,teacher SET user.deleted =1,teacher.deleted=1 WHERE user.user_id=teacher.user_id AND user.user_id={$user_id} AND teacher.user_id={$user_id} AND teacher.branch='$branch'";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    function deleteLabAssistants($user_id,$branch){
    
         $sql = "UPDATE user,lab_assistant SET user.deleted =1,lab_assistant.deleted=1 WHERE user.user_id=lab_assistant.user_id AND user.user_id={$user_id} AND lab_assistant.user_id={$user_id} AND lab_assistant.branch='$branch'";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    
//     function fetchStudents($user_id,$branch){
//    
//         $sql ="SELECT user.name , user.email , user.contact, student.branch, student.division,student.roll_no FROM student,user WHERE user.user_id = student.user_id AND user.user_type=2 AND student.deleted=0 AND user.deleted=0 AND student.branch = '$branch' AND user.user_id={$user_id}";
//        $statement = $this->conn->prepare($sql);
//		$statement->execute();
//		$result = $statement->fetchAll();
//         return $result;
//    }
    
    
     function updateUser($query){
         $sql = "$query";
        $statement = $this->conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
         return $result;
    }
    
    public function getUserId(){
        return $this->user_id;
    }
    
    public function getBranch(){
        return $this->branch;
    }
    
    public function getDivision(){
        return $this->division;
    }
    
    public function getRollNo(){
        return $this->roll_no;
    }
    
}
// include_once ("Database.class.php");
//  $db = new Database();
//  $connection = $db->getConnection();
//  $studentObj = new Student($connection);
//  $result = $studentObj->updateUser();
//   echo count($result); 
//// echo count($result);
//echo $result;



?>
