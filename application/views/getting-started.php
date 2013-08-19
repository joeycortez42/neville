<?=$header;?>
<?=$menu;?>
<div class="container doc-header">
	<h1>Getting Started</h1>
	<p>An overview of Neville, how to download and configure.</p>
</div>
<div class="container row docs-container">
	<div class="col-md-3">
		<nav id="sidebar" class="affix" data-spy="affix" data-offset-top="80" role="complementary">
			<ul id="sidebar-nav" class="nav nav-stacked">
				<li class="active"><a href="#download-neville">Download Neville</a></li>
				<li class=""><a href="#whats-included">What's Included</a></li>
				<li class=""><a href="#requirements">Requirements</a></li>
				<li class=""><a href="#configuration">Configuration</a>
					<ul class="nav">
						<li class=""><a href="#config-php">config.php</a></li>
						<li class=""><a href="#htaccess">.htaccess</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	<div class="col-md-9" role="main">
		<div class="page-header" style="margin-top:0;"><h1 id="download-neville" style="margin-top:0;">Download Neville</h1></div>
		<p class="lead">Before you can begin using Neville download the latest distributed version.</p>
		<p><a class="btn btn-lg btn-primary" href="https://github.com/nokemono42/neville/archive/master.zip">Download <?=VERSION;?></a></p>
		<h3>Alternative Methods</h3>
		<h4><a href="https://github.com/nokemono42/neville">Clone or fork via GitHub</a></h4>
		<p>Clone the entire project or fork your own version of Neville by visiting GitHub.</p>
		<div class="page-header"><h1 id="whats-included">What's Included</h1></div>
		<p class="lead">Unzip the compressed folder to see structure of Neville. You'll find the following directories and files.</p>
		<div class="highlight">
			<pre><code>neville/
├── application/
│   ├── controllers/
│   │   ├── common
│   ├── models/
│   │   ├── common
│   ├── views/
│   │   ├── common
├── public/
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
│   ├── library/</code></pre>
		</div>
		<h2 id="requirements">Requirements</h2>
		<p class="lead">Setting up Neville doesn't have to be painful. Just customize the two following files and you are up and running.</p>
		<h2 id="configuration">Configuration</h2>
		<p class="lead">Setting up Neville doesn't have to be painful. Just customize the two following files and you are up and running.</p>
		<h3 id="config-php">config.php</h3>
		<p>Master configuration file for Neville. in what ever your server public folder is named (ie. html, public, or public_html.)</p>
		<div class="highlight">
			<pre><code>&lt;?php

#Optional
setlocale(LC_MONETARY, 'en_US');

#URL
define('HTTP_SERVER', 'http://www.mydomain.com/');

#Local Path
define('DIR_APP', '/home/domainfolder/publichtmlfolder/');

#Session Name
define('SESSION_NAME', 'neville');

?&gt;</code></pre>
		</div>
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

<script type="text/javascript">
	/*$(document).ready(function() {
	$('body').scrollspy({ target: '#sidebar-nav' });
	$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
});
	$('#myScrollspy').on('activate.bs.scrollspy', function () {
  
	alert('here');// do something…
});
	});*
	
	!function ($) {
		$(function() {
			var $window = $(window);
			var $body   = $(document.body);
		
			var navHeight = $('.navbar').outerHeight(true) + 10;
		
			$body.scrollspy({ target: '#sidebar-nav', offset: navHeight });
		
			$window.on('load', function () {
				$body.scrollspy('refresh');
			});
	
			/*$('.docs-container [href=#]').click(function (e) {
				e.preventDefault();
			});

			// back to top
			setTimeout(function () {
				var $sideBar = $('#sidebar-nav');
	
				$sideBar.affix({*/
	/*offset: {
	top: function () {
	var offsetTop      = $sideBar.offset().top
	var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10)
	var navOuterHeight = $('.bs-docs-nav').height()
	
	return (this.top = offsetTop - navOuterHeight - sideBarMargin)
	}
	, bottom: function () {
	return (this.bottom = $('.bs-footer').outerHeight(true))
	}
	}*
				//});
			//}, 100);

		});
	} (window.jQuery);*/
</script>