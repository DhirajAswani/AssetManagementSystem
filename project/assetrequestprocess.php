<?php
//Include the database configuration file
include_once("includes/bootstrap.php");

$db=new Database();
$conn=$db->getConnection();
//$my_id=3;
if(!empty($_POST["category_id"])){
    $category_id = $_POST["category_id"];
    $asset= new Asset($conn);
    $result = $asset->viewAssetByCategory($category_id);
    echo json_encode($result);

}
?>