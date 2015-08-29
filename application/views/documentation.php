<?=$header;?>
<?=$menu;?>
<div class="container doc-header">
	<h1>Documentation</h1>
	<p>An explanation of Neville's routing system, user classes, and more.</p>
</div>
<div class="container row">
	<div class="col-md-3">
		<div id="sidebar" class="affix" role="complementary">
			<ul class="nav nav-stacked">
				<li><a href="#nav-routing">Routing</a></li>
				<li><a href="#nav-user-authentication">User Authentication</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9" role="main">
		<div class="page-header" style="margin-top:0;"><h1 style="margin-top:0;">Getting Started</h1></div>
		<p>An overview of Neville, how to configure, </p>
		<h2 id="nav-configuration">Configuration</h2>
		<p></p>
		<h3 id="nav-config-php">config.php</h3>

	</div>
</div>


<!--
		<div class="col-lg-9">
			<div class="page-header"><h1>Getting Started</h1></div>
			<p>An overview of Neville, how to configure, </p>
			<h2 id="nav-configuration">Configuration</h2>
			<p></p>
			<h3 id="nav-config-php">config.php</h3>
			<p>Basic configuration file for Neville. in what ever your server public folder is named (ie. html, public, or public_html.)</p>
			<div class="highlight">
<pre><code>&lt;?
  define('HTTP_SERVER', 'http://www.mydomain.com/');
  define('DIR_APP', '/home/domainfolder/html/');
  define('SESSION_NAME', 'neville');
?&gt;</code></pre>
			<h3 id="nav-htaccess">.htaccess</h3>
			<p>Needed for clean URLs.</p>
			<div class="highlight">
<pre><code>&lt;IfModule mod_rewrite.c&gt;
  RewriteEngine On
  RewriteBase /html/public/
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^([^?]*) index.php?route=$1 [L,QSA]
&lt;/IfModule&gt;</code></pre>

			</div>
			<h2 id="nav-routing">Routing</h2>
			<p></p>
			<h2 id="nav-user-authentication">User Authentication</h2>
			<p></p>
			<h2 id="nav-helpers">Helpers</h2>
			<h4>Fill Select</h4>
			<p><?=fillSelect('states', 'states', 'form-control', $states);?></p>
		</div>
	</div>
</div>-->
<?=$footer;?>