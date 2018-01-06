<?php page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}?>
<div class="profile-sidebar">
			
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<!-- <li class="active"><a herf="dashboard.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li> -->
			<li class="active"><a href="bitcoin.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li>
			
			<li><a href="myaddress.php"><em class="fa fa-id-card-o">&nbsp;</em> MY ADDRESS </a></li>

			<li><a href="transaction.php"><em class="fa fa-bitcoin">&nbsp;</em> TRANSACTION </a></li>		
			<!-- </ul>
		<hr class="hr_color">
		<ul class="nav menu"> -->
			<li><a href="security.php"><em class="fa fa-lock">&nbsp;</em> SECURITY CENTER</a></li>
			<li><a href="contactus.php"> <em class="fa fa-user">&nbsp;</em> CONTACT US</span></a></li>
			</li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> LOGOUT</a></li>
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		
		<div class="container-fluid">
			 <h3>Be your own bank.®</h3>
				<div class="row">
					<div class="col-sm-3" >
					    	<div class="panel panel-teal panel-widget">
						<!-- <h4>Be your own bank.®</h4> -->
							<div class="row col-md-2 side_left">
								<button class="btn btn-info" onclick="document.getElementById('id04').style.display='block'"><div class="large"><em class="fa fa-send"></em></div>
								<div class="text-muted"></div>SEND</button>
							</div>
							<div class="row col-md-2 side_right">
								<button class="btn btn-info" style="color: white;" onclick="document.getElementById('id05').style.display='block'"><div class="large"><img src="assets/receive.png" alt=""></div>
								<div class="text-muted"></div>Request</button>
							</div>
							
					   </div>
					     
				   </div>
				   <div class="col-sm-3" style="color:red;">
				   	       <div class="panel panel-teal panel-widget">
						<!-- <h4>Be your own bank.®</h4> -->
							<div class="row col-md-2 side_left" style="margin-right: 50px !important;">
								<button class="btn btn-info" style="color: white;" onclick="document.getElementById('id07').style.display='block'"><div class="large"><img src="assets/receive.png" alt=""></div>
								<div class="text-muted"></div>Transaction</button>
							</div>
						</div>
				   	<script type="text/javascript">
					window.setTimeout(function() {
					    $(".data1").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);
					window.setTimeout(function() {
					    $(".data2").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);
				   	</script>
				   		<?php if(@$_REQUEST['m']){?>
				   		<div class="alert alert-danger <?php echo @$_REQUEST['m'];?>" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Success!</strong> Password And Confirm Password Is Wrong!
						</div>
						<?php }?>
						<?php if(@$_REQUEST['s']){?>
				   		<div class="alert alert-success <?php echo @$_REQUEST['m'];?>" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Success!</strong> Data Changed SuccessFully!
						</div>
						<?php }?>
				   	</div>
				   <div class="col-sm-6">
				      <div class="panel panel-teal panel-widget side_right_side">
							<div class="row no-padding">
							<?php 	
							if(_LIVE_)
							{
							  $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
								if(isset($client))
								{
								$user_current_balance=$client->getBalance($user_session)-$fee;
									$user_current_balance2 = $user_current_balance;
								}
							}
							?>
								<div class="large"><em class="fa fa-bitcoin"></em><?php echo @$user_current_balance." " . @$coin_short;?></div>
							</div>
				       </div>
				  </div>
			</div>
		</div> 
<hr>
			
