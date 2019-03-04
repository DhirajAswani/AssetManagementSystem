<?php

$request_id = $_GET['request_id'];

echo $request_id;

include_once('includes/bootstrap.php');
//echo $exchange_id = $_GET['exchange_id'];
//echo $quantity = $_GET['quantity'];

 $db=new Database();
                $conn=$db->getConnection();
                $asset=new Asset($conn);
                $result=$asset->returnAsset($request_id);
//                $results_count=count($result);



header("Location:http://localhost/AssetManagementSystem/project/student_index.php");


?>