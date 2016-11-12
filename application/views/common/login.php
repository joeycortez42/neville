<?=$header;?>
<style>
	#login-form { width: 400px; margin-top: 65px; }
	#login-logo { margin-bottom: 50px; }
	#footer { display: none; }
</style>
<div class="container">
	<form id="login-form" class="container">
		<div id="login-logo" class="text-center"><img src="img/wowcards.png" /></div>
		<div class="form-group">
			<label>Email Address</label>
			<input id="email" name="email" class="form-control" type="text" />
		</div>
		<div class="form-group">
			<label>Password</label>
			<input id="password" name="password" class="form-control" type="password" />
		</div>
		<div class="text-right"><button type="submit" class="btn btn-default">Submit</button></div>
	</form>
</div>
<?=$footer;?>