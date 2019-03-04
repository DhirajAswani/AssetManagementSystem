<?php
include_once('includes/bootstrap.php');

if(isset($_GET['request_id'])&isset($_GET['user_type']))
{
    $db=new Database();
    $conn=$db->getConnection();
    $user=new User($conn);
    $user->declineRequest($_GET['request_id'],$_GET['user_type']);
    

    echo $user_type=$_GET['user_type'];
        
    if($user_type == 6)
        {
            $url="Location:http://localhost/AssetManagementSystem/project/HOD_index.php";
        }else if($user_type==7)
        {
            $url="Location:http://localhost/AssetManagementSystem/project/DPO_index.php";

        }else if($user_type==8)
        {
            $url="Location:http://localhost/AssetManagementSystem/project/CPO_index.php";

        }else if($user_type==9)
        {
            $url="Location:http://localhost/AssetManagementSystem/project/principal_index.php";

        }else if($user_type==10)
        {
            $url="Location:http://localhost/AssetManagementSystem/project/store_manager_index.php";
        }

        header($url);
}

?>