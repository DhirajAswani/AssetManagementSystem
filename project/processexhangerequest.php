<?php
//Include the database configuration file
include_once("classes/Database.class.php");
$db=new Database();
$conn=$db->getConnection();
$my_id=3;
if(!empty($_POST["user_id"])){
    
    $sql="SELECT * FROM asset_request_status,asset where asset.asset_id=asset_request_status.asset_id and asset_request_status.user_id=".$_POST['user_id'];
    $statement=$conn->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}
//if(!empty($_POST["lab_assistant_id"])){
//    $sql="SELECT * FROM asset_request_status,asset where asset.asset_id=asset_request_status.asset_id and asset_request_status.user_id=".$_POST['lab_assistant_id'];
//    $statement=$conn->prepare($sql);
//    $statement->execute();
//    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
//    echo json_encode($result);
//}

if(!empty($_POST["labassistant_id"])){
    
    $sql="SELECT * FROM asset_request_status,asset where asset.asset_id=asset_request_status.asset_id and asset_request_status.user_id=".$_POST['labassistant_id'];
    $statement=$conn->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}
?>