<?php echo $header; ?>
<form class="form-login" class="container" method="post">
	<h2 class="clock-welcome text-center">Welcome to</h2>
	<div class="col-md-4 col-md-offset-4">
<?php
	if ($error) {
		echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
	}
?>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="">
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	</div>
</form>
<?php echo $footer; ?>