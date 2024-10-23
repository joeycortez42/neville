<?php echo $header; ?>
<div id="login">
<?php
	if ($error) {
		echo '<div class="alert alert-danger" role="alert"><strong>ERROR</strong>: ' . $error . '</div>';
	}
?>
	<form class="form-login" class="container" method="post">
		<div class="form-group">
			<label for="inputEmail">Email Address</label>
			<input type="email" id="email" name="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="inputPassword">Password</label>
			<input type="password" id="password" name="password" class="form-control" />
		</div>
		<div class="pull-left">
			<label for="rememberme">
				<input type="checkbox" id="rememberme" name="rememberme" value="forever" /> Remember Me
			</label>
		</div>
		<button type="submit" class="btn btn-primary pull-right">Log in</button>
	</form>
	<p id="nav">
		<a href="<?php echo HTTP_SERVER; ?>/account/login?action=lostpassword">Lost your password?</a>
	</p>
</div>
<?php echo $footer; ?>
