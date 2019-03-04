<?php
class User
{
    private $conn;
    private $table = 'user';
    
    
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    public function login($email,$password)
    {
        session_start();
        $sql = "select * from {$this->table} where email = '$email' and password = '$password'";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    
    public function logout()
    {
//        session_start();
        
        session_destroy();
        header("Location:http://localhost/AssetManagementSystem/project/page-login.php");
    }
    
    public function displayHODRequestsTable()
    {
      $sql = "select name,email,asset_name,asset_price,quantity,date,request_id from user u , asset_request_status aa,asset a where u.user_id = aa.user_id and a.asset_id = aa.asset_id and ap_by_hod = 0 and ap_by_dpo = 0 and ap_by_cpo = 0 and ap_by_principal = 0 and ap_by_store_manager = 0";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
    
     public function displayDPORequestsTable()
    {
      $sql = "select name,email,asset_name,asset_price,quantity,date,request_id from user u , asset_request_status aa,asset a where u.user_id = aa.user_id and a.asset_id = aa.asset_id and ap_by_hod = 1 and ap_by_dpo = 0 and ap_by_cpo = 0 and ap_by_principal = 0 and ap_by_store_manager = 0";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
     public function displayCPORequestsTable()
    {
      $sql = "select name,email,asset_name,asset_price,quantity,date,request_id from user u , asset_request_status aa,asset a where u.user_id = aa.user_id and a.asset_id = aa.asset_id and ap_by_hod = 1 and ap_by_dpo = 1 and ap_by_cpo = 0 and ap_by_principal = 0 and ap_by_store_manager = 0";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
    
     public function displayPrincipalRequestsTable()
    {
      $sql = "SELECT name,email,asset_request_status.request_id,asset.asset_name,asset_request_status.quantity,asset_request_status.total_price,asset_request_status.date FROM asset_request_status,user,asset,collegeassets WHERE asset.asset_id=asset_request_status.asset_id and asset_request_status.asset_id=collegeassets.asset_id and collegeassets.asset_id=asset.asset_id and  
user.user_id=asset_request_status.user_id and ap_by_hod=1 and ap_by_dpo=1 and ap_by_cpo=1 and 
ap_by_principal=0 and approved_in_college=0 and ap_by_store_manager=0 and collegeassets.quantity<asset_request_status.quantity";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
    
    public function displayPrincipalRequestsTableCollegeResolvable()
    {
      $sql = "SELECT name,email,asset_request_status.request_id,asset.asset_name,asset_request_status.quantity,asset_request_status.total_price,asset_request_status.date FROM asset_request_status,user,asset,collegeassets WHERE asset.asset_id=asset_request_status.asset_id and asset_request_status.asset_id=collegeassets.asset_id and collegeassets.asset_id=asset.asset_id and  
user.user_id=asset_request_status.user_id and ap_by_hod=1 and ap_by_dpo=1 and ap_by_cpo=1 and 
ap_by_principal=0 and approved_in_college=0 and ap_by_store_manager=0 and collegeassets.quantity>asset_request_status.quantity";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
    
     public function displayStoreManagerRequestsTable()
    {
      $sql = "select name,email,asset_name,asset_price,quantity,date,request_id from user u , asset_request_status aa,asset a where u.user_id = aa.user_id and a.asset_id = aa.asset_id and ap_by_hod = 1 and ap_by_dpo = 1 and ap_by_cpo = 1 and ap_by_principal = 1 and ap_by_store_manager = 0";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
    }
    
    public function approveRequestByHod($request_id,$quantity)
    {
        $sql = "UPDATE asset_request_status set ap_by_hod = 1 where request_id = $request_id and quantity = $quantity ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
        
    }
    public function approveRequestByDpo($request_id,$quantity)
    {
        $sql = "UPDATE asset_request_status set ap_by_dpo = 1 where request_id = $request_id and quantity = $quantity ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
        
    }
     public function approveRequestByCpo($request_id,$quantity)
    {
        $sql = "UPDATE asset_request_status set ap_by_cpo = 1 where request_id = $request_id and quantity = $quantity ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;  
        
    }
     public function approveRequestByPrincipal($request_id)
    {
        $sql = "UPDATE asset_request_status set ap_by_principal = 1 where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
//        $result = $statement->fetchAll();
//        return $result;  
        
    }
    
    public function approveRequestByPrincipalinCollege($request_id)
    {
        $sql = "UPDATE asset_request_status set ap_by_principal = 1,approved_in_college=1 where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
      
        $sql = "select * from asset_request_status where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        $quantity_asked=$result['quantity'];
        $asset_asked=$result['asset_id'];
        
        $sql = "select * from collegeassets where asset_id = $asset_asked";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        $quantity_available=$result['quantity'];
        
        $new_quantity=$quantity_available-$quantity_asked;
        
        $sql = "UPDATE collegeassets set quantity=$new_quantity where asset_id = $asset_asked";
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        
    }
    
    public function approveRequestByStore($request_id)
    {
        $sql = "UPDATE asset_request_status set ap_by_store_manager = 1 where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        
        $sql = "select * from asset_request_status where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
//        $quantity_asked=$result['quantity'];
        echo $asset_asked=$result['asset_id'];
        
        $sql = "select * from collegeassets where asset_id = $asset_asked";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        echo $result['asset_id'];
        $zero=0;
        if($result!=null)
        {
            echo "do nothing..";
        }
        else
        {
            $sql="INSERT INTO collegeassets (asset_id,quantity) VALUES (?,?)";
            $statement= $this->conn->prepare($sql);
            $inserted=$statement->execute([$asset_asked, $zero]);
            echo "inserted";
        }
    }

    public function declineRequest($request_id,$user_type)
    {
        if($user_type==6)
        {
            $column="ap_by_hod";
        }else if($user_type==7)
        {
                        $column="ap_by_dpo";

        }else if($user_type==8)
        {
                        $column="ap_by_cpo";

        }else if($user_type==9)
        {
                        $column="ap_by_principal";

        }else if($user_type==10)
        {
                        $column="ap_by_store_manager";

        }
        $sql = "UPDATE asset_request_status set $column = -1 where request_id = $request_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        echo "declined ....";
    }
    public function viewDeclinedRequests()
    {
        $sql = "select * from asset_request_status where asset_request_status.ap_by_hod=-1 or asset_request_status.ap_by_dpo=-1 or asset_request_status.ap_by_cpo=-1 or asset_request_status.ap_by_principal=-1 or asset_request_status.ap_by_store_manager=-1 ";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


    
    
    
}



?>