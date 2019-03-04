<?php

session_start();
include_once('includes/bootstrap.php');
echo $user_id = $_SESSION['user_id'];

 $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);
    $result = $user->logout();

    if($result)
    {
        echo "unset successfully";
    }
    else{
        echo "not set";
    }


?>