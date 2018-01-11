<?php echo $header; ?>
<?php echo $menu; ?>
<form class="clock-form form-horizontal" method="post">
	<div class="col-sm-4 col-sm-offset-4">
		<h2 class="text-center">Account Profile</h2>
<?php
	if ($error) {
		echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
	}
?>
		<div class="form-group">
			<label for="email" class="col-sm-4 control-label">Email</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user['email']; ?>" disabled>
			</div>
		</div>
		<div class="form-group">
			<label for="firstname" class="col-sm-4 control-label">First Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $user['firstname']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="lastname" class="col-sm-4 control-label">Last Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $user['lastname']; ?>">
			</div>
		</div>
		<!--<div class="form-group">
			<div class="col-sm-6 col-sm-offset-4">
				<button class="btn btn-primary btn-block" type="submit">Update</button>
			</div>
		</div>-->
	</div>
</form>
<?php echo $footer; ?>