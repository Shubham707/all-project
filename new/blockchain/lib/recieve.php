<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$error = array();
$transactionList = array();
$user_session = $_SESSION['user_session'];
$user_current_balance = 0
i;f(isset($_GET['nad']))
{
	$new_address = $_GET['nad'];
}

$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
		$transactionList = $client->getTransactionList($user_session);
		$user_current_balance = $client->getBalance($user_session) - $fee;
		header("Location:../betcoin.php?m=Coin Recieved Successfully!");
	}
}

?>