<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
	<div class="row">
		<div class="col-md-12">
			
			<div class="col-md-3"></div>
				<div class="panel panel-primary">
					<div class="panel-heading"><center>WITHDRAW</center></div>
					<div class="panel-body">
						<form role="form" action="change_address.php" method="post">
						<fieldset>
							<br>
							
						<div class= row>
								<div class="col-md-12">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" id="btcaddress" placeholder="Address" name="btcaddress" type="text" required>
										</div>
										<div class="form-group">
											<input class="form-control" id="txtChar" placeholder="BTX" name="txtChar" type="text" required>
										</div>
										<input type="submit" class="btn btn-primary" name="submit" value=" SEND"> 
										<!-- <a href="change_address.php?nad=1" class="btn btn-primary" name="button"> UPDATE</a> -->
									</div>
								   <div class="col-md-3">
										<!-- <div class="form-group">
											<input class="form-control" placeholder="BTC" name="btc" type="text" required>
										</div> -->
									</div>
								</div>
							</div>

								<br>
						
							
							
						</fieldset>
					</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
    </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function () {
 $('#send').click(function () {
 var text = $('#textField').val();
 $('#textArea').html($('#textArea').html() + text);
 $('#textField').val('');
 });
});
</script>

<?php include 'footer.php'; ?>
