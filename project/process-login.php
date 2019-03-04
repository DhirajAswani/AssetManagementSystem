<?php
include_once('includes/bootstrap.php');


if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);
    $result = $user->login($email,$password);
    $result_count = count($result);
    
    
    if($result)
    {
//        session_start();
        
        
        for($i = 0;$i<$result_count;$i++)
        {
            
//        echo "yes";
        $user_id =  $result[$i]['user_id'];
        $user_type = $result[$i]['user_type'];
           
            
            
        if($user_type == 1)
        {
             $_SESSION['user_id'] = $user_id;
             $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/index.php");
        }
        else if($user_type == 2)
        {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;          
            header("Location:http://localhost/AssetManagementSystem/project/student_index.php");
        }
        else if($user_type == 3)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/teacher_index.php");
        }
        else if($user_type == 4)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/lab_assistant_index.php");
        }
        else if($user_type == 5)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/accountant_index.php");
        }
        else if($user_type == 6)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/HOD_index.php");
        }
        else if($user_type == 7)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/DPO_index.php");
        }
        else if($user_type == 8)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            
            header("Location:http://localhost/AssetManagementSystem/project/CPO_index.php");
        }
        else if($user_type == 9)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/principal_index.php");
        }
        else if($user_type == 10)
        {
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            header("Location:http://localhost/AssetManagementSystem/project/store_manager_index.php");
        }
            
            
        }
    }
    else
    {
        echo "Invalid Password";
    }
    
    
    
    
    
    
}
//echo $_POST['email'];


?>