<?php 
include_once('../common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
if(@$_REQUEST['btnverify']!=='')
{
	
	$new_password = rand(0,99999999);
	$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
	
	$sub =" Email Verification Mail";
	$message_body =" Dear User \n";
	$message_body .= " Your email verification OTP is $new_password \n\n";
	$message_body .= " \n\n";
	$message_body .= " Thanks \n";
	$message_body .= " Administrator";
	
	$qstring = "update users set `otp_value` ='".$otp_value."'"; 
	$qstring .= " WHERE ";
//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
	$qstring .= " id = ".$_SESSION['user_id'];
	//echo $new_password; 
	$result2	= $mysqli->query($qstring);
//	$user2 = $result2->fetch_assoc();
	
	sendpmail($user_session,$sub,$message_body);
	
	header("Location:../security.php?mail=Mail Send Successfull!");
	exit();
}
else 
	{ "Location:../security.php?mail=OTP No is Not send!"; }
?>