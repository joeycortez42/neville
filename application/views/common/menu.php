<?php
	$li_active = ' class="active"';
?>
<div class="masthead clearfix">
	<div class="inner">
		<h3 class="masthead-brand"><a href="<?php echo HTTP_SERVER;?>">Neville</a></h3>
		<nav>
			<ul class="nav masthead-nav">
				<li<?php if ($route == 'getting-started') echo $li_active;?>><a href="getting-started">Getting Started</a></li>
				<li<?php if ($route == 'documentation') echo $li_active;?>><a href="documentation">Documentation</a></li>
				<li<?php if ($route == 'helper-classes') echo $li_active;?>><a href="helper-classes">Helper Classes</a></li>
			</ul>
		</nav>
	</div>
</div>