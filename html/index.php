<?php
	// Version
	define('VERSION', 'Beta 0.5.4.1');

	// Configuration
	if (file_exists('config.php')) {
		require_once('config.php');
	} else {
		exit('<b>Error</b>: <b>config.php</b> does not exist.');
	}

	// Error Reporting
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('error_reporting', E_ALL ^ E_NOTICE);
	ini_set("display_errors", 1);

	// Check PHP Version
	if (version_compare(phpversion(), '5.3.29', '<') == true) {
		exit('<b>Error</b>: PHP 5.3+ required.');
	}

	// Engine
	foreach (glob(DIR_APP . 'system/library/*.php') as $file) {
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

	// Database
	$registry->set('db', new Database());

	// Url
	$url = new Url(HTTP_SERVER, HTTP_SERVER ? HTTP_SERVER : HTTP_SERVER);
	$registry->set('url', $url);

	// Request
	$request = new Request();
	$registry->set('request', $request);

	// Response
	$response = new Response();
	$response->addHeader('Content-Type: text/html; charset=UTF-8');
	$registry->set('response', $response);

	// Session
	$session = new Session();
	$session->start();
	$registry->set('session', $session);

	// Document
	$registry->set('document', new Document());

	// Login
	$registry->set('user', new User($registry));

	// Front Controller
	$controller = new Front($registry);

	// Router
	if (isset($request->get['route'])) {
		$route = new Route($request->get['route']);
	} else {
		$route = new Route('common/home');
	}

	// Dispatch
	$controller->dispatch($route, new Route('error/not_found'));

	// Output
	$response->output();
?>