<?php
include_once('includes/bootstrap.php'); 


if(isset($_POST['studentsubmit'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $division = $_POST['division'];
    $rollno = $_POST['rollno'];
     $db=new Database();
                $conn=$db->getConnection();
                $student=new Student($conn);               
    $sql="UPDATE user,student SET user.name ='".$name."',user.email ='".$email."',user.contact ='".$contact."' ,student.branch ='".$branch."',student.division ='".$division."',student.roll_no ='".$rollno."' WHERE user.user_id=student.user_id AND user.user_id =".$user_id;
              $result=$student->updateUser($sql);
//   echo $sql;
    
   header("Location:http://localhost/AssetManagementSystem/project/student.php?studentbranch=$branch"); 
}
if(isset($_POST['teachersubmit'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
   
     $db=new Database();
                $conn=$db->getConnection();
                $student=new Student($conn);               
    $sql="UPDATE user,teacher SET user.name ='".$name."',user.email ='".$email."',user.contact ='".$contact."' ,teacher.branch ='".$branch."' WHERE user.user_id=teacher.user_id AND user.user_id =".$user_id;
              $result=$student->updateUser($sql);
//   echo $sql;
    
   header("Location:http://localhost/AssetManagementSystem/project/student.php?teacherbranch=$branch"); 
}
if(isset($_POST['labsubmit'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $labassigned = $_POST['labassigned'];
     $db=new Database();
                $conn=$db->getConnection();
                $student=new Student($conn);               
    $sql="UPDATE user,lab_assistant SET user.name ='".$name."',user.email ='".$email."',user.contact ='".$contact."' ,lab_assistant.branch ='".$branch."',lab_assistant.lab_assigned ='".$labassigned."' WHERE user.user_id=lab_assistant.user_id AND user.user_id =".$user_id;
              $result=$student->updateUser($sql);
//   echo $sql;
    
   header("Location:http://localhost/AssetManagementSystem/project/student.php?labbranch=$branch"); 
}


?>