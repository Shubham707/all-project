<?php

include'common.php';
if(isset($_POST['btnforget']))
{
	 $otp=rand(11111,99999);
	 $email=$_POST['email'];
	 $sel="select * from users where username='$email'";
	 $val=$mysqli->query($sel);
	 $data=$val->fetch_assoc();
	 $email_id=$data['username'];
	 if($email_id)
	 {
			 $sql="UPDATE `users` SET `otp` = '$otp' WHERE `username` = '$email'";
			 $query=$mysqli->query($sql);
			 if($query){

			 	    include'PHPMailer/PHPMailerAutoload.php';
		            include'PHPMailer/class.smtp.php';
		            $message = '<html><body>';
		            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" 
		            .$email. "</td></tr>";
		            $message .= "<tr><td><strong>OTP NO:</strong> </td><td>'".$otp."</td></tr>";
		            $message .= "</table>";
		            $message .= "</body></html>";
		            $to="info@ebtclassic.com ";
		            $subject="Message EBT Classic";
		            $headers = "MIME-Version: 1.0" . "\r\n";
		            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
		            @mail($to,$subject,$message,$headers);
			 	header('Location:forgetpass.php?msg=Email Send Successfully!');
			 } else {
			     $error="Email id Incurrect!";
			 }
	}
	else
	{
		$error="Email id Incurrect!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="box-shadow: -16px -6px 33px 11px #8888;">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Forget Password</div>
				<div class="panel-body">
					<form role="form" name="frm" action="#" method="post">
						<fieldset>
							<div style="color:red; text-align: center;"><?php echo @$error;?></div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<input type="submit" name="btnforget" class="btn btn-primary" value="Send"></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
