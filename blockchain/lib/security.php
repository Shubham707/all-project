<?php 
include_once('../common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
/*echo var_dump($_POST);
die();*/
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




if(isset($_POST['btnlogin']))
{
	//var_dump($_POST);
	
	
	$currentpassword = $_POST['currentpassword'];
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];
	/*@$spendingpassword = $_POST['spendingpassword'];
	@$confirmspendingpassword = $_POST['confirmspendingpassword'];
	@$currentspendingpassword = $_POST['currentspendingpassword'];*/

	if (empty($currentpassword))
	{
		$error['currentpasswordError'] = "Please Provide your current login password";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid Password";
	}
	if(empty($confirmpassword))
	{
		$error['confirmpasswordError'] = "Please Provide valid Confirm Password";
	}
	else if($confirmpassword != $password)
	{
		ob_start();
		header("Location:../security.php?m=data1");
	
	}
		
	$password_value = hash('sha256',addslashes(strip_tags($currentpassword)));
	$qstring = "select coalesce(id,0) as id
				from users WHERE encrypt_username = '".hash('sha256',$user_session)."' and `password` = '" . $password_value . "'";
	
	
//	echo $qstring;
//	die;
	$result	= $mysqli->query($qstring);
	$user = $result->fetch_assoc();

	if ($user['id'] <= 0)
	{
		$error['currentpasswordError'] = "Your current Login password is not match with our store password. Please provide valid one.";
	}
	
	if(empty($error))
	{	
		$password_value = hash('sha256',addslashes(strip_tags($password)));

		$qstring = "update `users`set "; 
		$qstring .= "`password` = ";
		$qstring .= "'".$password_value."'";
		$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user['id'];
		//echo $qstring;
		$result	= $mysqli->query($qstring);
		if($result)
		{
			header("Location:../security.php?m=data2");
		}
	}
}
else { 
	header("Location:../security.php?m=data1"); 
}

?>