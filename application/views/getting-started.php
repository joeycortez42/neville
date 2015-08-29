<?=$header;?>
<?=$menu;?>
<div class="container doc-header">
	<h1>Getting Started</h1>
	<p>An overview of Neville, how to download and configure.</p>
</div>
<div class="container row">
	<div class="col-md-3">
		<div id="sidebar" class="affix" data-spy="affix" data-offset-top="80" role="complementary">
			<ul class="nav nav-stacked">
				<li><a href="getting-started#download-neville">Download Neville</a></li>
				<li><a href="getting-started#whats-included">What's Included</a></li>
				<li><a href="getting-started#configuration">Configuration</a></li>
				<li><a href="getting-started#config-php">config.php</a></li>
				<li><a href="getting-started#htaccess">.htaccess</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9" role="main">
		<div class="page-header" style="margin-top:0;"><h1 id="download-neville" style="margin-top:0;">Download Neville</h1></div>
		<p class="lead">Setting up Neville can be painless. First download the latest distributed version.</p>
		<h3>Alternative Methods</h3>
		<h4><a href="https://github.com/nokemono42/neville">Clone or fork via GitHub</a></h4>
		<p>Clone the entire project or fork your own version of Neville by visiting GitHub.</p>
		<div class="page-header"><h1 id="whats-included">What's Included</h1></div>
		<p class="lead">Within the download you'll find the following directories and files.</p>
		<div class="highlight">
			<pre><code class="bash">neville/
├── application/
│   ├── controllers/
│   │   ├── common
│   ├── models/
│   │   ├── common
│   ├── views/
│   │   ├── common
├── html/
│   ├── css/
│   │   ├── bootstrap.min.css
│   │   ├── neville.css
│   ├── js/
│   │   ├── bootstrap.min.js
│   │   ├── jquery.js
│   │   ├── respond.min.js
│   ├── config.php
│   ├── index.php
├── system/
│   ├── helper/
│   ├── library/
			</code></pre>
		</div>
		<h2 id="configuration">Configuration</h2>
		<p></p>
		<h3 id="config-php">config.php</h3>
		<p>Basic configuration file for Neville. in what ever your server public folder is named (ie. html, public, or public_html.)</p>
		<h3 id="htaccess">.htaccess</h3>
	</div>
</div>


<!--

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

-->
<?=$footer;?>