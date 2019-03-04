<?php
session_start();
include_once('includes/bootstrap.php');
echo $user_id = $_SESSION['user_id'];
?>
<?php
$db=new Database();
$conn=$db->getConnection();
$exch=new Exchange($conn);

if(isset($_POST['user_id']))
{
    echo $_POST['user_id'];
    echo $_POST['asset'];
    echo $_POST['quantity'];
    $sql="SELECT * FROM asset_request_status where asset_request_status.request_id=".$_POST['asset'];
    $statement=$conn->prepare($sql);
    $statement->execute();
    $result=$statement->fetch();
    echo $result['quantity'];
    if($result['quantity']<$_POST['quantity'])
    {
        echo "Please enter valid quantity!!";
        //here I have to place a header to requestforexchange page with some url indicating error in quantity that will display some error there okay!
                header("Location:requestforexchangepage.php?q=quantity-incorrect");

    }else{
//        echo "place..it..";
        $exch->placeExchangeRequest($_POST['asset'],$user_id,$_POST['user_id'],$_POST['quantity']);
        
        header("Location:requestforexchangepage.php?q=success");
    }
}
?>