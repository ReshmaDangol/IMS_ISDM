<?php include ( "header.php"); 
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {				
            if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
				$_SESSION['valid'] = true;
                $_SESSION['username'] = 'admin'; 
				header( "Location: index.php" );
            }
			else
			{
                  $msg = 'Wrong username or password';
            }
}
?>

<script>
	 $(function () {
		$('#menu').hide();
	});
</script>
<div class="col-lg-offset-5 col-lg-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
	<div class="wrapper" style="margin-top:100px;">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading text-center">Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" value="admin" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required="" value="admin" />     		  
				</div>
				<div class="form-group">
				<button class="btn  btn-primary btn-block actionButton"  name="login" value="login" type="Submit">Login</button>  			
				</div>
		</form>			
	</div>
</div>
</div>