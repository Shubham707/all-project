<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
		
<!-- All Sent Received Transferred -->
<div class="row" style="margin-bottom: 30px;">
	<center>Security Center</center>
<center>Please update your password regularly
<a class="btn btn-info" href="lib/varify_email.php?btnverify=1">Email Verify</a></center>
</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">Password</div>
					<div class="panel-body">
						<form role="form"  action="lib/security.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Old Password" id="currentpassword" name="currentpassword" type="password" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="New Password" id="signuppassword" name="signuppassword" type="password" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" type="password" required>
							</div>
							
							<input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value=" Password">
						</fieldset>
					</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">Spending Password</div>
					<div class="panel-body">
						<form role="form"  action="lib/security_spend.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Old Spending Password" id="currentspendingpassword" name="currentspendingpassword" type="password" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="New Spending Password" id="spendingpassword" name="spendingpassword" type="password" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Spending Password" id="confirmspendingpassword" name="confirmspendingpassword" type="password" required>
							</div>
							
							<input type="submit" class="btn btn-primary" id="btnSpending" name="btnSpending" value="Spending Password">
						</fieldset>
					</form>
					</div>
				</div>
			</div>
	    </div>
    </div>
<?php include 'footer.php'; ?>
