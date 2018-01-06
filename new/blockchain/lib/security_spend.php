<?php 
include_once('../common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}

$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";
$currentpassword = "";
$currentspendingpassword = "";

$user_session = $_SESSION['user_session'];
$user_current_balance = 0;

$error = array();
$error2 = array();
$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
		$user_current_balance = $client->getBalance($user_session) - $fee;
	}
}
if(isset($_POST['btnSpending']))
{
	/*@$currentpassword = $_POST['currentpassword'];
	@$password = $_POST['signuppassword'];
	@$confirmpassword = $_POST['confirmpassword'];*/
	$spendingpassword = $_POST['spendingpassword'];
	$confirmspendingpassword = $_POST['confirmspendingpassword'];
	$currentspendingpassword = $_POST['currentspendingpassword'];

	
	if(empty($currentspendingpassword))
	{
		$error2['currentspendingpasswordError'] = "Please Provide your current Spending Password";
	}
	if(empty($spendingpassword))
	{
		$error2['spendingpasswordError'] = "Please Provide valid Spending Password";
	}
	if(empty($confirmspendingpassword))
	{
		$error2['confirmspendingpasswordError'] = "Please Provide valid Confirm Spending Password";
	}
	else if($confirmspendingpassword != $spendingpassword)
	{
		ob_start();
		header("Location:../security.php?m=data1");
	}
	
	$spendingpassword_value = hash('sha256',addslashes(strip_tags($currentspendingpassword)));
	$qstring = "select coalesce(id,0) as id
				from users where encrypt_username = '".hash('sha256',$user_session)."' and `transcation_password` = '" . $spendingpassword_value . "'";
	
	$result2 = $mysqli->query($qstring);
	$user2 = $result2->fetch_assoc();
	//var_dump($user);
	if ($user2['id'] <= 0)
	{
		$error2['currentspendingpasswordError'] = "Your current spending password is not match with our store password. Please provide valid one.";
	}
	
	if(empty($error2))
	{	
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

		$qstring = "update `users`set "; 
		$qstring .= "`transcation_password` = ";
		$qstring .= "'".$spendingpassword_value."' ";
		$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user2['id'];
		$result3 = $mysqli->query($qstring);
		if($result3)
		{
			$error2['currentspendingpasswordError2'] = "Your Spending Password has been successfully updated.";
			$spendingpassword = "";
			$confirmspendingpassword = "";
			$currentspendingpassword = "";
			header("Location:../security.php?m=data2");
		}
	}
}
else{ header("Location:../security.php?m=data1"); }
?>