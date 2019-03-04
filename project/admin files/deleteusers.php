<?php
include_once('includes/bootstrap.php'); 
//$branch = $_GET['branch'];
$studentbranch = $_GET['studentbranch'];
$teacherbranch = $_GET['teacherbranch'];
$labbranch =$_GET['labbranch'];
$user_id = $_GET['user_id'];
//echo $user_id;    

 $db=new Database();
                $conn=$db->getConnection();
                $student=new Student($conn);
                $result=$student->deleteStudents($user_id,$studentbranch);
                $results_count=count($result);
//             $results_count;
                $resultTeachers=$student->deleteTeachers($user_id,$teacherbranch);
                $result_count_Teachers = count($resultTeachers);

                $resultLabAssistants=$student->deleteLabAssistants($user_id,$labbranch);
                $result_count_LabAssistants = count($resultLabAssistants);
if($studentbranch!=null){
                header("Location:http://localhost/AssetManagementSystem/project/student.php?studentbranch=$studentbranch");
}
               
if($teacherbranch!=null){
                header("Location:http://localhost/AssetManagementSystem/project/student.php?teacherbranch=$teacherbranch");
}
 if($labbranch!=null){
                header("Location:http://localhost/AssetManagementSystem/project/student.php?labbranch=$labbranch");
}

?>