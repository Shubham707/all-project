<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id = "";
$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";

$error = array();
if(isset($_POST['btnsignup']))
{
//	var_dump($_POST);
	$email_id = $_POST['txtEmailID'];
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];
	$spendingpassword = $_POST['spendingpassword'];
	$confirmspendingpassword = $_POST['confirmspendingpassword'];

	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid Password";
	}
	if(empty($confirmpassword))
	{
		$error['confirmpasswordError'] = "Please Provide valid Password";
	}
	else if($confirmpassword != $password)
	{
		$error['confirmpasswordError'] = "Password and Confirm Password Must be same";
	}
	if(empty($spendingpassword))
	{
		$error['spendingpasswordError'] = "Please Provide valid Spending Password";
	}
	if(empty($confirmspendingpassword))
	{
		$error['confirmspendingpasswordError'] = "Please Provide valid Spending Password";
	}
	else if($confirmspendingpassword != $spendingpassword)
	{
		$error['confirmpasswordError'] = "Spending Password and Confirm Password Must be same";
	}
	
	if (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}
	
	$email_id = $mysqli->real_escape_string(strip_tags($email_id));
	$password_value = hash('sha256',addslashes(strip_tags($password)));
	$qstring = "select coalesce(id,0) as id
				from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
	
	$result	= $mysqli->query($qstring);
	$user = $result->fetch_assoc();
	//var_dump($user);
	if ($user['id']> 0)
	{
		$error['emailError'] = "User with email id $email_id already exist.";
	}

	if(empty($error))
	{
		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		$password_value = hash('sha256',addslashes(strip_tags($password)));
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
		
		$qstring = "insert into `users`( `date`, `ip`, `username`, 
		`encrypt_username`, `password`, `transcation_password`, 
		`email`) values (";
		$qstring .= "now(), ";
		$qstring .= "'".$_SERVER['REMOTE_ADDR']."', ";
		$qstring .= "'".$email_id."', ";
		$qstring .= "'".hash('sha256',$email_id)."', ";
		$qstring .= "'".$password_value."', ";
		$qstring .= "'".$spendingpassword_value."', ";
		$qstring .= "'".$email_id."') ";
	//	echo $qstring;
		$result2	= $mysqli->query($qstring);
		if ($result2)
		{
			//	$user2 = $result2->fetch_assoc();
			//var_dump($user);
			//	header("Location:login.php");
			$email_id = "";
			$password = "";
			$confirmpassword = "";
			$spendingpassword = "";
			$confirmspendingpassword = "";
			$error['emailError2'] = "Your Account has successfully register. Please Login to continue";
		}
	}
}		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Block Chain</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="default">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 col-md-6 col-md-offset-3 shadow_four">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Create your Wallet</div>
				<div class="panel-body">
				   <div id="register">
					<form role="form" name="frm_obj" method="post" action="signup.php" onsubmit="return validation_signup(this);">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="username" type="email" id="txtEmailID" onkeyup="checkemail();" requiredvalue="<?php echo $email_id;?>">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>	
											<?php if(isset($error['emailError2'])) { echo "<br/><span class=\"messageClass2\">".$error['emailError2']."</span>";  }?>	
								<span id="email_status" style="color:red;"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" id="signuppassword" type="password" required value="<?php echo $password;?>">
												<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="con_pass" type="password" id="confirmpassword" required value="<?php echo $confirmpassword;?>">
												<?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>	
								<span style="color:red;" id="error1"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Spending Password" name="spl_password" type="password" id="spendingpassword" required value="<?php echo $spendingpassword;?>">
												<?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>	
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Spending Password" name="con_spl_password" type="password" id="confirmspendingpassword" required value="<?php echo $confirmspendingpassword;?>">
												<?php if(isset($error['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmspendingpasswordError']."</span>";  }?>	
								<span style="color:red;" id="error2"></span>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button id="btnSubmit" type="submit"name="sign_up" class="btn btn-primary">Sign Up</button>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#signuppassword").val();
                var confirmPassword = $("#confirmpassword").val();
                var penpassword = $("#spendingpassword").val();
                var penconfirmPassword = $("#confirmspendingpassword").val();

                if (password != confirmPassword) {
                    $("#error1").html('Password Not match');
                    return false;
                }
                if (penpassword != penconfirmPassword) {
                    $("#error2").html('Spending Password Not match');
                    return false;
                }
                return true;
                $('#error1').html('');
                $('#error2').html('');
            });
        });
    </script>













</body>
</html>
