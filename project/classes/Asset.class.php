<?php
class Asset
{
    private $conn;
    private $table = "asset";
    private $category_id;
    private $user_type;
    private $asset_id;
    private $user_id;
    private $quantity;
    private $total_price;
    private $asset_price;
    
    
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    public function viewAllAssets()
    {
        $sql="Select * from {$this->table}";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    
    public function viewAssetByCategory($category_id)
    {
        $sql="SELECT * from asset,category where asset.category_id = category.category_id and category.category_id =".$category_id;
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    
    public function viewAssetById($asset_id)
    {
        $sql="SELECT * from asset where asset_id = ".$asset_id;
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        $this->asset_price = $result['asset_price'];
        return $result;
    }
    
    public function insertInAssetRequestStatus($asset_id,$user_id,$quantity)
    {
        $result = $this->viewAssetById($asset_id);
        $total_price = $quantity * $this->asset_price;
        echo $total_price;
        $sql = "Insert into asset_request_status(asset_id,user_id,quantity,total_price)values(?,?,?,?);";
        $statement= $this->conn->prepare($sql);
        $inserted=$statement->execute([$asset_id, $user_id,$quantity,$total_price]);
        //echo "hi";
        if($inserted)
        {
            echo "insertion done...";
        }
    }
    
    public function viewAssets($user_id)
    {
        $sql="SELECT DISTINCT asset.asset_name,asset.category_id,asset.asset_price,asset_request_status.quantity,asset_request_status.date,asset_request_status.request_id FROM user,asset,asset_request_status where user.user_id=asset_request_status.user_id AND asset.asset_id= asset_request_status.asset_id AND (asset_request_status.ap_by_store_manager =1 or asset_request_status.approved_in_college=1) AND asset_request_status.user_id = $user_id AND asset_request_status.returned = 0";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
        
        
    }
    
    public function getCategoryNameById($category_id)
    {
        $sql = "select category_name from category where category_id = $category_id";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        return $result;
        
    }
    
    
    public function returnAsset($request_id)
    {
        $sql = "select quantity,asset_id FROM asset_request_status WHERE request_id = $request_id";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        $quantityOfARS=$result['quantity'];
        $asset_id = $result['asset_id'];
        
        
        $sql = "UPDATE asset_request_status SET quantity = 0 WHERE asset_request_status.request_id = ?";
        $statement= $this->conn->prepare($sql);
        $statement->execute([$request_id]);
        
        $sql = "select quantity FROM collegeassets WHERE asset_id = $asset_id";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        $Collegequantity=$result['quantity'];
        
        
        //calculating previous and new quantity of college
        $quantity = $Collegequantity + $quantityOfARS;
        echo "Quantity  ".$quantity;
        
        
        $sql = "UPDATE collegeassets SET quantity = $quantity WHERE collegeassets.asset_id = ?";
        $statement= $this->conn->prepare($sql);
        $statement->execute([$asset_id]);
        
        
        $sql = "UPDATE asset_request_status SET returned = 1 WHERE asset_request_status.request_id = ?";
        $statement= $this->conn->prepare($sql);
        $statement->execute([$request_id]);
        
        
        
    }
    
    
    
}
//include_once("Database.class.php");
//$db=new Database();
//$conn=$db->getConnection();
//$asset= new Asset($conn);
//$result = $asset->insertInAssetRequestStatus(2,1,10);


?>