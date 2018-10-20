<nav class="navbar navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo HTTP_SERVER; ?>">Neville</a>
		</div><!--/.nav-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="<?php if ($route == 'getting-started') { echo 'active'; } ?>"><a href="getting-started">Getting started</a></li>
				<li class="<?php if ($route == 'documentation') { echo 'active'; } ?>"><a href="documentation">Documentation</a></li>
				<!--<li class="<?php if ($route == 'helper-classes') { echo 'active'; } ?>"><a href="helper-classes">Helper Classes</a></li>-->
			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container -->
</nav>
