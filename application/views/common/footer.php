<footer>
	<div class="license">
		<p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
	</div>
</footer>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<?php
	if ($scripts) {
		foreach ($scripts as $script) { ?>
			<script src="<?php echo $script; ?>"></script>
<?php
		}
	}
?>
</body>
</html>