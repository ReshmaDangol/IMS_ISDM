<?php include ( "header.html"); ?>
<script>
	 $(function () {
		$('#menu').hide();
	});
</script>
<div class="col-lg-offset-5 col-lg-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
	<div class="wrapper" style="margin-top:100px;">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading text-center">Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
				<div class="form-group">
					<input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     		  
				</div>
				<div class="form-group">
				<button class="btn  btn-primary btn-block actionButton"  name="Submit" value="Login" type="Submit">Login</button>  			
				</div>
		</form>			
	</div>
</div>
</div>