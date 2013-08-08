<?=$header;?>
<?=$menu;?>
<div class="container center pill">
	<div class="row">
		<div class="col-lg-3">		
			<div class="sidebar">
				<ul class="nav nav-stacked grey">
					<li><a href="#nav-configuration">Configuration</a></li>
						<ul class="nav subnav">
							<li><a href="#nav-config-php">config.php</a></li>
							<li><a href="#">.htaccess</a></li>
						</ul>
					<li><a href="#nav-routing">Routing</a></li>
					<li><a href="#nav-user-authentication">User Authentication</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9">
			<div class="page-header"><h1>Getting Started</h1></div>
			<p>An overview of Neville, how to configure, </p>
			<h2 id="nav-configuration">Configuration</h2>
			<p></p>
			<h3 id="nav-config-php">config.php</h3>
			<p>Basic configuration file for Neville</p>
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
		</div>
	</div>
</div>
<?=$footer;?>