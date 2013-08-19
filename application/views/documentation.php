<?=$header;?>
<?=$menu;?>
<div class="container doc-header">
	<h1>Documentation</h1>
	<p>An explanation of Neville's routing system, user classes, and more.</p>
</div>

<div class="bs-example" style="position:relative;">
      <nav id="navbar-example2" class="navbar navbar-default navbar-static" role="navigation">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-js-navbar-scrollspy">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project Name</a>
        </div>
        <div class="collapse navbar-collapse bs-js-navbar-scrollspy">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#fat">@fat</a></li>
            <li class=""><a href="#mdo">@mdo</a></li>
            <li class="dropdown">
              <a href="#" id="navbarDrop1" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="navbarDrop1">
                <li class=""><a href="#one" tabindex="-1">one</a></li>
                <li class=""><a href="#two" tabindex="-1">two</a></li>
                <li class="divider"></li>
                <li class=""><a href="#three" tabindex="-1">three</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example" style="position: relative;
height: 200px;
margin-top: 10px;
overflow: auto;">
        <h4 id="fat">@fat</h4>
        <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
        <h4 id="mdo">@mdo</h4>
        <p>Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard aliqua cupidatat mcsweeney's vero. Cupidatat four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer vice keytar deserunt.</p>
        <h4 id="one">one</h4>
        <p>Occaecat commodo aliqua delectus. Fap craft beer deserunt skateboard ea. Lomo bicycle rights adipisicing banh mi, velit ea sunt next level locavore single-origin coffee in magna veniam. High life id vinyl, echo park consequat quis aliquip banh mi pitchfork. Vero VHS est adipisicing. Consectetur nisi DIY minim messenger bag. Cred ex in, sustainable delectus consectetur fanny pack iphone.</p>
        <h4 id="two">two</h4>
        <p>In incididunt echo park, officia deserunt mcsweeney's proident master cleanse thundercats sapiente veniam. Excepteur VHS elit, proident shoreditch +1 biodiesel laborum craft beer. Single-origin coffee wayfarers irure four loko, cupidatat terry richardson master cleanse. Assumenda you probably haven't heard of them art party fanny pack, tattooed nulla cardigan tempor ad. Proident wolf nesciunt sartorial keffiyeh eu banh mi sustainable. Elit wolf voluptate, lo-fi ea portland before they sold out four loko. Locavore enim nostrud mlkshk brooklyn nesciunt.</p>
        <h4 id="three">three</h4>
        <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
        <p>Keytar twee blog, culpa messenger bag marfa whatever delectus food truck. Sapiente synth id assumenda. Locavore sed helvetica cliche irony, thundercats you probably haven't heard of them consequat hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before they sold out, terry richardson proident brunch nesciunt quis cosby sweater pariatur keffiyeh ut helvetica artisan. Cardigan craft beer seitan readymade velit. VHS chambray laboris tempor veniam. Anim mollit minim commodo ullamco thundercats.
        </p>
      </div>
    </div>

<!--<div class="container row">
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