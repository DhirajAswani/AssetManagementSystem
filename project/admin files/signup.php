<?php
include_once('includes/bootstrap.php'); 
if(isset($_POST['submit'])){
    $db=new Database();
    $conn=$db->getConnection();
    $user=new SignUp($conn);
    
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $usertype = $_POST['usertype'];
    $result=$user->insertInUser($name,$email,$password,$contact,$usertype);
    
    if($usertype == '2'){
        $studentbranch = $_POST['studentbranch'];
        $studentdivision = $_POST['studentdivision'];
        $studentrollno = $_POST['studentrollno'];
    $insert_in_Student = $user->insertInStudent($result,$studentbranch,$studentdivision,$studentrollno);
        
    }
    if($usertype == '3'){
        $teacherbranch = $_POST['teacherbranch'];
       
    $insert_in_Teacher = $user->insertInTeacher($result,$teacherbranch);
        
    }
    if($usertype == '4'){
        $labbranch = $_POST['labbranch'];
        $labassigned = $_POST['labassigned'];
       
    $insert_in_Lab_Assistant = $user->insertInLabassistant($result,$labbranch,$labassigned);
        
    }
    if($usertype == '10'){
         $storename= $_POST['storename'];
        $storeaddress = $_POST['storeaddress'];
        $storecontact = $_POST['storecontact'];
        
    $insert_in_Store_Manager = $user->insertInStoreManager($result,$storename,$storeaddress,$storecontact);
        
    }
}

?>