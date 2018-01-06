<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id ="";
$password = "";

//echo "           =>>>>>>> ".hash('sha256',addslashes(strip_tags($email_id)));
//echo "</br> </br> </br> </br> </br> </br> </br>           =>>>>>>> ".hash('sha256',addslashes(strip_tags($password)))."</br> </br> ";
$error = array();
if(isset($_POST['btnlogin']))
{
//	var_dump($_POST);
	$email_id = $_POST['txtEmailID'];
	$password = $_POST['txtpassword'];

	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid passowrd";
	}
	elseif (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}

	if(empty($error))
	{
		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		$password_value = hash('sha256',addslashes(strip_tags($password)));
		$qstring = "select coalesce(id,0) as id, coalesce(username,'') as username,
					coalesce(password,'') as password,
					coalesce(email,'') as email_id,
					coalesce(admin,'') as admin,
					coalesce(locked,0) as locked,
					coalesce(supportpin,'') as supportpin,
					coalesce(is_email_verify,0) as is_email_verify,
					coalesce(secret,'') as secret,
					coalesce(authused,0) as authused
					from merchantuser WHERE username= '$email_id' AND  encrypt_username = '" . hash('sha256',$email_id) . "'";
		
		$result	= $mysqli->query($qstring);
		$user = $result->fetch_assoc();
		//var_dump($user);
		
		$secret = $user['secret'];
		if (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 0))
		{
			//	session_start();
			session_regenerate_id (true); //prevent against session fixation attacks.
								
			//var_dump($user);
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_email_id'] = $user['email_id'];
			$_SESSION['user_session'] = $user['username'];
			$_SESSION['user_admin'] = $user['admin'];
			$_SESSION['user_supportpin'] = $user['supportpin'];
			$_SESSION['is_email_verify'] = $user['is_email_verify'];
			
			header("Location:bitcoin.php");
			exit();

		} 
		elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 1))
		{
			$pin = $user['supportpin'];
			$error['emailError'] = "Account is locked. Contact support for more information. $pin";
		}
		elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 1 && ($oneCode == $_POST['auth']))) 
		{
			//		session_start();
			session_regenerate_id (true); //prevent against session fixation attacks.
								
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_email_id'] = $user['email_id'];
			$_SESSION['user_session'] = $user['username'];
			$_SESSION['user_admin'] = $user['admin'];
			$_SESSION['user_supportpin'] = $user['supportpin'];
			$_SESSION['is_email_verify'] = $user['is_email_verify'];
			header("Location:myaddress.php");
			exit();
		}
		else
		{
				$error['emailError'] = "Email Id Password is incorrect";
		}
	}
	else
	{
		$error['emailError'] = "Email id And  Password is incorrect";
	}
}
//var_dump($_SESSION);
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
				<div class="panel-heading">Login</div>
				<div class="panel-body">
				   <div id="register">
					<form  name="frm_obj" method="post" action="login.php">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="txtEmailID" type="email" id="txtEmailID" onkeyup="checkemail();" required value="<?php echo $email_id;?>">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>		
								<span id="email_status" style="color:red;"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="txtpassword" id="signuppassword" type="password" required value="<?php echo $password;?>">
											<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>
							</div>
							<input type="submit" type="submit" name="btnlogin" class="btn btn-primary" value="Login">
							<a style="text-align: right;" href="index.php" class="btn btn-primary">Sign Up</a>
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
