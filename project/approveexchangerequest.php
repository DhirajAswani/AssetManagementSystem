<?php

//echo $_GET['exchange_id'];
echo "hello";


include_once('includes/bootstrap.php');
echo $exchange_id = $_GET['exchange_id'];
//echo $quantity = $_GET['quantity'];

 $db=new Database();
                $conn=$db->getConnection();
                $ex=new Exchange($conn);
                $result=$ex->approveExchangeRequest($exchange_id);
//                $results_count=count($result);



header("Location:http://localhost/AssetManagementSystem/project/lab_assistant_index.php");




?>
