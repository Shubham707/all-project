<?php 
include_once('common.php');
//ALTER TABLE `users` ADD `otp_value` VARCHAR(500) NULL DEFAULT '' AFTER `authused`, ADD `is_email_verify` TINYINT NULL DEFAULT '0' AFTER `otp_value`;

page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}

$otp_value = "";

$user_session = $_SESSION['user_session'];
$user_current_balance = 0;

$error = array();
$error = array();
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
	$otp_value = $_POST['otp_value_text'];
	
	//var_dump($otp_value); 
	if(empty($otp_value))
	{
		$error['otpError'] = "Please Provide your Valid OTP Value";
	}

	if(empty($error))
	{
	$otp_value_string = hash('sha256',addslashes(strip_tags($otp_value)));
	$qstring = "select coalesce(id,0) as id
				from users where otp_value = '" . $otp_value_string . "'";
	
	$user2 = array();
	$result2 = $mysqli->query($qstring);
//	var_dump($result2);
	if($result2)
	{
		$user2 = $result2->fetch_assoc();
	}
	//var_dump($user);
	if ($user2['id'] <= 0)
	{
		$error['otpError'] = "Your provided OTP Value do not match with  with our store Value. Please provide valid one.";
	}
	
	
	if(empty($error))
	{
		$_SESSION['is_email_verify'] = 1;
		$qstring = "update `users`set "; 
		$qstring .= "`is_email_verify` = 1 ";
		$qstring .= " WHERE ";
		//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
		$qstring .= " id = ".$user2['id'];
		$result3 = $mysqli->query($qstring);
		if($result3)
		{
			$error['otpError'] = "Your Email has been successfuly verified.";
			$otp_value = "";
		}
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="default">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 col-md-6 col-md-offset-3 shadow_four">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">OTP VERIFY</div>
				<div class="panel-body">
				   <div id="register">
					<form  name="frm_obj" method="post" action="login.php">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="OTP" name="otp_value" type="text" id="otp_value" onkeyup="checkemail();" required value="<?php echo $email_id;?>">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>		
								<span id="email_status" style="color:red;"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="txtpassword" id="signuppassword" type="password" required value="<?php echo $password;?>">
											<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" type="password" required value="<?php echo $password;?>">
											<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>
							</div>
							<input type="submit" type="submit" name="btnlogin" class="btn btn-primary" value="Submit">
						</fieldset>
					</div>
					</form>
				</div>
			  </div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
//$(document).ready();  
function checkemail()
{
 var email=document.getElementById( "txtEmailID" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/check_availability.php',
  data: { username:email },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true; 
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

</script>
</body>
</html>
