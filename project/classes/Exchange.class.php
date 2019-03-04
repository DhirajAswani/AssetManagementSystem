<?php
class Exchange
{
    private $conn;
    private $table="exchange";
    private $requested_by;
    private $requested_to;
    
    public function __construct($conn)
    {
        $this->conn=$conn;
    }
    
    public function placeExchangeRequest($request_id, $requested_by, $requested_to,$quantity)
    {
        $sql = "INSERT INTO {$this->table} (request_id, request_by, request_to,quantity) VALUES (?,?,?,?)";
        $statement= $this->conn->prepare($sql);
        $inserted=$statement->execute([$request_id, $requested_by, $requested_to,$quantity]);
        //echo "hi";
        if($inserted)
        {
            echo "insertion done...";
        }
        
        //$error = $sql->errorInfo();

// see if anything is output here
        //print_r($error);
    }
    
    public function exchangeRequestsStatustoLabAssistants($my_id)
    {
        $sql="select user.name,exchange.quantity,asset.asset_name,lab_assistant.branch,lab_assistant.lab_assigned from 
        exchange,asset_request_status,asset,user,lab_assistant where user.user_id=asset_request_status.user_id and 
        asset_request_status.request_id=exchange.request_id and asset.asset_id=asset_request_status.asset_id and 
        asset_request_status.user_id=lab_assistant.user_id and request_by=$my_id and exchange.approved=0";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        //echo count($result);

//        for($i=0;$i<count($result);$i=$i+1)
//        {
//        echo $result[$i]['approved'];
//        }
        return $result;
    }
    
    public function exchangeRequestsStatustoTeachers($my_id)
    {
        $sql="select user.name,exchange.quantity,asset.asset_name,teacher.branch from 
        exchange,asset_request_status,asset,user,teacher where user.user_id=asset_request_status.user_id and 
        asset_request_status.request_id=exchange.request_id and asset.asset_id=asset_request_status.asset_id and 
        asset_request_status.user_id=teacher.user_id and request_by=$my_id  and exchange.approved=0";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        //echo count($result);

//        for($i=0;$i<count($result);$i=$i+1)
//        {
//        echo $result[$i]['approved'];
//        }
        return $result;
    }
    
    
    public function getRequestsForMeByLabAssistants($my_id)
    {
        $sql="select user.name,user.user_id,exchange.quantity,asset.asset_name,lab_assistant.branch,lab_assistant.lab_assigned,exchange.exchange_id from exchange,asset_request_status,asset,user,lab_assistant where exchange.request_id=asset_request_status.request_id and exchange.request_by=user.user_id and user.user_id=lab_assistant.user_id and asset_request_status.asset_id=asset.asset_id and exchange.request_to=$my_id and exchange.approved<>1";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
//        for($i=0;$i<count($result);$i=$i+1)
//        {
//        echo $result[$i]['approved'];
//        }
        return $result;
    }
    public function getRequestsForMeByTeachers($my_id)
    {
        $sql="select user.name,user.user_id,exchange.quantity,asset.asset_name,teacher.branch,exchange.exchange_id from exchange,asset_request_status,asset,user,teacher where exchange.request_id=asset_request_status.request_id and exchange.request_by=user.user_id and user.user_id=teacher.user_id and asset_request_status.asset_id=asset.asset_id and exchange.request_to=$my_id and exchange.approved<>1";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
//        for($i=0;$i<count($result);$i=$i+1)
//        {
//        echo $result[$i]['approved'];
//        }
        return $result;
    }
    public function approveExchangeRequest($exchange_id)
    {
        $sql = "UPDATE {$this->table} SET approved=1 where exchange_id=?";
        $statement= $this->conn->prepare($sql);
        $statement->execute([$exchange_id]);
        
        $sql="select * from exchange where exchange_id={$exchange_id}";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        $request_id=$result['request_id'];
        $quantity=$result['quantity'];
        
        $sql="select * from asset_request_status where request_id={$request_id}";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        $previous_quantity=$result['quantity'];
        $new_quantity=$previous_quantity-$quantity;
        echo $result['quantity'];
        
        
        $sql = "UPDATE asset_request_status SET quantity=$new_quantity where request_id=$request_id";
        $statement= $this->conn->prepare($sql);
        $statement->execute();
    }
    
    public function myExchangeAssetsFromLabAssistants($my_id)
    {
        $sql="select user.name,exchange.quantity,asset.asset_name,lab_assistant.branch,lab_assistant.lab_assigned from 
        exchange,asset_request_status,asset,user,lab_assistant where user.user_id=asset_request_status.user_id and 
        asset_request_status.request_id=exchange.request_id and asset.asset_id=asset_request_status.asset_id and 
        asset_request_status.user_id=lab_assistant.user_id and request_by=$my_id and exchange.approved=1";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    
    public function myExchangeAssetsFromTeachers($my_id)
    {
        $sql="select user.name,exchange.quantity,asset.asset_name,teacher.branch from 
        exchange,asset_request_status,asset,user,teacher where user.user_id=asset_request_status.user_id and 
        asset_request_status.request_id=exchange.request_id and asset.asset_id=asset_request_status.asset_id and 
        asset_request_status.user_id=teacher.user_id and request_by=$my_id  and exchange.approved=1";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    
    
}
?>