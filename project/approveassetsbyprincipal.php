<?php
include_once('includes/bootstrap.php');
echo $request_id = $_GET['request_id'];
//echo $quantity = $_GET['quantity'];

 $db=new Database();
                $conn=$db->getConnection();
                $user=new User($conn);

if(isset($_GET['q']))
{
    if($_GET['q']=='college'){
             $user->approveRequestByPrincipalinCollege($request_id);   
    }
    else if($_GET['q']=='store'){
        $user->approveRequestByPrincipal($request_id);
    }
//                $results_count=count($result);

}

//header("Location:http://localhost/AssetManagementSystem/project/HOD_index.php");
header("Location:http://localhost/AssetManagementSystem/project/principal_index.php");


?>