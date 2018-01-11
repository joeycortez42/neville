<?php
	// Version
	define('VERSION', 'Beta 0.8.0');

	// Error Reporting
	error_reporting(E_ALL);
	//error_reporting(E_ALL ^ E_NOTICE);
	//ini_set('error_reporting', E_ALL ^ E_NOTICE);
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);

	// Check PHP Version
	if (version_compare(phpversion(), '5.6', '<') === true) {
		exit('<b>Error</b>: PHP 5.6+ or PHP 7+ required.');
	}

	// Autoloader
	if (is_file(DIR_APP . 'vendor/autoload.php')) {
		require_once(DIR_APP . 'vendor/autoload.php');
	}

	// Engine
	foreach (glob(DIR_APP . 'system/library/*.php') as $file) {
		require_once($file);
	}

	// Database Adapters
	foreach (glob(DIR_APP . 'system/library/db/*.php') as $file) {
		require_once($file);
	}

	// Helper
	foreach (glob(DIR_APP . 'system/helper/*.php') as $file) {
		require_once($file);
	}

	// Registry
	$registry = new Registry();

	// Loader
	$loader = new Loader($registry);
	$registry->set('load', $loader);

	// Request
	$registry->set('request', new Request());

	// Response
	$response = new Response();
	$response->addHeader('Content-Type: text/html; charset=UTF-8');
	$registry->set('response', $response);

	// Database
	if (DB_AUTOSTART) {
		$registry->set('db', new Database(DB_TYPE, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT));
	}

	// Session
	$session = new Session();
	$session->start();
	$registry->set('session', $session);

	// Url
	$url = new Url(HTTP_SERVER, HTTP_SERVER ? HTTP_SERVER : HTTP_SERVER);
	$registry->set('url', $url);

	// Document
	$registry->set('document', new Document());

	// Login
	$registry->set('user', new User($registry));

	// Front Controller
	$controller = new Front($registry);

	if (isset($_GET['route'])) {
		$route = new Route($_GET['route']);
	} else {
		$route = new Route(ROUTE_DEFAULT);
	}

	// Dispatch
	$controller->dispatch($route, new Route(ROUTE_ERROR));

	// Output
	$response->output();

/*	echo 'Session: ';
	print_r($_SESSION);
	echo '<br />';

	echo 'Post: ';
	print_r($_POST);
	echo '<br />';

	echo 'Get: ';
	print_r($_GET);
	echo '<br />';

	echo 'Request: ';
	print_r($_REQUEST);
	echo '<br />'; */

	//echo 'Server: ';
	//print_r($_SERVER);
	//echo '<br />';
