<?php

session_start();
include_once('includes/bootstrap.php');
echo $user_id = $_SESSION['user_id'];

 $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);
    $user->logout();

    
    
        echo "unset successfully";
//         header("Location:Location:http://localhost/AssetManagementSystem/project/page-login.php");

    


?>