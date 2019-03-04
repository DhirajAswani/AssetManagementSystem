<?php
class SignUp{
    private $table = "user";
//    private $user_id;
    private $name;
    private $email;
    private $password;
    private $contact;
    private $user_type;
    private $student_branch;
    private $student_division;
    private $student_rollno;
    private $teacher_branch;
    private $lab_branch;
    private $lab_assigned;
    private $store_name;
    private $store_address;
    private $store_contact;
    private $last_inserted_id;
    private $conn;
    
    
   
    public function __construct($conn){
        $this->conn = $conn;
    }
    
    function insertInUser($name,$email,$password,$contact,$user_type){
        $sql = "INSERT INTO {$this->table} (name,email,password,contact,user_type) VALUES (?,?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        $inserted = $statement->execute([$name,$email,$password,$contact,$user_type]);
        if($inserted)
        {
            echo"inserted";
        }
//        $this->last_inserted_id;
//        $last_inserted_id =$this->lastInsertId();
//        return $last_inserted_id;
        $last_id = $this->conn->lastInsertId();
        return $last_id;
//        if($user_type == 2){
//            signUpAsStudent($last_inserted_id,$student_branch,$student_division,$student_rollno);
//        }
//        
	    	
    }
    
     function insertInStudent($user_id,$student_branch,$student_division,$student_rollno){
         
        $sql = "INSERT INTO student (user_id,branch,division,roll_no) VALUES (?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        $inserted = $statement->execute([$user_id,$student_branch,$student_division,$student_rollno]);
        if($inserted)
        {
            echo"inserted";
        }
 
     }
    
    function insertInTeacher($user_id,$teacher_branch){
        $sql = "INSERT INTO teacher (user_id,branch) VALUES (?,?)";
        $statement = $this->conn->prepare($sql);
        $inserted = $statement->execute([$user_id,$teacher_branch]);
        if($inserted)
        {
            echo"inserted";
        }
 
     }
    
    function insertInLabassistant($user_id,$lab_branch,$lab_assigned){
        $sql = "INSERT INTO lab_assistant (user_id,branch,lab_assigned) VALUES (?,?,?)";
        $statement = $this->conn->prepare($sql);
        $inserted = $statement->execute([$user_id,$lab_branch,$lab_assigned]);
        if($inserted)
        {
            echo"inserted";
        }
 
     }
    
    function insertInStoreManager($user_id,$store_name,$store_address,$store_contact){
        $sql = "INSERT INTO store_manager (user_id,store_name,store_address,store_contact) VALUES (?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        $inserted = $statement->execute([$user_id,$store_name,$store_address,$store_contact]);
        if($inserted)
        {
            echo"inserted";
        }
 
     }

    
    
    
    
    
    
  
    

    
    
}
//include_once("Database.class.php");
//  $db = new Database();
//  $connection = $db->getConnection();
//  $signUpObj = new SignUp($connection);
//  $result = $signUpObj->insertInUser("abc","a@g.c","ghj","12345678","2");
////  echo count($result); 
// print_r($result); 
// 
 

?>