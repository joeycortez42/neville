<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
	<a class="navbar-brand" href="<?php echo HTTP_SERVER; ?>">Neville</a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li class="nav-item<?php if ($route == 'getting-started') { echo ' active'; } ?>"><a class="nav-link"  href="getting-started">Getting started</a></li>
			<li class="nav-item<?php if ($route == 'documentation') { echo ' active'; } ?>"><a class="nav-link"  href="documentation">Documentation</a></li>
			<!--<li class="nav-item<?php if ($route == 'helper-classes') { echo ' active'; } ?>"><a class="nav-link" href="helper-classes">Helper Classes</a></li>-->
		</ul>
	</div><!--/.nav-collapse -->
</nav>
