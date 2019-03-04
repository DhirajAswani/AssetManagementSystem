<?php
session_start();
include_once('includes/bootstrap.php');
echo $user_id = $_SESSION['user_id'];
$db=new Database();
$conn=$db->getConnection();
if(isset($_POST['submit'])){
    //echo"hello";
    $asset_id = $_POST['asset_id'];
    $quantity = $_POST['quantity'];
    $asset= new Asset($conn);
    $result = $asset->insertInAssetRequestStatus($asset_id,$user_id,$quantity);
    header("Location:".BASEURL."project/requestasset.php");
}
?>