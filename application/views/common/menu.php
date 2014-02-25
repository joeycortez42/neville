<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header white"><a class="navbar-brand" href="<?=HTTP_SERVER;?>">Neville</a></div>
		<ul class="nav navbar-nav navbar-left">
			<li<?=($route == 'getting-started') ? ' class="active"' : '';?>><a href="getting-started">Getting Started</a></li>
			<li<?=($route == 'documentation') ? ' class="active"' : '';?>><a href="documentation">Documentation</a></li>
			<!--<li<?=($route == 'helper-classes') ? ' class="active"' : '';?>><a href="#">Helper Classes</a></li>
			<li<?=($route == 'plugins') ? ' class="active"' : '';?>><a href="#">Plug-ins</a></li>-->
		</ul>
	</div>
</nav>