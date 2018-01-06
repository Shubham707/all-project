<?php 
include'../common.php';
$error = array();
$transactionList = array();
$user_session = $_SESSION['user_session'];
$user_current_balance = 0;
$reciever_address= "";
$coin_amount = 0;
$trans_desc ="";
$spendingpassword = "";
$user_current_balance2 = 0;
$client = "";
if(_LIVE_)
{
  $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
  if(isset($client))
  {
    $user_current_balance = $client->getBalance($user_session) - $fee;
    $user_current_balance2 = $user_current_balance;

  }
}

if(isset($_POST['btnlogin']))
{
//  var_dump($_POST);
  $coin_amount = $_POST['txtChar'];
  $reciever_address = $_POST['btcaddress'];
  $trans_desc = $_POST['discription'];
  $spendingpassword = $_POST['spendingpassword'];
  $user_current_balance = 0;
  
  if(_LIVE_)
{
  $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
  if(isset($client))
  {
    $user_current_balance = $client->getBalance($user_session) - $fee;
  }
}
  if (empty($reciever_address))
  {
    $error['reciever_addressError'] = "Please Provide valid Address";
  } 
  
  if (empty($coin_amount))
  {
    $error['txtCharError'] = "Please Provide valid Amount";
  } 
  if(empty($spendingpassword))
  {
    $error['spendingpasswordError'] = "Please Provide valid Spending Password";
  } 
  if ($coin_amount > $user_current_balance)
  {
    $error['txtCharError'] = "Withdrawal amount exceeds your wallet balance";
  }
  if(!empty($spendingpassword))
  {
    $qstring = "select coalesce(id,0) as id,coalesce(transcation_password,'') as transcation_password ";
    $qstring .= "from users WHERE encrypt_username = '" . hash('sha256',$user_session) . "'";
    
    $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
  
    $result = $mysqli->query($qstring);
    $user = $result->fetch_assoc();
    $transcation_password_v = $user['transcation_password'];
  
    if ($user['id']> 0 && ($transcation_password_v != $spendingpassword_value))
    {
      $error['spendingpasswordError'] = "Please provide valid Spending Password.";
    }
  }
  
  if(empty($error))
  {
    $withdraw_message = 'ssss';
    if(_LIVE_)
    {
      $withdraw_message = $client->withdraw('pennybchnew@gmail.com', 'mftd19Sm4PZ8uGm76RXoEU2dbTS74QNNDq', 0.01);
      //$withdraw_message = $client->payment($reciever_address,$coin_amount,'from $user_session');
    }
    header("Location:../bitcoin.php?m=".$withdraw_message);
  } 
}
?>